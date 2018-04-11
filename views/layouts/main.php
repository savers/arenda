<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Users;

AppAsset::register($this);




?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>




<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Аренда залов',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItem = [

        ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Главная', 'url' => ['/site/index'], 'encode' => false,],
        ['label' => '<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Техническая поддержка', 'url' => ['#'], 'encode' => false, 'linkOptions' => ['id' => 'feedback-button']],

    ];


    if (Yii::$app->user->isGuest):
        $menuItem[] =  ['label' => 'Регистрация', 'url' => ['/users/index']];
        $menuItem[] = ['label' => 'Войти', 'url' => ['/site/login']];

    else:



        if (Users::isUserAdmin(Yii::$app->user->identity->login)) {
            $menuItem[] =
                ['label' => ' <span class="glyphicon glyphicon-book" aria-hidden="true"></span> Справочники', 'encode' => false,
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Залы', 'url' => ['/zal/index'], 'encode' => false,],
                        ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Оборудование', 'url' => ['/oborud/index'], 'encode' => false,],
                        ['label' => '<span class="glyphicon glyphicon-road" aria-hidden="true"></span> Клиенты', 'url' => ['/client/index'], 'encode' => false,],
                        ['label' => '<span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Пользователи', 'url' => ['/users/index'], 'encode' => false,],
                        ['label' => '<span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Аренда', 'url' => ['/event/index'], 'encode' => false,],

                    ],
                ];
        }
        else
        {

            $menuItem[] =  ['label' => '<span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Аренда', 'url' => ['/event/index'], 'encode' => false,];

        }




        $menuItem[] = [
            'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    endif;







    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItem,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">

       <p class="pull-left">&copy; Аренда <?= date('Y') ?></p>


    </div>
</footer>


<?php

$this->registerJsFile('https://lesovdmitriy.atlassian.net/s/d41d8cd98f00b204e9800998ecf8427e-T/-18kqok/b/20/a44af77267a987a660377e5c46e0fb64/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?locale=ru-RU&collectorId=b876ac75');

$script = <<< JS
window.ATL_JQ_PAGE_PROPS =  {
            "triggerFunction": function(showCollectorDialog) {
                //Requries that jQuery is available! 
                jQuery("#feedback-button").click(function(e) {
                    e.preventDefault();
                    showCollectorDialog();
                });
            }
        };

JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции

$this->registerJs($script, yii\web\View::POS_READY);


?>






<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
