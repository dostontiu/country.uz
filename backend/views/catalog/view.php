<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2mod\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */

$this->title = 'Каталог : '.$model->name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
function rate($id){
    return StarRating::widget([
        'name' => 'input_name',
        'value' => $id,
        'clientOptions' => [
            'readOnly' => true,
        ],
    ]);
}
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
                        return ($model->parent_id!=null) ? $model->parent->name_en : '';
                    },
                ],
                [
                    'attribute' => 'rating',
                    'value' => rate($model->rating),
                    'format' => 'raw'
                ],
                'icon',
                'name_uz',
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
