<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Talaba */

$this->title = 'Create Talaba';
$this->params['breadcrumbs'][] = ['label' => 'Talabas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talaba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
