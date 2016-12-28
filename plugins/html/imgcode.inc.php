<?php
class verify
{
    private $width;
    private $height;
    private $codeNum;
    private $image; //ͼ����Դ
    private $disturbColorNum;
    private $checkCode;

    function __construct($width = 65, $height = 25, $codeNum = 4)
    {
        $this->width     = $width;
        $this->height    = $height;
        $this->codeNum   = $codeNum;
        $this->checkCode = $this->createCheckCode();
        $number          = floor($width * $height / 15);

        if ($number > 240 - $codeNum) {
            $this->disturbColorNum = 240 - $codeNum;
        } else {
            $this->disturbColorNum = $number;
        }


    }

    //ͨ�����ʸ÷���������������ͼ��
    function showImage($fontFace = "")
    {
        $this->createImage();
        $this->setDisturbColor();
        $this->outputText($fontFace);
        $this->outputImage();
    }

    //ͨ�����ø÷�����ȡ�����������֤���ַ���
    function getCheckCode()
    {
        return $this->checkCode;
    }

    private function createImage()
    {
        $this->image = imagecreatetruecolor($this->width, $this->height);
        //�������ɫ
        $backColor = imagecolorallocate($this->image, rand(225, 255), rand(225, 255), rand(225, 255));
        //�������ɫ
        imagefill($this->image, 0, 0, $backColor);
        //�߿���ɫ
        $border = imagecolorallocate($this->image, 0, 0, 0);
        //���α߿�
        imagerectangle($this->image, 0, 0, $this->width - 1, $this->height - 1, $border);
    }

    private function  setDisturbColor()
    {
        for ($i = 0; $i < $this->disturbColorNum; $i++) {
            // �����ɫ
            $color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
            imagesetpixel($this->image, rand(1, $this->width - 2), rand(1, $this->height - 2), $color);
        }

        for ($i = 0; $i < 10; $i++) {
            // ��������ɫ
            $color = imagecolorallocate($this->image, rand(200, 255), rand(200, 255), rand(200, 255));
            imagearc($this->image, rand(-10, $this->width), rand(-10, $this->height), rand(30, 300), rand(20, 200), 55, 44, $color);
        }
    }

    private function createCheckCode()
    {
        $code   = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ";
        $string = '';
        for ($i = 0; $i < $this->codeNum; $i++) {
            $char = $code{rand(0, strlen($code) - 1)};
            $string .= $char;
        }

        return $string;
    }

    private function outputText($fontFace = "")
    {
        for ($i = 0; $i < $this->codeNum; $i++) {
            $fontcolor = imagecolorallocate($this->image, rand(0, 128), rand(0, 128), rand(0, 128));
            if ($fontFace == "") {
                $fontsize = 5;
                $x        = floor($this->width / $this->codeNum) * $i + 3;
                $y        = rand(0, $this->height - 15);
                imagechar($this->image, $fontsize, $x, $y, $this->checkCode{$i}, $fontcolor);
            } else {
                $fontsize = rand(12, 16);
                $x        = floor(($this->width - 8) / $this->codeNum) * $i + 8;
                $y        = rand($fontSize + 5, $this->height);
                imagettftext($this->image, $fontsize, rand(-30, 30), $x, $y, $fontcolor, $fontFace, $this->checkCode{$i});
            }
        }
    }

    private function outputImage()
    {
        if (imagetypes() & IMG_GIF) {
            header("Cache-Control: no-cache,no-store,must-revalidate");
            header("Pragma: no-cache");
            header("Expires:0");
            header("Content-Type:image/gif");
            imagepng($this->image);
        } else if (imagetypes() & IMG_JPG) {
            header("Cache-Control: no-cache,no-store,must-revalidate");
            header("Pragma: no-cache");
            header("Expires:0");
            header("Content-Type:image/jpeg");
            imagepng($this->image);
        } else if (imagetypes() & IMG_PNG) {
            header("Cache-Control: no-cache,no-store,must-revalidate");
            header("Pragma: no-cache");
            header("Expires:0");
            header("Content-Type:image/png");
            imagepng($this->image);
        } else if (imagetypes() & IMG_WBMP) {
            header("Cache-Control: no-cache,no-store,must-revalidate");
            header("Pragma: no-cache");
            header("Expires:0");
            header("Content-Type:image/vnd.wap.wbmp");
            imagepng($this->image);
        } else {
            die("��֧��ͼ�񴴽�");
        }
    }

    function __destruct()
    {
        imagedestroy($this->image);
    }
}

session_start();
$verify = new verify();
$verify->showImage();
$code               = $verify->getCheckCode();
$_SESSION['valicode'] = strtolower($code);
?>