<?php 

namespace App\Support\Database\Infrastructure;

interface Database {

	public function where();
	public function get();
	public function insert($table, $data);
	public function delete();
}