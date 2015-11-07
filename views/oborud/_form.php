<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Oborud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oborud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_zal')->dropDownList(
        ArrayHelper::map($zal, 'id', 'name_zal')
    ) ?>

    <?= $form->field($model, 'name_oborud')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
