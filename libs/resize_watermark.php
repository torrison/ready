<?php

/*

author: Eric Bruggema
restrictions: none, use it to save time!
purpose: easy altering of images.

www.ericbruggema.nl
date: 2011-feb-02

*/

class thumbnail
{
 /* thumbnail class based on

http://www.phpclasses.org/browse/file/8316.html

 altered for easy use in my own MVC
 */
 private $imageObject = false;
 private $imageWidth  = 0;
 private $imageHeight = 0;

 private $watermarkObject = false;
 private $watermarkWidth  = 0;
 private $watermarkHeight = 0;

 public function getsize()
 {
 if ($this->imageObject != false)
 {
 return array($this->imageWidth, $this->imageHeight);
 }

 return false;
 }

 public function resize($width = 0, $height = 0, $biggest = false, $bicubic = false)
 {

 $new_height = 0;
 $new_width  = 0;

 if ($this->imageObject != false)
 {
 if ($width  == 0 &&
 $height >  0)
 {
 // scale to given height
 $new_height = $height;
 $new_width  = $this->imageWidth / ($this->imageHeight / $height);
 }
 elseif ($height == 0 &&
 $width  >  0)
 {
 // scale to give width
 $new_height = $this->imageHeight / ($this->imageWidth / $width);
 $new_width  = $width;
 }
 elseif ($width  > 0 &&
 $height > 0)
 {
 if ($biggest == false)
 {
 // resize to given height/width
 $new_height = $height;
 $new_width  = $width;
 }
 else
 {
 // resize to biggest of one of 2
 if ($height > $width)
 {
 // height is biggest
 $new_height = $height;
 $new_width  = $this->imageWidth / ($this->imageHeight / $height);
 }
 else
 {
 // width is biggest
 $new_height = $height;
 $new_width  = $this->imageWidth / ($this->imageHeight / $height);
 }
 }
 }

 // check if image is bigger
 if ($new_height != 0 &&
 $new_width  != 0)
 {
 // resize image
 $newIm = imagecreatetruecolor($new_width,
 $new_height);

 if ($bicubic == false)
 {
 imagecopyresampled($newIm,
 $this->imageObject,
 0,
 0,
 0,
 0,
 $new_width,
 $new_height,
 $this->imageWidth,
 $this->imageHeight);
 }
 else
 {
 $this->bicubic($newIm,
 $this->imageObject,
 0,
 0,
 0,
 0,
 $new_width,
 $new_height,
 $this->imageWidth,
 $this->imageHeight);
 }

 // return info change object settings
 $this->imageObject = $newIm;
 $this->imageWidth  = imagesx($newIm);
 $this->imageHeight = imagesy($newIm);

 return true;
 }
 }

 return false;
 }

 private function bicubic(&$dst_image, &$src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h)
 {
 // we should first cut the piece we are interested in from the source
 // php.net
 $src_img = ImageCreateTrueColor($src_w,
 $src_h);
 imagecopy($src_img,
 $src_image,
 0,
 0,
 $src_x,
 $src_y,
 $src_w,
 $src_h);

 // this one is used as temporary image
 $dst_img = ImageCreateTrueColor($dst_w,
 $dst_h);

 ImagePaletteCopy($dst_img,
 $src_img);
 $rX = $src_w / $dst_w;
 $rY = $src_h / $dst_h;
 $w = 0;

 for ($y = 0; $y < $dst_h; $y++)
 {
 $ow = $w;
 $w  = round(($y + 1) * $rY);
 $t  = 0;
 for ($x = 0; $x < $dst_w; $x++)
 {
 $r = $g = $b = 0; $a = 0;
 $ot = $t; $t = round(($x + 1) * $rX);
 for ($u = 0; $u < ($w - $ow); $u++)
 {
 for ($p = 0; $p < ($t - $ot); $p++)
 {
 $c = ImageColorsForIndex($src_img,
 ImageColorAt($src_img,
 $ot + $p,
 $ow + $u));
 $r += $c['red'];
 $g += $c['green'];
 $b += $c['blue'];
 $a++;
 }
 }

 ImageSetPixel($dst_img,
 $x,
 $y,
 ImageColorClosest($dst_img,
 $r / $a,
 $g / $a,
 $b / $a));
 }
 }

 // apply the temp image over the returned image and use the destination x,y coordinates
 imagecopy($dst_image,
 $dst_img,
 $dst_x,
 $dst_y,
 0,
 0,
 $dst_w,
 $dst_h);

 // we should return true since ImageCopyResampled/ImageCopyResized do it
 return true;
 }

 public function calculatePosition($curImgSize = 1024, $newInsertSize = 80, $target = 'top')
 {
 $var = 0;
 switch (strtolower($target))
 {
 case 'center':
 $var = ($curImgSize / 2) - ($newInsertSize / 2);
 break;

 case 'bottom':
 case 'right';
 $var = ($curImgSize - $newInsertSize);
 break;

 default:
 case 'top':
 case 'left';
 $var = 0;
 break;
 }

 return $var;
 }

