<?php require "../vendor/autoload.php";
use Tasker\Task;
use Tasker\Database;
use Tasker\QueryBuilder;
use Tasker\Validation;

$config = require "../config.php";
$pdo = Database::connect($config['database']);

$query = new QueryBuilder($pdo);
?>

<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
	<div id='taskContainer' class='container'></div>
	<div id='newTaskForm' class='text-center'></div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src='js/script.js'></script>
</body>
</html>

<?php 
if (isset($_GET['newTaskValue'])) {
	$taskValue = $_GET['newTaskValue'];
	$newTask = new Task();
	$newTask->setSubject($taskValue);
	$query->addTask($newTask, 'tasks');
}
if(isset($_GET['delete']) && isset($_GET['id'])) {
	$taskValue = $_GET['id'];
	$query->deleteTask($taskValue, 'tasks');
}
if(isset($_GET['update']) && isset($_GET['id'])) {
	$taskValue = $_GET['id'];
	$update = $query->selectById($taskValue, 'tasks');
	$query->updateTask($update[0], 'tasks');
}
