<?php

use yii\db\Schema;
use yii\db\Migration;

class m151103_130755_create_authkey_user extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'auth_key','string');
    }

    public function down()
    {
        echo "m151103_130755_create_authkey_user cannot be reverted.\n";

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
