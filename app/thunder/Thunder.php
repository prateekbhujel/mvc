<?php 

namespace Thunder;

defined('CPATH') OR exit('Access Denied!');

/**
 * Thunder class
 */
class Thunder
{
    private $version = '1.0';
    


    public function db($argv)
    {

        $mode       = $argv[1] ?? null; 
        $param1  = $argv[2] ?? null;
        
        
        switch ($mode) {
            
            
            case 'db:create':
                
                /** Checks if param1 is empty **/
                if (empty($param1)){
        
                    die("\n\r \033[31mError:\033[0m Database name cannot be Empty. \n\r"); // 1:30:00 #3 MVC
                }
                
                $db = new Database;
                $query = "CREATE DATABASE IF NOT EXISTS ".$param1;
                $db->query($query);

                die("\n\r\033[34mInfo\033[0m: Database Created Successfully.\n\r");
                break;

            case 'db:table':

                /** Checks if param1 is empty **/
                if (empty($param1)){

                    die("\n\r \033[31mError\033[0m: Table name cannot be Empty. \n\r"); // 1:30:00 #3 MVC
                }
                
                $db = new Database;
                $query = "DESCRIBE ".$param1;
                $res = $db->query($query);

                if ($res)
                {
                    print_r($res);
                    
                }else 
                {
                    echo "\n\rCould Not find Data for Table : $param1 \n\r";
                }

                die();
                
                break;

            case 'db:drop':
                
                /** Checks if param1 is empty **/
                if (empty($param1)){

                    die("\n\r \033[31mError:\033[0m Please Provide Database Name to 'drop' an Database. \n\r"); // 1:30:00 #3 MVC
                }
                
                $db = new Database;
                $query = "DROP DATABASE ".$param1;
                $db->query($query);

                die("\n\r\033[34mInfo\033[0m: Database Deleted Successfully.\n\r");
                break;

            case 'db:seed':
                # code...
                break;

            default:
                die( "\n\r Unkown Command '$argv[1]' !");
                break;
        }
    }


    public function make($argv)
    {

        $mode       = $argv[1] ?? null; 
        $classname  = $argv[2] ?? null;
        
        /** Checks if Class Name is empty **/
        if (empty($classname)){

            die("\n\r \033[31mError\033[0m: Class Name cannot be Empty."); // 1:30:00 #3 MVC
        }

        /** Clean Class Name **/
        $classname = preg_replace("/[^A-Za-z0-9_]+/", "", $classname);
        
        /** Prevents Class name to start with a number. **/
        if (preg_match("/[^A-Za-z_]+/", $classname)){
            die("\n\r \033[31mError\033[0m: ClassName (controller Name) cannot Start with Numbers.");
        }

        switch ($mode) {

            case 'make:controller':
               
                /** Clean Class Name **/
                $filename = 'app'.DS.'controllers' .DS.ucfirst($classname). ".php"; 
                if(file_exists($filename)){

                    die("\n\r \033[31mError\033[0m: $classname Controller Already Exists.");
                }
                
                $sample_file = file_get_contents('app'.DS.'thunder'.DS.'samples'.DS.'controller-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                $sample_file = preg_replace("/\{classname\}/", strtolower ($classname), $sample_file);

                 if (file_put_contents($filename, $sample_file))
                 {
                    die("\033[34mInfo\033[0m: Controller Created Successfully.\n");
                    
                 }else {
                    die("\033[31mError\033[0m: Failed To Create Controller.\n");
                 }

                break;

            case 'make:model':
                
                /** Clean Class Name **/
                $filename = 'app'.DS.'models' .DS.ucfirst($classname). ".php"; 
                if(file_exists($filename)){

                    die("\n\r \033[31mError\033[0m: $classname Model Already Exists.");
                }

                $sample_file = file_get_contents('app'.DS.'thunder'.DS.'samples'.DS.'model-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);

                /** Add 's' in the table name end only it doesnt exists **/
                if (!preg_match("/s$/", $classname))
                    $sample_file = preg_replace("/\{table\}/", strtolower ($classname). 's', $sample_file);

                 if (file_put_contents($filename, $sample_file))
                 {
                    die("\033[34mInfo\033[0m: Model Created Successfully.\n");
                    
                 }else {
                    die("\033[31mError\033[0m: Failed To Creatd Model.\n");
                 }

                break;

            case 'make:migration':
                
                $folder = 'app'.DS.'migrations'.DS;

                if (!file_exists($folder))
                {
                    mkdir($folder, 077, true);
                }

                $filename = $folder . date("jS_M_Y_H_i_s_") . ucfirst($classname). ".php"; 
                if(file_exists($filename)){

                    die("\n\r \033[31mError:\033[0m$classname Migration File Already Exists.");
                }

                $sample_file = file_get_contents('app'.DS.'thunder'.DS.'samples'.DS.'migration-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                $sample_file = preg_replace("/\{classname\}/", strtolower($classname), $sample_file);

                    if (file_put_contents($filename, $sample_file))
                    {
                    die("\033[34mInfo\033[0m\033[033m: Migration File Created \033[0m: ".basename($filename) . " \n\r");
                    
                    }else {
                    die("\033[31mError\033[0m: Failed To Create Migration File.\n\r");
                    }

                break;

            case 'make:seeder':
                # code...
                break;

            default:
                die( "\n\r Unkown Command '$argv[1]' !");
                break;
        }
    }


    public function migrate($argv)
    {

        $mode       = $argv[1] ?? null ;
        $filename   = $argv[2] ?? null ;

        $filename = "app".DS."migrations".DS.$filename;
        if (file_exists($filename))
        {
            require $filename;

            $classname = preg_match("/[a-zA-Z]+\.php$/",$filename, $match);
            $classname = str_replace(".php", "", $match[0]);
            
            $myclass = new ("\Thunder\\$classname")();
            
            $myclass->up();

        }else {
            die("\n\rThis\n\r");
        }

        echo "\n\r \033[32mMigration File Run Successfully\033[0m: ". basename($filename) ."\n\r";
        
    }



    public function help()
    {
        echo "

    Thunder v$this->version Command Line Tool

    Database
      db:create          =  Create a new database schema.
      db:seed            =  Runs the specified seeder to populate known data into the database.
      db:table           =  Retrieves information on the selected table.
      db:drop            =  Drop/Delete a database.
      migrate            =  Locates and runs a migration from the specified plugin folder.
      migrate:refresh    =  Does a rollback followed by a latest to refresh the current state of the database.
      migrate:rollback   =  Runs the 'down' method for a migration in the specifiled plugin folder.

    Generators
      make:controller    =  Generates a new controller file.
      make:model         =  Generates a new model file.
      make:migration     =  Generates a new migration file.
      make:seeder        =  Generates a new seeder file.
                         
    Generators              
      list:migration     =  Dsiplay All The Migration File Available.

        ";
    }
}
