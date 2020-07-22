<?php 

namespace App\Support\Database\Infrastructure;

interface Database {

	public function get($table);
	public function insert($table, $data);
	public function delete();
}