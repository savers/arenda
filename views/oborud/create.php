<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Oborud */


?>
<div class="oborud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'zal' => $zal,
    ]) ?>

</div>
