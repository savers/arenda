<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oborud".
 *
 * @property integer $id
 * @property integer $id_zal
 * @property string $name_oborud
 *
 * @property Zal $idZal
 */
class Oborud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oborud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_zal'], 'integer'],
            [['name_oborud'], 'required'],
            [['name_oborud'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_zal' => 'Наименование зала',
            'name_oborud' => 'Наименование оборудования',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdZal()
    {
        return $this->hasOne(Zal::className(), ['id' => 'id_zal']);
    }
}
