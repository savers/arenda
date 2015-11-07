<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_125541_create_table_oborud extends Migration
{
    public function safeUp()
    {

        $this->createTable(
            'oborud',
            [
                'id'=>Schema::TYPE_PK,
                'id_zal'=>Schema::TYPE_INTEGER,
                'name_oborud'=>Schema::TYPE_STRING.' NOT NULL',

            ]

        );
        $this->addForeignKey('zal_oborud_id','oborud','id_zal','zal','id');




    }

    public function down()
    {
        $this->dropTable('oborud');
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
