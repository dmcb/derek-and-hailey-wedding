<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Helper for resizing images
 *
 * Random string function
 *
 * @author		Derek McBurney
 * @copyright	Copyright (c) 2013, Derek McBurney, derek@dmcbdesign.com
 *              This code may not be used commercially without the expressed
 *              written consent of Derek McBurney. Non-commercial use requires
 *              attribution.
 * @link		http://dmcbdesign.com
 */

// ------------------------------------------------------------------------

/**
 * Image resize
 *
 * Creates a thumbnail of an image at a specified size, intelligently determines whether to crop or scale based on dimensions and specifications
 *
 * @access	public
 * @param   string  path to source file
 * @param   string  path to output file
 * @param   int     optional specified width of output
 * @param   int     optional specified height of output
 * @return	string
 */
if ( ! function_exists('image_resize'))
{
	function image_resize($source, $dest, $newwidth, $newheight)
	{
		$info = @getimagesize($source);
		$type = substr(strrchr($info['mime'], '/'), 1);

		switch ($type)
		{
			case 'png':
			$image_create_func = 'ImageCreateFromPNG';
			$image_save_func = 'ImagePNG';
			break;

			case 'gif':
			$image_create_func = 'ImageCreateFromGIF';
			$image_save_func = 'ImageGIF';
			break;

			default:
			$image_create_func = 'ImageCreateFromJPEG';
			$image_save_func = 'ImageJPEG';
		}

		ini_set('memory_limit', '128M'); //hack for bad hosts (also try in .htaccess, 'php_value memory_limit 128M')
		$data = $image_create_func($source);

	    $width = $info[0];
	    $height = $info[1];
	    $ratio = $width/$height;

		$targetwidth = $newwidth;
		$targetheight = $newheight;

		$x_offset = 0;
		$y_offset = 0;

		$resizedimage = imagecreatetruecolor($targetwidth, $targetheight);
		imagealphablending($resizedimage, false);
		imagesavealpha($resizedimage,true);
		$transparent = imagecolorallocatealpha($resizedimage, 255, 255, 255, 127);
		imagefilledrectangle($resizedimage, 0, 0, $newwidth, $newheight, $transparent);

		if ($newheight != NULL && $newwidth != NULL) // We are specifying an exact size, so we will resize and crop
		{
			$widthscale = $newwidth/$width;
			$heightscale = $newheight/$height;
			if ($widthscale > $heightscale)
			{
				$targetwidth = $newwidth;
				$targetheight = $height*$widthscale;
				$y_offset = round(($newheight - $targetheight)/2);
			}
			else
			{
				$targetwidth = $width*$heightscale;
				$targetheight = $newheight;
				$x_offset = round(($newwidth - $targetwidth)/2);
			}
		}

		imagecopyresampled($resizedimage, $data, $x_offset, $y_offset, 0, 0, $targetwidth, $targetheight, $width, $height);

		if ($image_save_func == "ImageJPEG") $image_save_func($resizedimage,$dest,96);
		else $image_save_func($resizedimage,$dest);
		imagedestroy($data);
		imagedestroy($resizedimage);
	}
}