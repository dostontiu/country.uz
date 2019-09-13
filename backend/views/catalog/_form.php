<?php

use common\models\Catalog;
use common\models\Country;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Catalog::find()->where(['parent_id'=> null])->all(), 'id', 'name_en'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a region ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'rating')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <div class="form-group"><br>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-group-justified']) ?>
            </div>
        </div>
    </div>





    <?php ActiveForm::end(); ?>

</div>
