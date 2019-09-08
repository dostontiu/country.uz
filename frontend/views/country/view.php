<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Country */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="country-view">
    <div class="row">
        <div class="col-md-6">
            <h1><?= $model->name ?></h1>
            <p>Population : <?= $model->population ?></p>
            <?= Html::img('@web/uploads/'.$model->photo, ['width'=>'400px']); ?>
            <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <?php
                foreach ($child as $item) {
                    echo '<li class="list-group-item">'.$item->name.'</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
