<?php 
$_filename='payaid12.png';
$_backgroundColour='0,1,1';
$_img = imagecreatefrompng($_filename);
$_backgroundColours = explode(',', $_backgroundColour);
$_removeColour = imagecolorallocate($_img, (int)$_backgroundColours[0], (int)$_backgroundColours[1], (int)$_backgroundColours[2]);
imagecolortransparent($_img, $_removeColour);
imagesavealpha($_img, true);
$_transColor = imagecolorallocatealpha($_img, 0, 0, 0, 127);
imagefill($_img, 0, 0, $_transColor);
imagepng($_img, $_filename);

