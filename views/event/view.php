<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'id_zal',
                'value' => $model->idZal->name_zal,
            ],
            [
                'attribute'=>'id_client',
                'value' => $model->idClient->name_client,
            ],
            [
                'attribute'=>'id_users',
                'value' => $model->idUsers->username,
            ],

            [
                'attribute'=>'id_users1',
                'value' => $model->idUsers1->username,
            ],

            'date_event',
            'name_event',
            'oborud',
            'time_event',
            'kofebrayk',
            'furshet',
            'status',
            'dopinfo',
        ],
    ]) ?>

</div>
