<?php

class Common
{
	public static function request_method($index)
	{
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
				$index->_get();
				break;
			case 'POST':
				$index->_post();
				break;
			case 'PUT':
				$index->_put();
				break;
			case 'DELETE':
				$index->_delete();
				break;
		}
	}
}