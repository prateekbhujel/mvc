<?php 

namespace Thunder;

defined('CPATH') OR exit('Access Denied!');

/**
 * Thunder class
 */
class Thunder
{
    private $version = '1.0.0';
    
    public function db()
    {

        echo "\n\rdb function\n\r";
    }

    public function make($argv)
    {

        $mode       = $argv[1] ?? null; 
        $classname  = $argv[2] ?? null;
        
        /** Checks if Class Name is empty **/
        if (empty($classname)){

            die("\n\r \033[31mError:\033[0m Class Name cannot be Empty.");
        }

        /** Clean Class Name **/
        $classname = preg_replace("/[^A-Za-z0-9_]+/", "", $classname);
        
        /** Prevents Class name to start with a number. **/
        if (preg_match("/[^A-Za-z_]+/", $classname)){
            die("\n\r \033[31mError:\033[0m Class Name (controller name) cannot Start with Numbers.");
        }

        switch ($mode) {

            case 'make:controller':
               
                /** Clean Class Name **/
                $filename = 'app'.DS.'controllers' .DS.ucfirst($classname). ".php"; 
                if(file_exists($filename)){

                    die("\n\r \033[31mError:\033[0m$classname Controller Already Exists.");
                }
                
                $sample_file = file_get_contents('app'.DS.'thunder'.DS.'samples'.DS.'controller-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                $sample_file = preg_replace("/\{classname\}/", strtolower ($classname), $sample_file);

                 if (file_put_contents($filename, $sample_file))
                 {
                    die("\033[34mInfo:\033[0m Controller Created Successfully.\n");
                    
                 }else {
                    die("\033[31mError:\033[0m Controller Creation Failed.\n");
                 }

                break;

            case 'make:model':
                
                /** Clean Class Name **/
                $filename = 'app'.DS.'models' .DS.ucfirst($classname). ".php"; 
                if(file_exists($filename)){

                    die("\n\r \033[31mError:\033[0m$classname Model Already Exists.");
                }

                $sample_file = file_get_contents('app'.DS.'thunder'.DS.'samples'.DS.'model-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);

                /** Add 's' in the table name end only it doesnt exists **/
                if (!preg_match("/s$/", $classname))
                    $sample_file = preg_replace("/\{table\}/", strtolower ($classname). 's', $sample_file);

                 if (file_put_contents($filename, $sample_file))
                 {
                    die("\033[34mInfo:\033[0m Model Created Successfully.\n");
                    
                 }else {
                    die("\033[31mError:\033[0m Model Creation Failed.\n");
                 }

                break;

            case 'make:migration':
                # code...
                break;

            case 'make:seeder':
                # code...
                break;

            default:
                die( "\n\r Unkown 'make' Commnand !");
                break;
        }
    }

    public function migrate()
    {

        echo "\n\rmigate function\n\r";
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
            
        ";
    }
}
