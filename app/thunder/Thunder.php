<?php 

namespace Thunder;

defined('CPATH') OR exit('Access Denied!');

/**
 * Thunder class
 */
class Thunder
{
    private $version = '1.0.0';
    
    public function make()
    {

        echo "\n\rmake function\n\r";
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
