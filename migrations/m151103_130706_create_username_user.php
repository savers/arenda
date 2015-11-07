<?php

use yii\db\Schema;
use yii\db\Migration;

class m151103_130706_create_username_user extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'username','string not NULL');
    }

    public function down()
    {
        echo "m151103_130706_create_username_user cannot be reverted.\n";

        return false;
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
