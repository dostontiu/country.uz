<?php

use common\models\Country;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="col-md-3">
        <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Country::find()->where(['parent_id'=> null])->all(), 'id', 'name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select a country ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'population')->textInput(['type' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        <?= Html::img('@web/uploads/'.$model->photo, ['width'=>180]) ?>
    </div>

    <div class="form-group col-md-2">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success  btn-group-justified']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
