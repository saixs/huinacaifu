<?php
/**
 * @Author: Wuu!
 * @cTime:  13-3-26 ����7:35
 * @Email:  easy_borrow@163.com
 * Created by JetBrains PhpStorm.
 */

/**
 * Class prepareCore ����PDO�����ݿ�ײ㴦����
 */
if (!function_exists('checkAccess')) {
    die('�Ƿ�����');
}

class dbCore extends PDO {

	// �Բ��������ѯ�����û�debugʱ��¼���û�����IP��ַ
	private $debug = TRUE;                  // �Ƿ���debug, true: ֱ�Ӵ�ӡ������Ϣ false:������Ϣд�� webRoot/noAccessPath/log/error.log ��
	private $order = '';
	private $where = '';
	private $group = '';
	private $limit = '';
	private $having = '';
	private $from = '';                     // �����Ҫ�õ��ı���
	private $join = '';                     // ���Ӳ�ѯ����Ҫ�����
	private $queryType = '';                // ��ѯ����. ��:select update insert...
	private $fields;              // select ��ѯ������ֶ���Ϣ  insert update ����� set ����ֶ���Ϣ
	private $DMLBindValues = array();            // update��delete�����set����Ӧ��ֵ
	private $whereBindValues = array();          // where �����и��ֶε�ֵ
	private $bindListOfWhere = array();     // Ԥ������Ҫʹ�õ�where����������:name �б�
	private $bindList = array();
	private $attributeStatus = 0;           // ����ǰ��������״̬
	private $tableRealNameList = array();   // ��ѯ��������Ҫʹ�õı��Ŷ�Ӧ�ı���,���ڹ���sql���Ĺ�����,�Զ��������Զ���ǰ׺
	private $tableAliasList = array();      // ���������������ƶ�Ӧ�����
	private $fieldsAutoAlias = TRUE;        // �Ƿ��Զ�������ѯ��������� ������ʽΪ ����_�ֶ���
	public  $finalSQL = '';                  // ���ղ�ѯ��sql���
	private $stmt = array();                // PDOSTMT���󽫴�Ž�������,����Ϊself::stmtCurrentIndex
	public  $stmtCurrentIndex = 'default';

	public function __construct() {
		try {
			parent::__construct(DSN, DB_USER, DB_PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'GBK\''));
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$this->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
		} catch(PDOException $e) {
			die('���ݿ����ӳ�ʼ��ʧ��!');
		}

