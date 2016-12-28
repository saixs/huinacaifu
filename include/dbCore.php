<?php
/**
 * @Author: Wuu!
 * @cTime:  13-3-26 下午7:35
 * @Email:  easy_borrow@163.com
 * Created by JetBrains PhpStorm.
 */

/**
 * Class prepareCore 基于PDO的数据库底层处理类
 */
if (!function_exists('checkAccess')) {
    die('非法访问');
}

class dbCore extends PDO {

	// 对产生错误查询语句的用户debug时记录其用户名与IP地址
	private $debug = TRUE;                  // 是否开启debug, true: 直接打印错误信息 false:错误信息写入 webRoot/noAccessPath/log/error.log 中
	private $order = '';
	private $where = '';
	private $group = '';
	private $limit = '';
	private $having = '';
	private $from = '';                     // 语句需要用到的表名
	private $join = '';                     // 连接查询所需要的语句
	private $queryType = '';                // 查询类型. 如:select update insert...
	private $fields;              // select 查询的相关字段信息  insert update 语句中 set 相关字段信息
	private $DMLBindValues = array();            // update与delete语句中set所对应的值
	private $whereBindValues = array();          // where 条件中各字段的值
	private $bindListOfWhere = array();     // 预处理需要使用的where条件参数绑定:name 列表
	private $bindList = array();
	private $attributeStatus = 0;           // 对象当前属性所处状态
	private $tableRealNameList = array();   // 查询操作所需要使用的表编号对应的表名,用于构建sql语句的过程中,自动别名与自动表前缀
	private $tableAliasList = array();      // 表别名与表真是名称对应的情况
	private $fieldsAutoAlias = TRUE;        // 是否自动给多表查询语句做别名 别名格式为 表名_字段名
	public  $finalSQL = '';                  // 最终查询的sql语句
	private $stmt = array();                // PDOSTMT对象将存放进此数组,索引为self::stmtCurrentIndex
	public  $stmtCurrentIndex = 'default';

	public function __construct() {
		try {
			parent::__construct(DSN, DB_USER, DB_PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'GBK\''));
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$this->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
		} catch(PDOException $e) {
			die('数据库连接初始化失败!');
		}

