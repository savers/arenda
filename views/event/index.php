<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить аренду', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_zal',
            'id_client',
            'id_users',
            'id_users1',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
