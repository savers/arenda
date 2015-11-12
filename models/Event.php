<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property integer $id_zal
 * @property integer $id_client
 * @property integer $id_users
 * @property integer $id_users1
 * @property string $date_event
 * @property string $name_event
 * @property string $oborud
 * @property string $time_event
 * @property string $kofebrayk
 * @property string $furshet
 * @property integer $status
 * @property integer $updated_at
 * @property integer $created_at
 * @property string $dopinfo
 *
 * @property Client $idClient
 * @property Users $idUsers
 * @property Users $idUsers1
 * @property Zal $idZal
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $time_n;
    public $time_c;
    public $oborud1;
    public $date_ned;

    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_zal', 'id_client', 'id_users1', 'date_event', 'name_event', 'oborud1','time_n','time_c'], 'required'],
            [['id_zal', 'id_client', 'id_users', 'id_users1', 'status', 'updated_at', 'created_at'], 'integer'],
            [['date_event'], 'safe'],
            [['name_event', 'time_event', 'kofebrayk', 'furshet', 'dopinfo', 'time_n', 'time_c'] , 'string', 'max' => 255],
            ['time_n', 'validateTime'],
            ['time_c', 'validateTime1'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_zal' => 'Зал',
            'id_client' => 'Клиент',
            'id_users' => 'Регистратор',
            'id_users1' => 'Ответственный',
            'date_event' => 'Дата мероприятия',
            'name_event' => 'Наименование мероприятия',
            'oborud' => 'Оборудование',
            'time_event' => 'Время проведения',
            'kofebrayk' => 'Кофебрейк',
            'furshet' => 'Фуршет',
            'status' => 'Статус',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'dopinfo' => 'Дополнительная Информация',
            'time_n' => 'Время начала мероприятия',
            'time_c' => 'Время завершения мероприятия',
            'oborud1' => 'Оборудование',
        ];
    }


    public function validateTime($attribute)
    {
        if (!$this->hasErrors())
        {
            $timeprov =  Event::find()->where(['date_event' => $this->date_event, 'id_zal' =>$this->id_zal])->all();

            foreach ($timeprov as  $timeprovdet) {

            $t = explode(' - ', $timeprovdet->time_event);


             if ($this->time_n > $t[0] and $this->time_n < $t[1]){

                  $this->addError($attribute, 'В это время зал занят');

             }

            }

        }

    }


    public function validateTime1($attribute)
    {
        if (!$this->hasErrors())
        {
            $timeprov =  Event::find()->where(['date_event' => $this->date_event, 'id_zal' =>$this->id_zal])->all();

            foreach ($timeprov as  $timeprovdet) {

                $t = explode(' - ', $timeprovdet->time_event);


                if ($this->time_c > $t[0] and $this->time_c < $t[1]){

                    $this->addError($attribute, 'В это время зал занят');

                }

            }

        }

    }




    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {

                $this->id_users = Yii::$app->user->id;
                $this->status = 1;
                $this->time_event = $this->time_n.' - '.$this->time_c;

                $this->oborud ='';

                foreach ($this->oborud1 as $naz)
                {
                    $this->oborud.=$naz.", ";
                }



            }
            else
            {
                $this->id_users = Yii::$app->user->id;
                $this->status = 2;
                $this->time_event = $this->time_n.' - '.$this->time_c;
                $this->oborud ='';
                foreach ($this->oborud1 as $naz)
                {
                    $this->oborud.=$naz.", ";
                }


            }

            return true;
        }
        return false;
    }




    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_users']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers1()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_users1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdZal()
    {
        return $this->hasOne(Zal::className(), ['id' => 'id_zal']);
    }
}