		$this->initStructure();
        include_once $_SERVER['DOCUMENT_ROOT'].'/include/tableStructure/structure.php';
	}

	/**
	 * �ÿձ�������,��ֹ���´β�ѯ������װ��ɸ���
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
	 * ��������Ԥ����ı�ṹ�����ļ�,���������ֶε�Ԥ��������
	 */
	public function initStructure() {
		$file_name = SERVER_ROOT . '/tableStructure/structure.php';
		if (!file_exists($file_name)) {
			$sql = 'show tables';
			$result = $this->fetchAllByNormal($sql, PDO::FETCH_NUM);
			if ($result) {
				$tables = $result;
			} else {
				$this->debug('��ṹ��ʼ��ʧ��,�޷���ȡ����!');die;
			}

			$contents = array();
			foreach ($tables as $value) {
				$sql = "desc `$value[0]`";
				$result = $this->fetchAllByNormal($sql);
				if ($result) {
					$columns = $result;
				} else {
					$this->debug('��ṹ��ʼ��ʧ��,�޷���ȡ���ֶ�!');die;
				}

				// �����б�ṹ��Ϣװ������
				foreach ($columns as $val) {
					// $contents['����']['�ֶ���'] = Ԥ��������
					$contents[$value['0']][$val['Field']] = $this->matchColumnType($val['Type']);
				}
			}

			/*
			 * ���µĴ��������Ϊ:������ṹ����,��ȡ�ֶ�������ֶ�Ԥ����������Ϣ.
			 * ��ÿ�ű����Ϣ��Ϊstructure���һ�������;�̬����,�Ա�����Ϊ������.д��/tableStructure/structure.php
			 */

			$string_header = '<?php' . "\r\n" . 'class structure {' . "\r\n";
			$table_list = '';

			foreach ($contents as $key=>$value) {
				$field_info = '';
				foreach ($value as $inner_key=>$inner_value) {
					// ��ʽΪ:'�ֶ���'=>'Ԥ��������',
					$field_info .= '\'' . $inner_key . '\'' . '=>' . '\'' . $inner_value . '\',';
				}
				// ��ʽΪ: static $���� = array('�ֶ���'=>'Ԥ��������'...);
				$table_list .= "\t" . 'static $' . $key . ' = array(' . $field_info . ');' . "\r\n";
			}

			$string_footer = "\r\n" . '}';

			$contents = $string_header . $table_list . $string_footer;

			if (buildAndPut($file_name, $contents) <= 0) {
				$this->debug('��ṹ��ʼ��ʧ��,û��д���κ�����!');die;
			}
		}
	}

	/**
	 * ���������� ������Ӧ��Ԥ��������
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
			die('���!���������ش���,�ô����Ѿ�����¼,��������������������,����ϵϵͳ����Ա!');
		}
	}

	private function getTable($table = '') {

		if (is_array($table)) {
			if (count($table) == 2) {
				$sql = '`' . DB_PREFIX . $table[0] . '`' . 'AS ' . $table[1];
				$fullName = DB_PREFIX . $table[0];
			} else {
				$this->debug('getTable������Ҫ����������ֵ������,�ڶ���ֵ�������');die;
			}
		} else {
			$sql = DB_PREFIX . $table;
			$fullName = DB_PREFIX . $table;
		}

		if (!empty($fullName) && isset(structure::$$fullName)) {
			$this->tableRealNameList[0] = $fullName;

			$alias = is_array($table) ? $table[1] : $table;
			$this->tableAliasList[$fullName] = $alias; // ������Ӧ�ı���
			$this->tableAliasList[$alias] = $fullName; // ������Ӧ�ı���
			$this->from = $sql;
		} else {
			$this->debug('����ı���:' . $table);die;
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
	 * @param $autoAlias bool �Ƿ��Զ������в�ѯ�ֶα���
	 * ����ѯ��ʽ: array('tableName1'=>array('field1','count'=>'field2'...),'tableName2'=>array(...))
	 * �����ѯ��ʽ:array('field1','count'=>'field2'...)
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
	 * @param array  $data   ��ʽ: array('noBindFieldName'=>'value',':bindFieldName'=>'value'...)
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
	 * ���Ӳ�ѯ
	 * @param array $join ��ʽ: array('���ӱ���1'=>array('��ǰ��������on�ĶԱ���','�Ա������','���������ı���.������������on�ĶԱ���')[,...])
	 * ����: array('users'=>array('id','>=','alias.id'))
	 * @return $this
	 */
	public function leftJoin($join = array()) {
		if (empty($join) || !is_array($join)) {
			$this->debug('join�����봫���������');die;
		}

		$str = '';
		$i = 1;

		// $join ��ʽ:array('users'=>array('id','>=','0.id')...)
		foreach ($join as $key=>$value) {
			$this->tableRealNameList[$i] = DB_PREFIX . $key; // ��ʵ����
			$this->tableAliasList[$this->tableRealNameList[$i]] = $value['alias']; // ������Ӧ����
			$this->tableAliasList[$value['alias']] = $this->tableRealNameList[$i]; // ������Ӧ����
			$i++;
		}

		$i = 1;
		foreach ($join as $key=>$value) {
			$str .= "\r\n" . 'left join ' . '`' . $this->tableRealNameList[$i] . '` AS ' . $this->tableAliasList[$this->tableRealNameList[$i]]; // ����join���
			$count = count($value);

			if ($count == 3 || $count == 4) { //���û�д���on��������� Ĭ��Ϊ�Ⱥ�
				if ($count == 3) {
					$array = explode('.', $value[1]); // $value[1]/[2] ��ʽΪ '0.id'
					$operator = '=';
				} else {
					$array = explode('.', $value[2]);
					$operator = $value[1];
				}

				// ȥ����β�ո�
				foreach ($array as $inner_key=>$inner_value) {
					$array[$inner_key] = trim($inner_value);
				}

				// $array[0]: on����Աȵ���һ�ű�ı�������Ӧ�ı���
				$match_table_name = $this->tableAliasList[$array[0]];

				// $array[1]: on����Աȵ���һ�ű���ֶ���
				$match_column_name = $array[1];

				if (!isset(structure::$$match_table_name)) {
					$this->debug('leftJoin��������:ON�����б���:`' . $array[0] . '`ƥ�䵽�ı���Ϊ`' . $match_table_name . '`�ñ��ڱ�ṹ�����в�����');die;
				}

				$str .= ' on `' . $key . '`.`' . $value[0] . '` ' . $operator . ' `' . $array[0] . '`.`' . $match_column_name . '` '; // ���� on ���
			} else {
				$this->debug('join����δ������ȷ������');die;
			}
			$i++;
		}
		if (!$str) {
			$this->debug('ʹ����join��������û����ȷ��ȡjoin����');die;
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
					$this->debug('δ֪�Ĳ�ѯ����:' . $this->queryType);die;
			}
			$this->finalSQL = $sql;
			//echo $sql;
			$result = $this->executeDMLByPrepare();
		}
		return $result;
	}

	/**
	 * ����dml insert update �����������������Ӧ��ֵ
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
			// ��ȡ���б�
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
			// ��ȡ���б�
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
			$this->bindList[$this->stmtCurrentIndex] = $this->bindListOfWhere; // ��ֹ��ǰSTMT����İ��б�������ѯ��串��
		}
	}

	private function setFields($count) {
		if ($this->queryType == 'select' || $this->queryType == 'find') {
			$fields = '';
			// ���û���ֶ�,����ֵΪ* ���Զ�����ֶ�,��������
			if ($this->fields === '' || $this->fields === '*') {
				foreach ($this->tableRealNameList as $table) {
					if (!isset(structure::$$table)) {
						$this->debug('setFields��������,�����ڸñ���:' . $table);die;
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
							$this->debug('����ѯ�ֶ��봫���ά����');die;
						} elseif ($value === '' || $value === '*') {
							$table = $this->tableAliasList[$key];
							if (!isset(structure::$$table)) {
								$this->debug('setFields��������,�����ڸñ���:' . $table);die;
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
			$this->debug('��ѯ�����뷽������,��Ҫʹ��setFields����');die;
		}

		return ltrim($fields, ',');
	}

	public function go($fetch_mod = '') {
		return $this->getSQLByQueryType($fetch_mod);
	}

	/**
	 * ��ʹ�ð󶨲����ķ�ʽ����dql���,��ȡ���н����(ע��:���ϸ����sql���,�������ڼ򵥵Ĳ�ѯ��where����Ϊ��ֵ�͵����,ת���������ͺ�ʹ�ô˷���)
	 * @param string $sql
	 * @param string $fetch_mod
	 *
	 * @return array ������:���н�� �ǿ�����:�н�� ������:debug
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
	        $this->debug('�Ҳ�����Ҫ�滻�ı�ǰ׺');die;
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
		// ֻ�滻��һ�γ��ֵ�previous ��ֹ�û������滻��ȡ��ǰ׺,Ҳ���Է�ֹ���û��������ݽ����滻
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
	 * @return array ������:û�н���� �ǿ�����:�н����(find��������һά����,select�������ض�ά����) ������:debug
	 */
	public function fetchAllByPrepare($fetch_mod = '') {
		if (isset($this->stmt[$this->stmtCurrentIndex]) && ($this->stmt[$this->stmtCurrentIndex] instanceof PDOStatement)) {
			if ($this->stmtCurrentIndex !== 'default' && isset($this->bindList[$this->stmtCurrentIndex])) {
				$this->bindListOfWhere = $this->bindList[$this->stmtCurrentIndex];
			}
		} else {
			$this->stmt[$this->stmtCurrentIndex] = $this->prepare($this->finalSQL);
			if (!is_array($this->bindListOfWhere)) {
				$this->debug('bindListOfWhere������������');die;
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
	 * @return int 0:����Ӱ�� ����0:Ӱ���� ������:debug
	 */
	public function executeDMLByPrepare() {
		if (isset($this->stmt[$this->stmtCurrentIndex]) && ($this->stmt[$this->stmtCurrentIndex] instanceof PDOStatement)) {
			if ($this->stmtCurrentIndex !== 'default' && isset($this->bindList[$this->stmtCurrentIndex])) {
				$this->bindListOfWhere = $this->bindList[$this->stmtCurrentIndex];
			}
		} else {
			$this->stmt[$this->stmtCurrentIndex] = $this->prepare($this->finalSQL);
			if (!is_array($this->bindListOfWhere)) {
				$this->debug('bindListOfWhere������������');die;
			}
		}

		$table_name = $this->from;
		$table_structure = structure::$$table_name;

		if (!empty($this->DMLBindValues)) {
			foreach ($this->DMLBindValues as $key => $value) {
				if (isset($table_structure[$key])) {
					$this->stmt[$this->stmtCurrentIndex]->bindParam(':'.$key, $this->DMLBindValues[$key], $table_structure[$key]);
				} else {
					$this->debug('dml�����set�����޷��ӻ����ṹ���ҵ����ֶ�:`' . $table_name. '`.`' . $key . '`');
					die;
				}
			}
		} else {
			if ($this->queryType != 'delete') {
				$this->debug('update �� insert���Ͳ�ѯ��� �޷���ȷ���set��');die;
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
	 * ���ָ����,ָ���ֶε�ֵ�Ƿ��Ѿ�����
	 * @param $table ����
	 * @param $field �ֶ���
	 * @param $value �ֶ�ֵ
	 *
	 * @return bool true ����û����ͬ���� false �Ѿ�����ͬ����
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
