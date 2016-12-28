<?php
//加载tcpdf类
define('C_PATH',$_SERVER['DOCUMENT_ROOT']);
require_once($_SERVER['DOCUMENT_ROOT']."/pdf/tcpdf.php");
require_once("/www/pdf/config/lang/chi.php");
class myPDF{ 
    //把一个纯Html页面转化为Pdf
    /**
    $html:页面内容
    $filename: 保存的pdf文件名
    author:chenwei
    */
    function downHtmlToPdf($html,$filename){
        global $l;
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);        
        
        $pdf->setHeaderFont(Array('droidsansfallback', '', 10));
        $pdf->setFooterFont(Array('droidsansfallback', '', 8)); 
        $pdf->SetDefaultMonospacedFont('courier'); 
        $pdf->SetMargins(15, 27, 15);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(10);   
        $pdf->SetAutoPageBreak(TRUE, 15);   
        $pdf->setImageScale(1.25);        
        $pdf->setLanguageArray($l);  
        $pdf->SetFont('droidsansfallback', '', 15);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->lastPage();
        $pdf->Output($filename, 'D');
    }
    /*downlod wqs 12-19*/
    function downpdf($fname,$htmmlcontents,$pwd,$type){
		global $l;
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->setHeaderFont(Array('droidsansfallback', '', 10));
        $pdf->setFooterFont(Array('droidsansfallback', '', 8)); 
        $pdf->SetDefaultMonospacedFont('courier'); 
        $pdf->SetMargins(15, 27, 15);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(10);   
        $pdf->SetAutoPageBreak(TRUE, 15);   
        $pdf->setImageScale(1.25);        
        $pdf->setLanguageArray($l);  
        $pdf->SetFont('droidsansfallback', '', 15);
        $pdf->AddPage();
        $pdf->writeHTML($htmmlcontents, true, false, true, false, '');
        $pdf->lastPage();
        $pdf->SetProtection	($permissions = array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'),
            $user_pass = $pwd,//安全密码设置
            $owner_pass = null,
            $mode = 0,
            $pubkeys = null 
        );	
        $pdf->Output($fname, $type);//D实现下载   I浏览器浏览  
    }
}

if (isset($_GET['id'])) {
	$id = intval($_GET['id']);
	if ($id > 0) {
		date_default_timezone_set('PRC');
		$path = "http://bljinrong.com/protocol/main.html?borrow_id=".$id;
		$content = file_get_contents($path,false, $context);
		$pdf = new myPDF();
		$pdf->downpdf('借款协议',$content, '111','D');
	} else {
		die('非法访问');
	}
} else {
	die('非法访问');
}

?>