<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.03.2019
 * Time: 1:01
 */

namespace Models;

use App\Db;

class Data extends \App\Db
{
    public function saveCSV($filename)
    {

        $path = "C:/xampp/htdocs/import/{$filename}";

        $this->execute("LOAD DATA INFILE '{$path}' 
        INTO TABLE csv_files 
        FIELDS TERMINATED BY ',' 
        ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS;");
        echo "GOOOOOD";
    }
    public function clearTable()
    {
        $this->execute("truncate table csv_files");
    }
    public function show()
    {
        return $this->execute("select * from csv_files");
    }
}