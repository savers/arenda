<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_132552_create_table_event extends Migration
{
    public function safeUp()
    {

        $this->createTable(
            'event',
            [
                'id' => Schema::TYPE_PK,
                'id_zal' => Schema::TYPE_INTEGER . ' NOT NULL',
                'id_client' => Schema::TYPE_INTEGER . ' NOT NULL',
                'id_users' => Schema::TYPE_INTEGER . ' NOT NULL',
                'id_users1' => Schema::TYPE_INTEGER . ' NOT NULL',
                'date_event' => Schema::TYPE_DATE . ' NOT NULL',
                'name_event' => Schema::TYPE_STRING . ' NOT NULL',
                'oborud' => Schema::TYPE_STRING . ' NOT NULL',
                'time_event' => Schema::TYPE_STRING . ' NOT NULL',
                'kofebrayk' => Schema::TYPE_STRING,
                'furshet' => Schema::TYPE_STRING,
                'status' => Schema::TYPE_SMALLINT . ' NOT NULL',

            ]

        );
        $this->addForeignKey('eventusers', 'event', 'id_users', 'users', 'id');
        $this->addForeignKey('eventusers1', 'event', 'id_users1', 'users', 'id');
        $this->addForeignKey('eventclient', 'event', 'id_client', 'client', 'id');
        $this->addForeignKey('eventzal', 'event', 'id_zal', 'zal', 'id');


    }

    public function down()
    {

        $this->dropTable('event');


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
