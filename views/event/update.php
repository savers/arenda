<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'zal' => $zal,
        'client' => $client,
        'users' => $users,
        $model->oborud='',
        'tim1' => $tim1,
    ]) ?>

</div>
