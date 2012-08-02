<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * dmcb extension to string helper
 *
 * Random string function
 *
 * @package		dmcb-cms
 * @author		Derek McBurney
 * @copyright	Copyright (c) 2012, Derek McBurney, derek@dmcbdesign.com
 *              This code may not be used commercially without the expressed
 *              written consent of Derek McBurney. Non-commercial use requires
 *              attribution.
 * @link		http://dmcbdesign.com
 */

// ------------------------------------------------------------------------

/**
 * Random string
 *
 * Returns random string of specified length
 * Different than CI string helper since it removes vowels from pool, preventing offensive word generation
 *
 * @access	public
 * @param   int     optional string length to return
 * @return	string
 */
if ( ! function_exists('random_string'))
{
	function random_string($length = 8)
	{
		$result = "";
		$pool = "0123456789bcdfghjkmnpqrstvwxyz";
		for ($i = 0; $i < $length; $i++)
		{
			$char = substr($pool, mt_rand(0, strlen($pool)-1), 1);
			$result .= $char;
		}
		return $result;
	}
}
