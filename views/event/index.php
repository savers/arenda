<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

  <?php
  if (Users::isUserAdmin(Yii::$app->user->identity->login)) {

      ?>

      <?= Html::a('Добавить аренду', ['create'], ['class' => 'btn btn-success']) ?>

      <?php

  }
  ?>



    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'rowOptions' => function ($model, $key, $index, $grid)
        {
            if($model->updated_at !== $model->created_at) {
                return ['style' => 'background-color:#8ECEE7;'];
            }
        },


        'columns' => [


            ['class' => 'yii\grid\ActionColumn'],




            [
                'attribute'=>'date_event',
                'label' => 'Дата',
                'format' => 'date',
                'filter' => DatePicker::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'date_event',
                        'options' => ['placeholder' => 'Выберите дату ...'],
                        'language' => 'ru-RU',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ]
                    ])

            ],


            [
                'attribute'=>'date_ned',
                'label'=>'День недели',
                'value'=> function($data)
                {
                    return  Yii::$app->formatter->asDate($data->date_event, 'EEEE');
                }
            ],

            'name_event',
            'oborud',



            [
                'attribute'=>'id_zal',
                'filter'=>ArrayHelper::map(\app\models\Zal::find()->orderBy('name_zal')->asArray()->all(), 'id', 'name_zal'),
                'label'=>'Зал',

                'value'=> function($data)
                {
                    return $data->idZal->name_zal;
                }
            ],
            'time_event',
            'kofebrayk',
            'furshet',

            [
                'attribute'=>'id_client',
                'filter'=>ArrayHelper::map(\app\models\Client::find()->orderBy('name_client')->asArray()->all(), 'id', 'name_client'),
                'label'=>'Клиент',

                'value'=> function($data)
                {
                    return $data->idClient->name_client;
                }
            ],

            [
                'attribute'=>'id_users',
                'filter'=>ArrayHelper::map(\app\models\Users::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'label'=>'Регистратор',

                'value'=> function($data)
                {
                    return $data->idUsers->username;
                }
            ],

            [
                'attribute'=>'id_users1',
                'filter'=>ArrayHelper::map(\app\models\Users::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'label'=>'Ответственный',

                'value'=> function($data)
                {
                    return $data->idUsers1->username;
                }
            ],
            'dopinfo',

            // 'date_event',
            // 'name_event',
            // 'oborud',
            // 'time_event',
            // 'kofebrayk',
            // 'furshet',
            // 'status',
            // 'updated_at',
            // 'created_at',
            // 'dopinfo',


        ],
    ]); ?>

</div>
