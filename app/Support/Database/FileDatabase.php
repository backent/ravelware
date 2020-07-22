<?php 

namespace App\Support\Database;
use App\Support\Database\Infrastructure\Database;

class FileDatabase implements Database {

	protected $folder_path = __DIR__ . "/./Data";
	protected $condition=[];

	public function get($filename) {
		$filePath = $this->folder_path . "/" .$filename;
		$fileexist = file_exists($filePath);
		
        if ($fileexist) {
            $storage = unserialize(file_get_contents($filePath));
        } else {
            $storage = [];
        }
        return $storage;
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

	public function update($filename, $field, $value, $data) {

		$filePath = $this->folder_path . "/" .$filename;
		$fileexist = file_exists($filePath);

		
        if ($fileexist) {
            $storage = unserialize(file_get_contents($filePath));
        } else {
            return false;
        }
        $storage = array_map(function($item) use($field, $value, $data) {
        	if ($item->$field == $value) {
        		foreach ($data as $key => $value2) {
        			$item->$key = $value2;
        		}
        	} 
        	return $item;
        }, $storage);

        file_put_contents($filePath, serialize($storage));

        return true;
		
	}


}