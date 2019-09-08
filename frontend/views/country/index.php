<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CountryQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Countries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'parent_id',
                'format' => 'html',
                'value' => function ($model) {
                    return ($model->parent_id == null) ? Html::a($model->name, ['view', 'id' =>$model->id]) : '';
                },
            ],
            [
                'attribute' => 'name',
                'value' => function($model) {
                    return ($model->parent_id == null) ? '' : $model->name;
                }
            ],
            'population',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function($model) {
                    return Html::img('@web/uploads/'.$model->photo, ['width'=>'200px']);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
