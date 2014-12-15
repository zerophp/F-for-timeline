<?php
namespace Core\Helper;

/**
 * Common functions to accelerate some repeating proccess
 *
 * @author iker
 */
class Helper {
	
	/**
	 * print_r of $value with pre HTML format for easy understanding
	 * and for not have to write the bloody sequence over and over!!!!!
	 * 
	 * @param mixed $value what you want to HTML-pre-print
	 * @param string $die if added, executes die with reason passed as string
	 */
	public static function pre($value, $titulo = NULL, $die = 0) {
	echo '<pre>' . (!is_null($titulo) ? ucfirst($titulo) . ":<br/>" : '');
		print_r($value);
		echo '</pre>';
		$die !== 0 ? die($die) : NULL;
	}	
	
}
