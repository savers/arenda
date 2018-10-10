<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\time\TimePicker;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */

if($tim1)
{

    $model->time_n = $tim1[0];
    $model->time_c = $tim1[1];
}


?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_zal')->dropDownList(
        ArrayHelper::map($zal, 'id', 'name_zal'),
        [   'prompt'=>'Выберите зал',
            'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('oborud/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#event-oborud1" ).html( data );
                });
            ']);
    ?>

    <h1><?=$oborud?></h1>

    <?= $form->field($model, 'oborud1')->widget(Select2::className(),
        [
            //'initValueText'  => $oborud,
            'options' => ['placeholder' => 'Выберите оборудование...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]

    );

    ?>





    <?= $form->field($model, 'id_client')->dropDownList(
        ArrayHelper::map($client, 'id', 'name_client'),
        ['prompt'=>'Выберите клиента']
    ) ?>


    <?=  $form->field($model, 'date_event')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату ...'],
        'language' => 'ru-RU',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
                    ]
    ]);
    ?>

    <?= $form->field($model, 'name_event')->textInput(['maxlength' => true]) ?>



    <?=    $form->field($model, 'time_n')->widget(TimePicker::classname(),
        [ 'pluginOptions' => [
        'showSeconds' => false,
        'showMeridian' => false,
        'minuteStep' => 5,]]);
    ?>



    <?=    $form->field($model, 'time_c')->widget(TimePicker::classname(),
        [ 'pluginOptions' => [
            'showSeconds' => false,
            'showMeridian' => false,
            'minuteStep' => 5,]]);
    ?>




    <?= $form->field($model, 'kofebrayk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'furshet')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'dopinfo')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'id_users1')->dropDownList(
        ArrayHelper::map($users, 'id', 'username'),
        ['prompt'=>'Выберите ответственного за мероприятие']
    ) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
