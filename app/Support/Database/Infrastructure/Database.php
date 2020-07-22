<?php 

namespace App\Support\Database\Infrastructure;

interface Database {

	public function where();
	public function get($table);
	public function insert($table, $data);
	public function delete();
}