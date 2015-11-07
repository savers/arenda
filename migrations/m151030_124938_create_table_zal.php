<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_124938_create_table_zal extends Migration
{
    public function up()
    {

        $this->createTable(
            'zal',
            [
                'id'=>Schema::TYPE_PK,
                'name_zal'=>Schema::TYPE_STRING.' NOT NULL',
            ]

        );


    }

    public function down()
    {
        $this->dropTable('zal');
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
