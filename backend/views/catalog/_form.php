<?php

use common\models\Catalog;
use common\models\Country;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="col-md-6">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Catalog::find()->where(['parent_id'=> null])->all(), 'id', 'name_en'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a region ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
            <?= $form->field($model, 'rating')->widget(StarRating::className(), [
                'clientOptions' => [
                    'hints' => ['bad', 'poor', 'regular', 'good', 'zooor'],
                ],
            ]); ?>
            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
                <div class="col-sm-6 col-sm-offset-3">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-group-justified']) ?>
                </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
