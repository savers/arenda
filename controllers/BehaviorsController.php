<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.09.15
 * Time: 17:25
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;



class BehaviorsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['site'],
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


}