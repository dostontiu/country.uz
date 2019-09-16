<?php

use common\models\Catalog;
use yii\helpers\Html;
use yii\grid\GridView;
use yii2mod\rating\StarRating;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CatalogQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Catalogs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name_uz',
                'name_en',
                'name_ru',
                'icon',
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
                    'attribute' => 'parent_id',
                    'label' => 'Parent',
                    'value' => function($model){
                        return ($model->parent_id!=null) ? $model->parent->name_en : '';
                    },
                    'filter' => Catalog::find()->select(['name_en', 'id'])->indexBy('id')->column(),
                    'filterInputOptions' => [
                        'class' => 'form-control',
                        'prompt' => 'All',
                    ],
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>
