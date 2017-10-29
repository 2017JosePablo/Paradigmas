<?php
if(isset($_POST['crop_image']))
{
  $y1=$_POST['top'];
  $x1=$_POST['left'];
  $w=$_POST['right'];
  $h=$_POST['bottom'];
  $image="images/image1.jpg";

  list( $width,$height ) = getimagesize( $image );
  $newwidth = 600;
  $newheight = 400;

  $thumb = imagecreatetruecolor( $newwidth, $newheight );
  $source = imagecreatefromjpeg($image);

  imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
  imagejpeg($thumb,$image,100);


  $im = imagecreatefromjpeg($image);
  $dest = imagecreatetruecolor($w,$h);

  imagecopyresampled($dest,$im,0,0,$x1,$y1,$w,$h,$w,$h);
  imagejpeg($dest,"images/crop_image.jpg", 100);
}
?>
