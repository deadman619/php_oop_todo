<?php
namespace Tasker;
use PDO;
class QueryBuilder {
	private $pdo;
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	public function selectAll($tableName) {
		$statement = $this->pdo->prepare("SELECT * FROM {$tableName}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS, Task::class);
	}
	public function addTask($task, $tableName) {
		$tempSubject = $task->getSubject();
		$tempCompletion = $task->isComplete();
		$statement = $this->pdo->prepare("INSERT INTO {$tableName} (subject, isComplete) VALUES (:subject, :isComplete)");
		$statement->bindParam(':subject', $tempSubject, PDO::PARAM_STR);
		$statement->bindParam(':isComplete', $tempCompletion, PDO::PARAM_STR);
		$statement->execute();
		header("Location: ../index.php");
	}
	public function deleteTask($id, $tableName) {
		$deletionID = $id;
		$statement = $this->pdo->prepare("DELETE FROM {$tableName} WHERE id = :id");
		$statement->bindParam(':id', $deletionID, PDO::PARAM_STR);
		$statement->execute();
		header("Location: ../index.php");
	}

}