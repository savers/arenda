<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password','username','status'], 'required'],
            [['login', 'password','username'], 'string', 'max' => 255]
        ];
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {



                $this->password = Yii::$app->security->generatePasswordHash($this->password);
                $this->auth_key = \Yii::$app->security->generateRandomString();

            return true;
        }
        return false;
    }

      /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'username'=>'Имя пользователя',
            'status'=>'Статус пользователя'
        ];
    }



    public function validatePassword($password){

        return Yii::$app->security->validatePassword($password, $this->password);

    }

    public static function findByLogin($login){

        return static::findOne(['login'=>$login]);

    }



    public static function findIdentity($id)
    {
        return static::findOne([
          'id'=>$id

       ] );
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }


}
