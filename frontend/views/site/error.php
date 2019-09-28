<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<header style="background-image: url('images/header.jpg');">
    <div class="header-content navbar-">
        <div class="header-content-inner">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
            <a href="<?=Yii::$app->homeUrl?>" class="btn btn-primary btn-lg">Home</a>
        </div>
    </div>
</header>