 public function watermark($filename, $valign = 'bottom', $halign = 'left', $vmargin = 0, $hmargin = 0)
 {
 // check if file exists & object exists
 if (file_exists($filename) &&
 $this->imageObject != false)
 {
 // try to load image
 $image = $this->loadImage($filename);

 if ($image != false)
 {
 // load watermark settings into object vars
 list($this->watermarkObject,
 $this->watermarkWidth,
 $this->watermarkHeight) = $image;

 // calculate image positions (width pos)
 $posV = $this->calculatePosition($this->imageWidth,
 $this->watermarkWidth,
 $valign);
 // for height pos
 $posH = $this->calculatePosition($this->imageHeight,
 $this->watermarkHeight,
 $halign);

 // insert watermark into imageobject
 imagecopyresampled($this->imageObject,
 $this->watermarkObject,
 $posV + $vmargin,
 $posH + $hmargin,
 0,
 0,
 $this->watermarkWidth,
 $this->watermarkHeight,
 $this->watermarkWidth,
 $this->watermarkHeight);

 return true;
 }
 }

 return false;
 }

 private function calculateWatermarkTextSize($font_size, $font_angle, $font_file, $text)
 {
 // used from http://www.php.net/manual/en/function.imagettfbbox.php#97357

 $box   = imagettfbbox($font_size,
 $font_angle,
 $font_file,
 $text);
 if(!$box)
 {
 return false;
 }

 $min_x = min(array($box[0],
 $box[2],
 $box[4],
 $box[6]));
 $max_x = max(array($box[0],
 $box[2],
 $box[4],
 $box[6]));
 $min_y = min(array($box[1],
 $box[3],
 $box[5],
 $box[7]));
 $max_y = max(array($box[1],
 $box[3],
 $box[5],
 $box[7]));
 $width  = ($max_x - $min_x);
 $height = ($max_y - $min_y);
 $left   = abs($min_x) + $width;
 $top    = abs($min_y) + $height;

 // to calculate the exact bounding box i write the text in a large image
 $img     = @imagecreatetruecolor($width << 2,
 $height << 2);
 $white   = imagecolorallocate($img,
 255,
 255,
 255);
 $black   = imagecolorallocate($img,
 0,
 0,
 0 );

 imagefilledrectangle($img,
 0,
 0,
 imagesx($img),
 imagesy($img),
 $black);

 // for sure the text is completely in the image!
 imagettftext($img,
 $font_size,
 $font_angle,
 $left,
 $top,
 $white,
 $font_file,
 $text);

 // start scanning (0=> black => empty)
 $rleft   = $w4 = $width<<2;
 $rright  = 0;
 $rbottom = 0;
 $rtop    = $h4 = $height<<2;

 for ($x = 0; $x < $w4; $x++)
 {
 for ($y = 0; $y < $h4; $y++)
 {
 if (imagecolorat($img,
 $x,
 $y))
 {
 $rleft   = min($rleft,
 $x);
 $rright  = max($rright,
 $x);
 $rtop    = min($rtop,
 $y);
 $rbottom = max($rbottom,
 $y);
 }
 }
 }

 // destroy img and serve the result
 imagedestroy($img);

 // return left, top, width, height
 return array($left    - $rleft,
 $top     - $rtop,
 $rright  - $rleft + 1,
 $rbottom - $rtop  + 1 );
 }

 public function watermarkText($text, $color, $font, $fontsize, $fontangle, $valign, $halign, $vmargin, $hmargin)
 {
 if (!preg_match('/[0-9a-fA-F]{6}/',
 $color) OR
 strlen(trim($text)) == 0)
 {
 return false;
 }

 list($left,
 $top,
 $width,
 $height) = $this->calculateWatermarkTextSize($fontsize,
 $fontangle,
 $font,
 trim($text));

 // calculate image positions (width pos)
 $posW = $this->calculatePosition($this->imageWidth,
 $width,
 $valign);
 // for height pos
 $posH = $this->calculatePosition($this->imageHeight,
 $height,
 $halign);

 // copied from http://www.php.net/manual/en/function.imagecolorallocate.php#76891
 $color = imagecolorallocate($this->imageObject,
 hexdec('0x' . $color{0} . $color{1}),
 hexdec('0x' . $color{2} . $color{3}),
 hexdec('0x' . $color{4} . $color{5}));

 imagettftext($this->imageObject,
 $fontsize,
 $fontangle,
 $posW + $vmargin,
 $posH + $hmargin + $height,
 $color,
 $font,
 trim($text));
 return true;
 }

 public function rotate($degrees)
 {
 // check if file exists & object exists
 if ($this->imageObject != false)
 {
 $this->imageObject = imagerotate($this->imageObject,
 $degrees,
 0);

 return true;
 }

 return false;
 }

