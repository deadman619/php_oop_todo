<?php
namespace Tasker;

class Task {
	private $id, $subject, $isComplete = 0;
	public function getInfo() {
		return ["ID" => $this->id,
		 "Subject" => $this->subject,
		 "Completion" => $this->isComplete
		 ];
	}
	public function getId() {
		return $this->id;
	}
	public function getSubject() {
		return $this->subject;
	}
	public function isComplete() {
		return $this->isComplete;
	}
	public function setSubject($subject) {
		$this->subject = $subject;
	}
	public function setComplete() {
		if($this->isComplete == 0) {
			$this->isComplete = 1;
		} else {
			$this->isComplete = 0;
		}
	}
	public function writeJSON($filename, $object) {
		$jsonWrite = fopen($filename, 'w');
		fwrite($jsonWrite, '[');
		if (is_array($object)) {
			for($i = 0; $i<count($object); $i++) {
				fwrite($jsonWrite, json_encode($object[$i]->getInfo(), JSON_PRETTY_PRINT));
				if (!($i + 1 == count($object))) {
					fwrite($jsonWrite, ','."\n");
				}
			}
		} else {
			fwrite($jsonWrite, json_encode($object->getInfo(), JSON_PRETTY_PRINT));
		}
		fwrite($jsonWrite, ']');
 		fclose($jsonWrite);
	}
}