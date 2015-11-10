<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php    $form = ActiveForm::begin([
        'action' => '/event/otchet',
        'options'=>['target'=>'_blank'],
    ]);

    echo DatePicker::widget([
        'name' => 'from_date',
        'type' => DatePicker::TYPE_RANGE,
        'name2' => 'to_date',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);

    echo '<br>';

    echo Html::submitButton('Создать отчет', ['class' => 'btn btn-primary']);

    ActiveForm::end();

    ?>

    <br><br>




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


            [
                'attribute'=>'date_event',
                'label' => 'Дата',
                'format' => 'date',

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




        ],
    ]); ?>

</div>
