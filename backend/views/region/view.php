<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Region */

$this->title = 'Область : '.$model->name_ru;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="region-view">

    <div class="col-md-6 col-md-offset-3">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name_tj',
                'name_ru',
                'name_en',
            ],
        ]) ?>
        <p>
            <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить данный?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

</div>
