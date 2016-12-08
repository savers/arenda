<?php

use yii\db\Schema;
use yii\db\Migration;

class m161208_075727_create_column_role extends Migration
{
    public function safeUp()
    {
        $this->addColumn('users', 'role','int not NULL DEFAULT 10');
    }

    public function down()
    {

    }


}
