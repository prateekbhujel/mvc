<?php

namespace Thunder;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Pages class
 */
class Pages extends Migration
{


    /** For Creating an Table **/
    public function up()
    {
        /** Creating an Table **/
        $this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
        $this->addColumn('date_created datetime NULL');
        $this->addColumn('date_updated datetime NULL');
        $this->addPrimaryKey('id');
        
        $this->createTable('pages');
        
        /** Inserting an Data **/
        $this->addData('date_created', date("Y-m-d H:i:s"));
        $this->addData('date_updated', date("Y-m-d H:i:s"));
        $this->insertData('pages');
       
        /**
        $this->addUniqueKey();
        */

    } // End Method


    /** For Droping an Table **/
    public function down()
    {
        $this->dropTable('pages');
    } // End Method

}