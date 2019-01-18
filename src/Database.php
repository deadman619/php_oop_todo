<?php
namespace Tasker;
use PDO;
abstract class Database {
	public static function connect($config) {
		try {
			return new PDO ($config['connection'].';dbname='.$config['dbname'],$config['username']
				,$config['password'],$config['options']);
		} catch (PDOException $e) {
    		echo 'Connection failed: ' . $e->getMessage();
    		die;
		}
	}
}