 public function load($filename)
 {
 if (file_exists($filename))
 {
 $image = $this->loadImage($filename);

 if ($image != false)
 {
 list($this->imageObject,
 $this->imageWidth,
 $this->imageHeight) = $image;

 return true;
 }
 }

 return false;
 }

 private function loadImage($file)
 {
 $imageInformation = getimagesize($file);

 switch ($imageInformation[2])
 {
 case 1:
 // gif
 $im = imagecreatefromgif($file);
 break;

 case 2:
 // jpeg
 $im = imagecreatefromjpeg($file);
 break;

 case 3:
 // png
 $im = imagecreatefrompng($file);
 break;

 default:
 return false;
 break;
 }

 return array($im,
 $imageInformation[0],
 $imageInformation[1]);
 }

 public function CalculateQFactor($targetSize)
 {
 // Based on: JPEGReducer class version 1,  25 November 2004,
 // Author: huda m elmatsani,
 // Email :justhuda@netscape.net

 //calculate size of each image. 75%, 50%, and 25% quality
 foreach (array(75,50,25) AS $size)
 {
 ob_start();
 imagejpeg($this->imageObject,
 '',
 $size);
 $buffer = ob_get_contents();
 ob_end_clean();
 $outputsize[$size] = strlen($buffer);
 }

 //calculate gradient of size reduction by quality
 $mgrad1 = 25 / ($outputsize['50'] - $outputsize['25']);
 $mgrad2 = 25 / ($outputsize['75'] - $outputsize['50']);
 $mgrad3 = 50 / ($outputsize['75'] - $outputsize['25']);
 $mgrad  = ($mgrad1 + $mgrad2 + $mgrad3) / 3;

 //result of approx. quality factor for expected size
 $quality = round($mgrad * ($targetSize - $outputsize['50']) + 50);

 if ($quality < 25)
 {
 $quality = 25;
 }
 elseif ($quality > 100)
 {
 $quality = 100;
 }

 return $quality;
 }

 public function save($filename, $format, $quality)
 {
 if ($this->imageObject != false)
 {
 switch (strtolower($format))
 {
 case "png":
 imagePNG($this->imageObject,
 $filename,
 $quality);
 break;

 default:
 imageJPEG($this->imageObject,
 $filename,
 $quality);
 break;
 }
 }

 return;
 }

 public function display($format = 'png', $quality = 9)
 {
 if ($this->imageObject != false)
 {
 switch (strtolower($format))
 {
 case "png":
 header("Content-type: image/png");
 imagePNG($this->imageObject,
 '',
 $quality);
 break;

 default:

 header("Content-type: image/jpeg");
 imageJPEG($this->imageObject,
 '',
 $quality);
 break;
 }
 exit();
 }
 }
}


function resize_main ($filename)
{$thumb = new thumbnail();
#echo "Make ".$filename;
$thumb->load("pics/pics-estate/".$filename);
$thumb->resize(280, 210, false);
$file = $thumb->save("pics/pics-estate/middle/".$filename, "png", 9);
$thumb->resize(110, 83, false);
$file = $thumb->save("pics/pics-estate/small/".$filename, "png", 9);

$thumb->load("pics/pics-estate/".$filename);
$thumb->resize(640, 480, false);
$thumb->watermark("css/img/watermark.png", 'bottom', 'left', -200, 300);
$file = $thumb->save("pics/pics-estate/".$filename, "png", 9);
}

function resize_array ($filename)
{
$thumb = new thumbnail();
#echo "Make ".$filename;
$thumb->load("pics/pics-estate/".$filename);
$thumb->resize(80, 60, true);

$file = $thumb->save("pics/pics-estate/mini/".$filename, "png", 9);

$thumb->load("pics/pics-estate/".$filename);
$thumb->resize(640, 480, true);
$thumb->watermark("css/img/watermark.png", 'bottom', 'left', -50, 400);
$file = $thumb->save("pics/pics-estate/".$filename, "png", 9);
}


#$thumb = new thumbnail();
#$thumb->load("pics/pics-estate/".$new_file_name);
#$thumb->resize(200, 200, true);
#$thumb->watermark("css/img/watermark.png");
#$file = $thumb->save("pics/pics-estate/small/".$new_file_name, "png", 9);
#$thumb->display("jpg",
# 85);


/*

$thumb = new thumbnail();

$thumb->load($file);
$info = $thumb->getsize(); // returns width/height;
$thumb->resize($x,
 $y,
 true);
$thumb->watermark($file,
 $valign,
 $halign,
 $vmargin,
 $hmargin);
$thumb->watermarkText($text,
 $color,
 $font,
 $valign,
 $halign,
 $vmargin,
 $hmargin);
$file = $thumb->save("file.png",
 "png",
 9);
$thumb->display("jpg",
 85);
*/
?>