		$this->initStructure();
        include_once $_SERVER['DOCUMENT_ROOT'].'/include/tableStructure/structure.php';
	}

	/**
	 * 置空本类属性,防止对下次查询语句的组装造成干扰
	 */
	public function attributeClear() {
		if ($this->attributeStatus === 1) {
			$this->order = '';
			$this->where = '';
			$this->group = '';
			$this->limit = '';
			$this->having = '';
			$this->from = '';
			$this->join = '';
			$this->queryType = '';
			$this->fields = array();
			$this->DMLBindValues = array();
			$this->whereBindValues = array();
			$this->bindListOfWhere = array();
			$this->attributeStatus = 0;
			$this->tableRealNameList = array();
			$this->tableAliasList = array();
			$this->fieldsAutoAlias = TRUE;
			$this->finalSQL = '';
			if (isset($this->stmt[$this->stmtCurrentIndex])) {
				$this->stmt[$this->stmtCurrentIndex] = NULL;
			}
		}
	}

	/**
	 * 建立用于预处理的表结构缓存文件,含有所有字段的预处理类型
	 */
	public function initStructure() {
		$file_name = SERVER_ROOT . '/tableStructure/structure.php';
		if (!file_exists($file_name)) {
			$sql = 'show tables';
			$result = $this->fetchAllByNormal($sql, PDO::FETCH_NUM);
			if ($result) {
				$tables = $result;
			} else {
				$this->debug('表结构初始化失败,无法获取表名!');die;
			}

			$contents = array();
			foreach ($tables as $value) {
				$sql = "desc `$value[0]`";
				$result = $this->fetchAllByNormal($sql);
				if ($result) {
					$columns = $result;
				} else {
					$this->debug('表结构初始化失败,无法获取表字段!');die;
				}

				// 将所有表结构信息装入数组
				foreach ($columns as $val) {
					// $contents['表名']['字段名'] = 预处理类型
					$contents[$value['0']][$val['Field']] = $this->matchColumnType($val['Type']);
				}
			}

			/*
			 * 以下的代码段作用为:遍历表结构数组,获取字段名与该字段预处理类型信息.
			 * 将每张表的信息作为structure类的一个数组型静态属性,以表名作为变量名.写入/tableStructure/structure.php
			 */

			$string_header = '<?php' . "\r\n" . 'class structure {' . "\r\n";
			$table_list = '';

			foreach ($contents as $key=>$value) {
				$field_info = '';
				foreach ($value as $inner_key=>$inner_value) {
					// 格式为:'字段名'=>'预处理类型',
					$field_info .= '\'' . $inner_key . '\'' . '=>' . '\'' . $inner_value . '\',';
				}
				// 格式为: static $表名 = array('字段名'=>'预处理类型'...);
				$table_list .= "\t" . 'static $' . $key . ' = array(' . $field_info . ');' . "\r\n";
			}

			$string_footer = "\r\n" . '}';

			$contents = $string_header . $table_list . $string_footer;

			if (buildAndPut($file_name, $contents) <= 0) {
				$this->debug('表结构初始化失败,没有写入任何数据!');die;
			}
		}
	}

	/**
	 * 根据列类型 给定相应的预处理类型
	 * @param string $type
	 * @param int $default
	 *
	 * @return int already data type
	 */
	private function matchColumnType($type = '', $default = PDO::PARAM_STR) {
		if (preg_match('/^int/i', $type)) {
			$type = PDO::PARAM_INT;
		} elseif (preg_match('/^tinyint/i', $type)) {
			$type = PDO::PARAM_INT;
		} elseif (preg_match('/^smallint/i', $type)) {
			$type = PDO::PARAM_INT;
		} elseif (preg_match('/^bigint/i', $type)) {
			$type = PDO::PARAM_INT;
		} elseif (preg_match('/^mediumint/i', $type)) {
			$type = PDO::PARAM_INT;
		} elseif (preg_match('/^decimal/i', $type)) {
			$type = PDO::PARAM_STR;
		} elseif (preg_match('/^varchar/i', $type)) {
			$type = PDO::PARAM_STR;
		} elseif (preg_match('/^char/i', $type)) {
			$type = PDO::PARAM_STR;
		} elseif (preg_match('/^double/i', $type)) {
			$type = PDO::PARAM_STR;
		} elseif (preg_match('/^float/i', $type)) {
			$type = PDO::PARAM_STR;
		} elseif (preg_match('/blob/i', $type)) {
			$type = PDO::PARAM_STR;
		} elseif (preg_match('/text/i', $type)) {
			$type = PDO::PARAM_LOB;
		} else {
			$type = $default;
		}

		return $type;
	}

	public function debug($msg) {
		if ($this->debug === TRUE) {
			P($msg);P($this->finalSQL);
		} else {
			buildAndPut(SERVER_ROOT . '/noAccessPath/log/error.log', $msg . '   FROM URI:' . $_SERVER['REQUEST_URI'] . "\r\n", FILE_APPEND);
			die('糟糕!程序发生严重错误,该错误已经被记录,如果这是正常操作引起的,请联系系统管理员!');
		}
	}

	private function getTable($table = '') {

		if (is_array($table)) {
			if (count($table) == 2) {
				$sql = '`' . DB_PREFIX . $table[0] . '`' . 'AS ' . $table[1];
				$fullName = DB_PREFIX . $table[0];
			} else {
				$this->debug('getTable方法需要传入有两个值的数组,第二个值代表别名');die;
			}
		} else {
			$sql = DB_PREFIX . $table;
			$fullName = DB_PREFIX . $table;
		}

		if (!empty($fullName) && isset(structure::$$fullName)) {
			$this->tableRealNameList[0] = $fullName;

			$alias = is_array($table) ? $table[1] : $table;
			$this->tableAliasList[$fullName] = $alias; // 表名对应的别名
			$this->tableAliasList[$alias] = $fullName; // 别名对应的表名
			$this->from = $sql;
		} else {
			$this->debug('错误的表名:' . $table);die;
		}
	}

	/**
	 * @param string $table
	 * @param bool   $clear_attribute
	 *
	 * @return $this
	 */
	public function select($table = '', $clear_attribute = TRUE) {
		if ($clear_attribute === TRUE) {
			$this->attributeClear();
		}
		$this->attributeStatus = 1;
		$this->queryType = 'select';
		$this->getTable($table);
		return $this;
	}

	/**
	 * @param      $table
	 * @param bool $clear_attribute
	 *
	 * @return $this
	 */
	public function find($table, $clear_attribute = TRUE) {
		if ($clear_attribute === TRUE) {
			$this->attributeClear();
		}
		$this->attributeStatus = 1;
		$this->queryType = 'find';
		$this->getTable($table);
		return $this;
	}

	/**
	 * @param      $table
	 * @param bool $clear_attribute
	 *
	 * @return $this
	 */
	public function insert($table, $clear_attribute = TRUE) {
		if ($clear_attribute === TRUE) {
			$this->attributeClear();
		}
		$this->attributeStatus = 1;
		$this->queryType = 'insert';
		$this->getTable($table);
		return $this;
	}

	/**
	 * @param      $table
	 * @param bool $clear_attribute
	 *
	 * @return $this
	 */
	public function update($table, $clear_attribute = TRUE) {
		if ($clear_attribute === TRUE) {
			$this->attributeClear();
		}
		$this->attributeStatus = 1;
		$this->queryType = 'update';
		$this->getTable($table);
		return $this;
	}

	/**
	 * @param      $table
	 * @param bool $clear_attribute
	 *
	 * @return $this
	 */
	public function del($table, $clear_attribute = TRUE) {
		if ($clear_attribute === TRUE) {
			$this->attributeClear();
		}
		$this->attributeStatus = 1;
		$this->queryType = 'delete';
		$this->getTable($table);
		return $this;
	}

	/**
	 * @param      $table
	 * @param bool $clear_attribute
	 *
	 * @return $this
	 */
	public function getCount($table, $clear_attribute = TRUE) {
		if ($clear_attribute === TRUE) {
			$this->attributeClear();
		}
		$this->attributeStatus = 1;
		$this->queryType = 'count';
		$this->getTable($table);
		return $this;
	}

	/**
	 * @param $field mixed
	 * @param $autoAlias bool 是否自动给所有查询字段别名
	 * 多表查询格式: array('tableName1'=>array('field1','count'=>'field2'...),'tableName2'=>array(...))
	 * 单表查询格式:array('field1','count'=>'field2'...)
	 * @return $this
	 */
	public function fields($field, $autoAlias = TRUE) {
		if (!$autoAlias) {
			$this->fieldsAutoAlias = FALSE;
		}
		$this->fields = $field;
		return $this;
	}

	/**
	 * @param array  $data   格式: array('noBindFieldName'=>'value',':bindFieldName'=>'value'...)
	 *
	 * @return $this
	 */
	public function set($data = array()) {
		$this->DMLBindValues = $data;
		return $this;
	}

	/**
	 * @param $string   string
	 * @param $data     array
	 *
	 * @return $this
	 */
	public function where($string = '', $data = array()) {
		$this->where = $string;
		$this->whereBindValues = $data;
		return $this;
	}

	/**
	 * @param string $string
	 *
	 * @return $this
	 */
	public function group($string = '') {
		$this->group = $string;
		return $this;
	}

	/**
	 * @param string $string
	 *
	 * @return $this
	 */
	public function order($string = '') {
		$this->group = $string;
		return $this;
	}

	/**
	 * @param string $int
	 *
	 * @return $this
	 */
	public function limit($int = 'all') {
		$this->limit = $int;
		return $this;
	}

	/**
	 * 连接查询
	 * @param array $join 格式: array('连接表名1'=>array('当前表名用于on的对比列','对比运算符','其他表名的别名.其他表名用于on的对比列')[,...])
	 * 例如: array('users'=>array('id','>=','alias.id'))
	 * @return $this
	 */
	public function leftJoin($join = array()) {
		if (empty($join) || !is_array($join)) {
			$this->debug('join方法请传入数组参数');die;
		}

		$str = '';
		$i = 1;

		// $join 格式:array('users'=>array('id','>=','0.id')...)
		foreach ($join as $key=>$value) {
			$this->tableRealNameList[$i] = DB_PREFIX . $key; // 真实表名
			$this->tableAliasList[$this->tableRealNameList[$i]] = $value['alias']; // 表名对应别名
			$this->tableAliasList[$value['alias']] = $this->tableRealNameList[$i]; // 别名对应表名
			$i++;
		}

		$i = 1;
		foreach ($join as $key=>$value) {
			$str .= "\r\n" . 'left join ' . '`' . $this->tableRealNameList[$i] . '` AS ' . $this->tableAliasList[$this->tableRealNameList[$i]]; // 生成join语句
			$count = count($value);

			if ($count == 3 || $count == 4) { //如果没有传入on条件运算符 默认为等号
				if ($count == 3) {
					$array = explode('.', $value[1]); // $value[1]/[2] 格式为 '0.id'
					$operator = '=';
				} else {
					$array = explode('.', $value[2]);
					$operator = $value[1];
				}

				// 去除首尾空格
				foreach ($array as $inner_key=>$inner_value) {
					$array[$inner_key] = trim($inner_value);
				}

				// $array[0]: on运算对比的另一张表的别名所对应的表名
				$match_table_name = $this->tableAliasList[$array[0]];

				// $array[1]: on运算对比的另一张表的字段名
				$match_column_name = $array[1];

				if (!isset(structure::$$match_table_name)) {
					$this->debug('leftJoin方法错误:ON条件中别名:`' . $array[0] . '`匹配到的表名为`' . $match_table_name . '`该表在表结构缓存中不存在');die;
				}

				$str .= ' on `' . $key . '`.`' . $value[0] . '` ' . $operator . ' `' . $array[0] . '`.`' . $match_column_name . '` '; // 生成 on 语句
			} else {
				$this->debug('join方法未传入正确的数据');die;
			}
			$i++;
		}
		if (!$str) {
			$this->debug('使用了join方法但是没有正确获取join内容');die;
		}
		$this->join = $str;
		return $this;
	}

	/**
	 * @param string $string
	 *
	 * @return $this
	 */
	public function having($string = '') {
		$this->having = $string;
		return $this;
	}


	/**
	 * @param $fetch_mod
	 *
	 * @return array|bool|null|void
	 */
	public function getSQLByQueryType($fetch_mod) {
		$where = !empty($this->where) ? ' WHERE ' . $this->where : '';
		if ($this->queryType == 'select' || $this->queryType == 'find' ||  $this->queryType == 'count') {
			$count = count($this->tableRealNameList);
			if ($this->queryType == 'find' && $this->limit === '') {
				$this->limit = ' LIMiT 1';
			}

			if ($this->queryType == 'count') {
				$fields = 'COUNT(*) as total';
			} else {
				$fields = $this->setFields($count);
			}

			if ($count > 1) {
				$sql =  'SELECT ' . $fields . ' FROM ' . $this->from . $this->join . $where . $this->setWhere($count) . ' ' . $this->having . ' ' . $this->group . ' ' . $this->order . ' ' . $this->limit;
			} else {
				$sql =  'SELECT ' . $fields . ' FROM ' . $this->from . $where . $this->setWhere($count) . ' ' . $this->having . ' ' . $this->group . ' ' . $this->order . ' ' . $this->limit;
			}

			$this->finalSQL = $sql;
			//echo $sql;
			$result = $this->fetchAllByPrepare($fetch_mod);
		} else {
			switch ($this->queryType) {
				case 'insert':
					$sql = 'INSERT INTO ' . $this->from . ' SET ' . $this->getDMLSetItem();
					break;
				case 'update':
					$sql = 'UPDATE ' . $this->from . ' SET ' . $this->getDMLSetItem() . $where . $this->setWhere(1);
					break;
				case 'delete':
					$sql =  'DELETE FROM ' . $this->from . $where . $this->setWhere(1);
					break;
				default:
					$this->debug('未知的查询类型:' . $this->queryType);die;
			}
			$this->finalSQL = $sql;
			//echo $sql;
			$result = $this->executeDMLByPrepare();
		}
		return $result;
	}

	/**
	 * 设置dml insert update 语句中列名与其所对应的值
	 * @return string
	 */
	private function getDMLSetItem() {
		$set = '';
		foreach ($this->DMLBindValues as $key => $value) {
			$field = trim($key);
			$set .= ',`' . $field . '`=' . ':' . $field;
		}

		return ltrim($set, ',');
	}

	private function setWhere($count) {
		if (empty($this->where)) {
			return;
		}
		if ($count > 1) {
			// 获取绑定列表
			$bind_pattern = '/:([a-zA-Z]+_)([\w_]+)/iu';
			preg_match_all($bind_pattern, $this->where, $bind_matches);
			if (isset($bind_matches[1][0])) {
				foreach ($bind_matches[1] as $key=>$value) {
					$table_name = $this->tableAliasList[rtrim($value, '_')];
					$column_name = $bind_matches[2][$key];
					$table_structure = structure::$$table_name;
					$this->bindListOfWhere[$value . $bind_matches[2][$key]] = $table_structure[$column_name];
				}
			}
		} else {
			// 获取绑定列表
			$bind_pattern = '/:([\w_]+)/iu';
			preg_match_all($bind_pattern, $this->where, $column_matches);
			if (isset($column_matches[1][0])) {
				foreach ($column_matches[1] as $key=>$value) {
					$table_name = $this->tableRealNameList[0];
					$column_name = $value;
					$table_structure = structure::$$table_name;
					$this->bindListOfWhere[$value] = $table_structure[$column_name];
				}
			}
		}
		if ($this->stmtCurrentIndex !== 'default') {
			$this->bindList[$this->stmtCurrentIndex] = $this->bindListOfWhere; // 防止当前STMT对象的绑定列表被其他查询语句覆盖
		}
	}

	private function setFields($count) {
		if ($this->queryType == 'select' || $this->queryType == 'find') {
			$fields = '';
			// 如果没填字段,或者值为* 则自动填充字段,并做别名
			if ($this->fields === '' || $this->fields === '*') {
				foreach ($this->tableRealNameList as $table) {
					if (!isset(structure::$$table)) {
						$this->debug('setFields方法错误,不存在该表名:' . $table);die;
					}
					if ($count > 1) {
						if ($this->fieldsAutoAlias){
							foreach (structure::$$table as $key=>$inner_value) {
								$fields .= ',`' . $this->tableAliasList[$table] . '`.`' . $key . '` AS ' . $this->tableAliasList[$table] . '_' . $key;
							}
						} else {
							$fields .= '*';
						}
					} else {
						$fields = '* ';
					}
				}
			} else {
				$i = 1;
				if ($count > 1) {
					foreach ($this->fields as $key=>$value) {
						if (!is_array($value) && $value !== '' && $value !== '*') {
							$this->debug('多表查询字段请传入多维数组');die;
						} elseif ($value === '' || $value === '*') {
							$table = $this->tableAliasList[$key];
							if (!isset(structure::$$table)) {
								$this->debug('setFields方法错误,不存在该表名:' . $table);die;
							}

							if ($this->fieldsAutoAlias){
								foreach (structure::$$table as $inner_key=>$inner_value) {
									$fields .= ',' . $key . '.`' . $inner_key . '` AS ' . $key . '_' . $inner_key;
								}
							} else {
								$fields .= ',' . $key . '.*';
							}
						} else {
							foreach ($value as $inner_key=>$inner_value) {
								if (!is_int($inner_key)) {
									$fields .= ',' . $inner_key . '(' . $inner_value . ') AS ' . $inner_key . $i;
								} else {
									$fields .= ',' . $key . '.`' . $inner_value . '` AS ' . $key . '_' . $inner_value;
								}
								$i++;
							}
						}
					}
				} else {
					foreach ($this->fields as $key=>$value) {
						if (!is_int($key)) {
							$fields .= ',' . $key . '(' . $value . ') AS ' . $key . $i;
						} else {
							$fields .= ',' . '`' . $value . '`';
						}
						$i++;
					}
				}
			}
		} else {
			$this->debug('查询类型与方法不符,不要使用setFields方法');die;
		}

		return ltrim($fields, ',');
	}

	public function go($fetch_mod = '') {
		return $this->getSQLByQueryType($fetch_mod);
	}

	/**
	 * 不使用绑定参数的方式处理dql语句,提取所有结果集(注意:请严格过滤sql语句,建议用于简单的查询如where条件为数值型的语句,转换数据类型后使用此方法)
	 * @param string $sql
	 * @param string $fetch_mod
	 *
	 * @return array 空数组:零行结果 非空数组:有结果 语句错误:debug
	 */
	public function fetchAllByNormal($sql, $fetch_mod = '') {
		$sql = str_ireplace('previous_', DB_PREFIX,$sql);
		try {
			$stmt = $this->query($sql);
		} catch(PDOException $e) {
			$this->debug($e->errorInfo);die;
		}

		if ($fetch_mod) {
			$result = $stmt->fetchAll($fetch_mod);
		} else {
			$result = $stmt->fetchAll();
		}

		return $result;
	}

	public function fetchOneByNormal($sql, $fetch_mod = '') {
		$sql = str_ireplace('previous_', DB_PREFIX,$sql);

		try {
			$stmt = $this->query($sql);
		} catch(PDOException $e) {
			$this->debug($e->errorInfo);die;
		}

		if ($fetch_mod) {
			$result = $stmt->fetch($fetch_mod);
		} else {
			$result = $stmt->fetch();
		}
		$stmt->closeCursor();

		return $result;
	}

	public function replaceDMLPrevious($text,$word,$replace_word,$pos=1){
		$text_array = explode($word,$text);
		$num = count($text_array) - 1;
        if($pos > $num){
	        $this->debug('找不到需要替换的表前缀');die;
		}
		$result_str = '';
		for($i = 0;$i <= $num;$i++){
			if($i == $pos-1){
				$result_str .= $text_array[$i].$replace_word;
			}else{
				$result_str .= $text_array[$i].$word;
            }
        }
		return rtrim($result_str,$word);
	}


	public function executeDMLByNormal($sql) {
		// 只替换第一次出现的previous 防止用户利用替换获取表前缀,也可以防止对用户输入数据进行替换
		$sql = $this->replaceDMLPrevious($sql, 'previous_', DB_PREFIX, 1);
		try {
			$num = $this->exec($sql);
		} catch(PDOException $e) {
			$this->debug($e->errorInfo);die;
		}

		return $num;
	}

	/**
	 * @param string $fetch_mod
	 *
	 * @return array 空数组:没有结果集 非空数组:有结果集(find方法返回一维数组,select方法返回多维数组) 语句错误:debug
	 */
	public function fetchAllByPrepare($fetch_mod = '') {
		if (isset($this->stmt[$this->stmtCurrentIndex]) && ($this->stmt[$this->stmtCurrentIndex] instanceof PDOStatement)) {
			if ($this->stmtCurrentIndex !== 'default' && isset($this->bindList[$this->stmtCurrentIndex])) {
				$this->bindListOfWhere = $this->bindList[$this->stmtCurrentIndex];
			}
		} else {
			$this->stmt[$this->stmtCurrentIndex] = $this->prepare($this->finalSQL);
			if (!is_array($this->bindListOfWhere)) {
				$this->debug('bindListOfWhere参数不是数组');die;
			}
		}

		if (!empty($this->bindListOfWhere)) {
			foreach ($this->bindListOfWhere as $key=>$value) {
				$this->stmt[$this->stmtCurrentIndex]->bindParam(':'.$key, $this->whereBindValues[$key], $value);
			}
		}

		try {
			$this->stmt[$this->stmtCurrentIndex]->execute();
		} catch(PDOException $e) {
			$this->debug($e->errorInfo);die;
		}

		if ($fetch_mod) {
			$result = $this->stmt[$this->stmtCurrentIndex]->fetchAll($fetch_mod);
		} else {
			$result = $this->stmt[$this->stmtCurrentIndex]->fetchAll();
		}

		if ($this->queryType === 'find') {
			$result = isset($result[0]) ? $result[0] : array();
			return $result;
		} else {
			return $result;
		}
	}

	/**
	 * @return int 0:零行影响 大于0:影响结果 语句错误:debug
	 */
	public function executeDMLByPrepare() {
		if (isset($this->stmt[$this->stmtCurrentIndex]) && ($this->stmt[$this->stmtCurrentIndex] instanceof PDOStatement)) {
			if ($this->stmtCurrentIndex !== 'default' && isset($this->bindList[$this->stmtCurrentIndex])) {
				$this->bindListOfWhere = $this->bindList[$this->stmtCurrentIndex];
			}
		} else {
			$this->stmt[$this->stmtCurrentIndex] = $this->prepare($this->finalSQL);
			if (!is_array($this->bindListOfWhere)) {
				$this->debug('bindListOfWhere参数不是数组');die;
			}
		}

		$table_name = $this->from;
		$table_structure = structure::$$table_name;

		if (!empty($this->DMLBindValues)) {
			foreach ($this->DMLBindValues as $key => $value) {
				if (isset($table_structure[$key])) {
					$this->stmt[$this->stmtCurrentIndex]->bindParam(':'.$key, $this->DMLBindValues[$key], $table_structure[$key]);
				} else {
					$this->debug('dml语句中set方法无法从缓存表结构中找到该字段:`' . $table_name. '`.`' . $key . '`');
					die;
				}
			}
		} else {
			if ($this->queryType != 'delete') {
				$this->debug('update 与 insert类型查询语句 无法正确获得set项');die;
			}
		}

		if (!empty($this->bindListOfWhere)) {
			foreach ($this->bindListOfWhere as $key=>$value) {
				$this->stmt[$this->stmtCurrentIndex]->bindParam(':'.$key, $this->whereBindValues[$key], $value);
			}
		}

		try {
			$this->stmt[$this->stmtCurrentIndex]->execute();
		} catch(PDOException $e) {
			$this->debug($e->errorInfo);die;
		}

		$num = $this->stmt[$this->stmtCurrentIndex]->rowCount();
		return $num;
	}

	public function setDMLBindValues($values = array()) {
		$this->DMLBindValues = $values;
	}

	public function setWhereBindValues($values = array()) {
		$this->whereBindValues = $values;
	}

	/**
	 * 检查指定表,指定字段的值是否已经存在
	 * @param $table 表名
	 * @param $field 字段名
	 * @param $value 字段值
	 *
	 * @return bool true 代表没有相同数据 false 已经有相同数据
	 */
	public function checkUnique($table, $field, $value) {
		$whereBind = array($field => $value);
		$result = $this->find($table)->fields(array($field))->where($field . '=:' . $field,$whereBind)->go();

		if (empty($result)) {
			return true;
		} else {
			return false;
		}
	}
}
