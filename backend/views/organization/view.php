<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2mod\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */

$this->title = 'Organization : '.$model->name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
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
<div class="organization-view">
    <div class="container">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'user_id',
                        'label' => 'User',
                        'value' => $model->user->username,
                    ],
                    [
                        'attribute' => 'region_id',
                        'label' => 'Region',
                        'value' => $model->region->name_en,
                    ],
                    [
                        'attribute' => 'rating',
                        'value' => rate($model->rating),
                        'format' => 'raw'
                    ],
                    'gps:url',
                    'name_uz',
                    'name_en',
                    'name_ru',
                    'description_uz:html',
                    'description_en:html',
                    'description_ru:html',
                    [
                        'attribute' => 'photo',
                        'format' => 'raw',
                        'value' => function($model){
                            if (file_exists('uploads/'.$model->photo)){
                                return Html::img(Yii::$app->homeUrl. '/uploads/'.$model->photo, ['style'=>'width:600px']);
                            } else {
                                return Html::img(Yii::$app->homeUrl. '/uploads/nophoto.png', ['style'=>'width:300px']);
                            }
                        },
                    ],
                ],
            ]) ?>
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

</div>
