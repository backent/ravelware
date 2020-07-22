<?php 

namespace App\Support\Database;
use App\Support\Database\Infrastructure\Database;

class FileDatabase implements Database {

	protected $folder_path = __DIR__ . "/./Data";

	public function where() {
		dd('where');
	}

	public function get() {
		dd('get');
	}

	public function insert($filename, $data) {
		$filePath = $this->folder_path . "/" .$filename;
		$fileexist = file_exists($filePath);
		
        if ($fileexist) {
            $storage = unserialize(file_get_contents($filePath));
        } else {
            $storage = [];
        }
        
        $storage[] = $data;
        file_put_contents($filePath, serialize($storage));
	}

	public function delete() {
		dd('delete');
	}

}