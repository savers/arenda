<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_131845_create_table_users extends Migration
{
    public function up()
    {
        $this->createTable(
            'users',
            [
                'id'=>Schema::TYPE_PK,
                'login'=>Schema::TYPE_STRING.' NOT NULL',
                'password'=>Schema::TYPE_STRING.' NOT NULL',
            ]

        );

    }

    public function down()
    {
        $this->dropTable('users');
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
