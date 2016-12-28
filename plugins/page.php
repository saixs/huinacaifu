<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-28
 * Time: ����4:38
 */

/**
 * @Intro	��ҳ��
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
     * @param $size ÿҳ��ʾ����
     * @param $sql  ��ѯ��� ���ݸ������Զ��滻select �� from ֮�������,����count(*)���
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


    // ��ȡ��ǰҳ
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

    // ͳ��������
    private function getRowCount() {
        global $db;
        $this->rowCount = 0;
        $pattern = '/^select\s+.+from\s+/ius';
        $count_sql = preg_replace($pattern,'select count(*) as cnt from ', $this->sql);
        $res = $db->fetchOneByNormal($count_sql);
        $this->rowCount = $res['cnt'];
    }

    // ͳ����ҳ��
    private function getPageCount() {
        $this->pageCount = ceil($this->rowCount / $this->size);
    }

    // ��ǰҳ��limit��Ϣ
    private function getLimit() {
        $this->start = ($this->currentPage - 1) * $this->size;
        $this->limit = ' LIMIT ' . $this->start . ',' . $this->size;
    }

    // �б� return array to $this->pageList
    public function getList() {
        global $db;
        $final_sql = $this->sql.$this->limit;
        $this->pageList = $db->fetchAllByNormal($final_sql);
    }

    // ��ҳ����
    private function getNavigate($url) {
        $pageUp = $this->currentPage - 9;
        $pageDown = $this->currentPage + 9;
        if ($this->currentPage >= 6) {
            $this->pageNavigate .= "<a href='{$url}currentPage/1'>��һҳ</a>&nbsp;&nbsp;";
        }
        if ($this->currentPage > 10) {
            $this->pageNavigate .= "<a href='{$url}currentPage/$pageUp'>ǰʮҳ</a>&nbsp;&nbsp;";
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
            $this->pageNavigate .= "<a href='{$url}currentPage/$pageDown'>��ʮҳ</a>&nbsp;&nbsp;";
        }

        $this->pageNavigate .= '��ǰ��'.$this->currentPage.'ҳ.&nbsp;&nbsp;�ܼ�:'.$this->pageCount.'ҳ';
    }
}

// ʹ��ʾ��
/*$sql = "select * from `previous_users`";
$page = new page($sql, WEB_APP_PATH.'temp_verify','20');
var_dump($page->pageList);
var_dump($page->pageNavigate);*/
