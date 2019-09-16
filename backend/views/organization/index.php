<?php

use common\models\OrganizationCatalog;
use common\models\Region;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii2mod\rating\StarRating;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OrganizationQuery */
/* @var $catalogFilter backend\controllers\OrganizationController */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name_uz',
            'name_en',
            'name_ru',
            'gps:url',
            [
                'attribute' => 'region_id',
                'label' => 'Region',
                'filter' => Region::find()->select(['name_en', 'id'])->indexBy('id')->column(),
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'prompt' => 'All'
                ],
                'value' => 'region.name_en'
            ],
            [
                'attribute' => 'rating',
                'format' => 'text',
                'content' => function($model){
                    return StarRating::widget([
                        'name' => 'input_name',
                        'value' => $model->rating,
                        'clientOptions' => [
                            'readOnly' => true,
                        ],
                    ]);
                },
                'filter' =>  Html::activeDropDownList(
                    $searchModel,
                    'rating',
                    array(1=>"1+",2=>"2+",3=>"3+",4=>"4+",5=>"5+"),
                    ['class'=>'form-control','prompt' => 'All']
                ),
            ],
            [
                'attribute' => 'catalog',
                'filter' =>  Html::activeDropDownList(
                    $searchModel,
                    'catalog',
                    $catalogFilter,
                    ['class'=>'form-control','prompt' => 'All']
                ),
                'format' => 'raw',
                'value' => function($model){
                    $data_calatalog = OrganizationCatalog::find()->with('catalog')->where(['organization_id' => $model->id])->all();
                    $hh = '';
                    foreach ($data_calatalog as $item) {
                        $hh .= $item->catalog->name_en.'<br>';
                    }
                    return $hh;
                }
            ],
            [
                'attribute' => 'Image',
                'format' => 'raw',
                'value' => function ($model) {
                    if (file_exists('uploads/'.$model->photo)){
                        return Html::img(Yii::$app->homeUrl. '/uploads/'.$model->photo, ['style'=>'width:100px']);
                    } else {
                        return Html::img(Yii::$app->homeUrl. '/uploads/nophoto.png', ['style'=>'width:100px']);
                    }
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
