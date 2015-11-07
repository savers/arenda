<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Zal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OborudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="oborud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить оборудование', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute'=>'id_zal',
                'filter'=>ArrayHelper::map(Zal::find()->orderBy('name_zal')->asArray()->all(), 'id', 'name_zal'),
                'label'=>'Залы',

                'value'=> function($data)
                {
                    return $data->idZal->name_zal;
                }
            ],


            'name_oborud',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
