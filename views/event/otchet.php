<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use app\models\Event;
use app\models\Users;


?>

<h3 align="center">Расписание работы конференц-центра ILF-Communication в диапазоне с <?= $poisk1 ?> по <?= $poisk2 ?> </h3>



<table width="1235" cellpadding="0" cellspacing="0" >
    <tr align="center">
        <td width="234" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>Дата</b></td>
        <td width="187" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>День недели</b></td>
        <td width="165" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>Мероприятие</b></td>
        <td width="240" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>Необходимое оборудование</b></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>Место</b></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>Время</b></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>Кофе брейк</b></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>Фуршет\бизнес ужин</b></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><b>Клиент</b></td>
        <td width="125" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:solid; border-bottom-style:none; border-left-style:solid;"><b>Контакты</b></td>
    </tr>

<?php    foreach ($model as  $data) {    ?>

    <tr>
        <td width="234" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=$data->date_event?></td>
        <td width="187" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=Yii::$app->formatter->asDate($data->date_event, 'EEEE');?></td>
        <td width="165" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=$data->name_event?></td>
        <td width="240" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=$data->oborud?></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=$data->idZal->name_zal?></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=$data->time_event?></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=$data->kofebrayk ?></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=$data->furshet?></td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:none; border-left-style:solid;"><?=$data->idClient->name_client?></td>
        <td width="125" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:solid; border-bottom-style:none; border-left-style:solid;"><?=$data->idUsers->username?></td>
    </tr>


 <?php   }    ?>





    <tr>
        <td width="234" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="187" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="165" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="240" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="246" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="234" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="187" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="165" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="240" style="border-width:1; border-color:black; border-top-style:solid; border-right-style:none; border-bottom-style:solid; border-left-style:solid;">&nbsp;</td>
        <td width="125" style="border-width:1; border-color:black; border-style:solid;">&nbsp;</td>
    </tr>
</table>




