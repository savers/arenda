<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_131328_create_table_client extends Migration
{
    public function up()
    {

        $this->createTable(
            'client',
            [
                'id'=>Schema::TYPE_PK,
                'name_client'=>Schema::TYPE_STRING.' NOT NULL',
                'phone'=>Schema::TYPE_STRING,
                'info'=>Schema::TYPE_STRING,
            ]

        );

    }

    public function down()
    {
        $this->dropTable('client');
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
