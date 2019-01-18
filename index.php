<?php require "vendor/autoload.php";
use Tasker\Task;
use Tasker\Database;
use Tasker\QueryBuilder;
use Tasker\Validation;

$config = require "config.php";
$pdo = Database::connect($config['database']);

$query = new QueryBuilder($pdo);
$allRows = $query->selectAll('tasks');

$json = new Task();
$json->writeJSON('tasks.json', $allRows);

header("Location: pages/home.php");