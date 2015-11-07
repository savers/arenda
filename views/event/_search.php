<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_zal') ?>

    <?= $form->field($model, 'id_client') ?>

    <?= $form->field($model, 'id_users') ?>

    <?= $form->field($model, 'id_users1') ?>

    <?php // echo $form->field($model, 'date_event') ?>

    <?php // echo $form->field($model, 'name_event') ?>

    <?php // echo $form->field($model, 'oborud') ?>

    <?php // echo $form->field($model, 'time_event') ?>

    <?php // echo $form->field($model, 'kofebrayk') ?>

    <?php // echo $form->field($model, 'furshet') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'dopinfo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
