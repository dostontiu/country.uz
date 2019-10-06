<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */

$this->title = 'Каталог : '.$model->name_ru;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="catalog-view">
    <div class="container">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'parent_id',
                    'label' => 'Parent',
                    'value' => function($model){
                        return ($model->parent_id!=null) ? $model->parent->name_ru : '';
                    },
                ],
                'icon',
                'name_tj',
                'name_en',
                'name_ru',
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
