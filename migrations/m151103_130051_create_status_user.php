<?php

use yii\db\Schema;
use yii\db\Migration;

class m151103_130051_create_status_user extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'status','int not NULL');
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
