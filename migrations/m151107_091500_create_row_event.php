<?php

use yii\db\Schema;
use yii\db\Migration;

class m151107_091500_create_row_event extends Migration
{
    public function safeUp()
    {
        $this->addColumn('event', 'updated_at','int not NULL');
        $this->addColumn('event', 'created_at','int not NULL');
        $this->addColumn('event', 'dopinfo','string');
    }

    public function down()
    {

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
