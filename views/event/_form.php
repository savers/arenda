<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\time\TimePicker;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\Oborud;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */

if($tim1)
{

    $model->time_n = $tim1[0];
    $model->time_c = $tim1[1];
}


//$.post( "'.Yii::$app->urlManager->createUrl('oborud/listsupd?id=').'"+"'.$model->id_zal.'"+&idst="'.$model->oborud.'" , function( data ) {

if(isset($model->id_zal))
{

    $this->registerJs(
        '
function zal(){
                
                $.post("/oborud/listsupd?id='.$model->id_zal.'&idst='.$model->oborud.'", function( data ) {

                  $( "select#event-oborud1" ).html( data );
                });
}

document.addEventListener("DOMContentLoaded", zal);
;',yii\web\View ::POS_END
    );


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


    <?= $form->field($model, 'oborud1')->widget(Select2::className(),
        [
            //'data' => $data,
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
