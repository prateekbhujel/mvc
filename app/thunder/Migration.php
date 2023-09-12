<?php 

namespace Thunder;

defined('CPATH') OR exit('Access Denied!');

/**
 * Migration class
 */
class Migration
{

    use \Model\Database;

    protected $columns      = [];
    protected $keys         = [];
    protected $primaryKeys  = [];
    protected $uniqueKeys   = [];
    protected $data         = [];

    protected function createTable($table)
    {
        if (!empty($this->columns))
        {
            $query = "CREATE TABLE IF NOT EXISTS $table(";
            
            foreach ($this->columns as $column) {
                $query .= $column .",";
            }
            
            foreach ($this->primaryKeys as $key) {
                $query .= "PRIMARY KEY (".$key . "),";
            }

            foreach ($this->uniqueKeys as $key) {
                $query .= "UNIQUE KEY (".$key . "),";
            }

            foreach ($this->keys as $key) {
                $query .= "KEY (".$key . "),";
            }
            
            $query .= trim($query, ",");
            $query .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

            $this->query($query);

            $this->columns      = [];
            $this->keys         = [];
            $this->primaryKeys  = [];
            $this->uniqueKeys   = [];
            
            echo "\n\rInfo: " . "\033[32m" . $table . " Table Successfully Created !" . "\033[0m\n\r"; 
        }else{

            echo "\n\Error: " . "\033[31m" . $table . "Table Could Not be Created !" . "\033[0m\n\r"; 
        }

    }


    protected function addColumn($text)
    {
        $this->columns[] = $text;
    }


    protected function addPrimaryKey($key)
    {
        $this->primaryKeys[] = $key;
    }


    protected function addUniqueKey($key)
    {
        $this->uniqueKeys[] = $key;
    }


    protected function addData($key, $value)
    {
        $this->data[$key] = $value;
    }


    protected function dropTable($table)
    {
        $this->query('DROP TABLE '.$table);

        echo "\n\Info: " . "\033[32m" . $table . " Table Successfully Removed !" . "\033[0m\n\r";
    }

    
    protected function insertData($table)
    {
        if (!empty($this->data))
        {
            $keys = array_keys($this->data);
            $query = "INSERT INTO $table (". implode(",", $keys) . ") VALUES (:". implode(",:", $keys) . ")" ;
            $this->query($query,$this->data);
            $this->data   = [];

            echo "\n\Info: " . "\033[32m" .  "Data Inserted Successfully in table: $table !" . "\033[0m\n\r";
        }else
        {
            echo "\n\Error: " . "\033[31m" .  "Data Could Not Be Inserted in table: $table !" . "\033[0m\n\r";
        }

    }
}