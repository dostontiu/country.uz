<?php

use common\models\Catalog;
use common\models\Organization;
use common\models\OrganizationCatalog;
use common\models\Region;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii2mod\rating\StarRating;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OrganizationQuery */
///* @var $catalogFilter common\models\Organization */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Organization'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <pre>
    <?php // echo $this->render('_search', ['model' => $searchModel]);

    ?>
    </pre>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name_uz',
            'name_en',
            'name_ru',
            [
                'attribute' => 'region_id',
                'label' => 'Region',
                'filter' => Region::find()->select(['name_en', 'id'])->indexBy('id')->column(),
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'prompt' => 'All'
                ],
//                'filter' =>  Html::activeListBox($searchModel, 'region_id', array("ID1"=>"Name1","ID2"=>"Name2"),['class'=>'form-control','prompt' => 'Select Name']),
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
                            // Your client options
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
                /*'filter' => \yii2mod\rating\StarRating::widget([
                    'name' => 'rating',
                    'value' => 3,
                ]),*/
            ],
            [
                'attribute' => 'catalog',
                'filter' =>  Html::activeDropDownList(
                    $searchModel,
                    'catalog',
                     $catalogFilter,
                    ['class'=>'form-control','prompt' => 'All']
                ),
                'value' => function($model){
                    $data_calatalog = OrganizationCatalog::find()->with('catalog')->where(['organization_id' => $model->id])->all();
                    $hh = '';
                    foreach ($data_calatalog as $item) {
                        $hh .= $item->catalog->name_en.', ';
                    }
                    return $hh;
                }
            ],
//            'photo',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
