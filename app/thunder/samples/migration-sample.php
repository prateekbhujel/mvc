<?php

namespace Migration;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * {CLASSNAME} class
 */
class {CLASSNAME}
{
	
	use Migration;

    /** For Creating an Table **/
    public function up()
    {
        /** Allowed Methods **/
        /** Some Examples
        $this->addColumn('id int primary key default 0 AUTO_INCREMENT');
        $this->addColumn('name varchar(100) default 'sometext');
        $this->addPrimaryKey();
        $this->addUniqueKey();

        $this->addData();
        $this->insertData()();

        $this->createTable();
        */
    } // End Method


    /** For Droping an Table **/
    public function down()
    {
        $this->dropTable('{classname}');
    } // End Method

}