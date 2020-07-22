<?php 

namespace App\Models;
use App\Support\Database\Infrastructure\Database;
use stdClass;

class Model {
	protected $database;
	protected $data;

	public function __construct() {
		$this->database = resolve(Database::class);
	}

	public function setData($field, $value) {
		if (empty($this->data)) {
			$this->data = new stdClass();
		} 
		$this->data->$field = $value;
		return $this;
		

	}

	public function getData() {
		return $this->data;
	}
}