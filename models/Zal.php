<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zal".
 *
 * @property integer $id
 * @property string $name_zal
 *
 * @property Event[] $events
 * @property Oborud[] $oboruds
 */
class Zal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_zal'], 'required'],
            [['name_zal'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_zal' => 'Наименование зала',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['id_zal' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOboruds()
    {
        return $this->hasMany(Oborud::className(), ['id_zal' => 'id']);
    }
}
