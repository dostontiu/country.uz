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

<div class="catalog-form col-md-6 col-md-offset-3">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Create new
                </h3>
            </div>
        </div>
    <?php $form = ActiveForm::begin([
        'id' => 'catalog-form',
        'options'=>['class'=>'kt-form'],
    ]); ?>
        <div class="kt-portlet__body">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
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

    </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions kt-form__actions--right">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-brand']) ?>
<!--                <button type="reset" class="btn btn-brand">Submit</button>-->
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
