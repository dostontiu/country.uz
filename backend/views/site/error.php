<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
$this->context->layout = 'main-login';
$this->title = $name;
?>
<div class="site-error">

    <br>
    <br>
    <br>
    <h1 class="text-center">
        <a href="<?=Yii::$app->homeUrl?>" class="btn btn-outline-brand btn-pil btn-lg btn-wide text-center"><i class="fa fa-home"></i> Home</a>
    </h1>
    <br>
    <br>
    <br>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <!--    <h1 class="kt-menu__item --><?//=(Yii::$app->controller->id=='site')?'kt-menu__item--active':''?><!--" aria-haspopup="true"><a href="--><?//= Yii::$app->homeUrl?><!--" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-home"></i><span class="kt-menu__link-text">Dashboard</span></a></h1>-->

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
