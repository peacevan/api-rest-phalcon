<?php
  use App\Services\ProductsService;
//namespace App\Controllers;

/**
 * Class AbstractController
 *
 * @property \Phalcon\Http\Request              $request
 * @property \Phalcon\Http\Response             $htmlResponse
 * @property \Phalcon\Db\Adapter\Pdo\Postgresql $db
 * @property \Phalcon\Config                    $config
 * @property ProductsService                    $productService
 * @property \App\Models\Users                  $user
 */
abstract class AbstractController extends \Phalcon\DI\Injectable
{
    /**
     * Route not found. HTTP 404 Error
     */
    const ERROR_NOT_FOUND = 1;

    /**
     * Invalid Request. HTTP 400 Error.
     */
    const ERROR_INVALID_REQUEST = 2;
 
    /**
	 * Prepare an array with special characters to be sent as JSON.
	 * Gets a UTF-8 string and converts it to UnicodeCodePoints.
	 * */
	static function prepareJson($arr) 
	{
		array_walk_recursive($arr, function ($item, $key) {
			
			if (!mb_check_encoding($item, 'UTF-8')) {
		        trigger_error('are you sure this string is UTF-8 encoded?');
		        return false;
		    }
					
		    return preg_replace_callback('/./u', function ($m) {
		        $ord = ord($m[0]);
		        if ($ord <= 127) {
		            return sprintf('\u%04x', $ord);
		        } else {
		            return trim(json_encode($m[0]), '"');
		        }
		    }, $item);
		});
		return $arr;
	}
}
