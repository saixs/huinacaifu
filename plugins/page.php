<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-28
 * Time: 下午4:38
 */

/**
 * @Intro	分页类
 * @Author	wuu!
 * @Email   easy_borrow@163.com
 */

class myPage {
    public  $sql;
    public  $size;
    public  $pageList = array();
    public  $start;
    public  $limit = '';
    public  $pageNavigate = '';
    private $rowCount;
    private $pageCount = 0;
    private $currentPage = 1;


    /**
     * @param $url see self::getNavigate
     * @param $size 每页显示数量
     * @param $sql  查询语句 根据该语句会自动替换select 到 from 之间的内容,生成count(*)语句
     */
    public function __construct($sql, $url ,$size = 10) {
        $this->sql = $sql;
        $this->size = $size;
        $this->getCurrentPage();
        $this->getRowCount();
        $this->getPageCount();
        $this->getLimit();
        $this->getNavigate($url);
        $this->getList();
    }


    // 获取当前页
    private function getCurrentPage() {
        if (isset($_GET['currentPage'])) {
            $current = $_GET['currentPage'];
        } elseif (isset($_POST['currentPage'])) {
            $current = $_POST['currentPage'];
        } else {
            $current = 1;
        }

        if (isset($current)) {
            if ($current < 1) {
                $current = 1;
            }
            $this->currentPage = intval($current);
        }
    }

    // 统计总行数
    private function getRowCount() {
        global $db;
        $this->rowCount = 0;
        $pattern = '/^select\s+.+from\s+/ius';
        $count_sql = preg_replace($pattern,'select count(*) as cnt from ', $this->sql);
        $res = $db->fetchOneByNormal($count_sql);
        $this->rowCount = $res['cnt'];
    }

    // 统计总页数
    private function getPageCount() {
        $this->pageCount = ceil($this->rowCount / $this->size);
    }

    // 当前页的limit信息
    private function getLimit() {
        $this->start = ($this->currentPage - 1) * $this->size;
        $this->limit = ' LIMIT ' . $this->start . ',' . $this->size;
    }

    // 列表 return array to $this->pageList
    public function getList() {
        global $db;
        $final_sql = $this->sql.$this->limit;
        $this->pageList = $db->fetchAllByNormal($final_sql);
    }

    // 分页导航
    private function getNavigate($url) {
        $pageUp = $this->currentPage - 9;
        $pageDown = $this->currentPage + 9;
        if ($this->currentPage >= 6) {
            $this->pageNavigate .= "<a href='{$url}currentPage/1'>第一页</a>&nbsp;&nbsp;";
        }
        if ($this->currentPage > 10) {
            $this->pageNavigate .= "<a href='{$url}currentPage/$pageUp'>前十页</a>&nbsp;&nbsp;";
        }
        if ($this->currentPage <= 5) {
            for ($i = 1; $i <= 10 && $i <= $this->pageCount; $i++) {
                if ($i == $this->currentPage) {
                    $this->pageNavigate .= "<font color='red'>$i</font>&nbsp;&nbsp;";
                } else {
                    $this->pageNavigate .= "<a href='{$url}currentPage/$i'>$i</a>&nbsp;&nbsp;";
                }
            }
        } else {
            for ($i = $this->currentPage - 4; $i <= $this->currentPage + 4 && $i <= $this->pageCount; $i++) {
                if ($i == $this->currentPage) {
                    $this->pageNavigate .= "<font color='red'>$i</font>&nbsp;&nbsp;";
                } else {
                    $this->pageNavigate .= "<a href='{$url}currentPage/$i'>$i</a>&nbsp;&nbsp;";
                }
            }
        }
        if ($this->currentPage < $this->pageCount - 10) {
            $this->pageNavigate .= "<a href='{$url}currentPage/$pageDown'>后十页</a>&nbsp;&nbsp;";
        }

        $this->pageNavigate .= '当前第'.$this->currentPage.'页.&nbsp;&nbsp;总计:'.$this->pageCount.'页';
    }
}

// 使用示例
/*$sql = "select * from `previous_users`";
$page = new page($sql, WEB_APP_PATH.'temp_verify','20');
var_dump($page->pageList);
var_dump($page->pageNavigate);*/
