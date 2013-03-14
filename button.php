<?php 

        $btn_text=$_GET['btn_text'];

   	    $im=imagecreatefrompng('cart_btn.png');

        $width=imagesx($im);
        $height=imagesy($im);

        $text_x=8;
        $text_y=$height/2+4;

        //putenv('GDFONTPATH=');
        $fontname='c:/windows/fonts/MSYH.ttf';
        $fontsize=10;
        $gray=imagecolorallocate($im, 50, 50, 50);

        imagettftext($im, $fontsize, 0, $text_x, $text_y, $gray, $fontname, $btn_text);

        Header('Content-Type: image/png');
        imagepng($im);

        ImageDestroy($im);
?>