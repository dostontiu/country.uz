<?php

use common\models\Region;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-form">

    <?php $form = ActiveForm::begin([
        'id' => 'organization-form',
        'enableAjaxValidation' => false,
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description_uz')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'basic'
            ]) ?>
            <hr>
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description_en')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'basic'
            ]) ?>
            <hr>
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description_ru')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'basic'
            ]) ?>
            <hr>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'catalog_ids')
        ->listBox($catalogs, ['multiple' => true])
                /* or, you may use a checkbox list instead */
//                ->checkboxList($catalogs)
//                ->hint('Select the catalogs');
            ?>

            <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(Region::find()->all(), 'id', 'name_en'), ['prompt' => 'Chose region']) ?>

            <?= $form->field($model, 'rating')->widget(StarRating::className(), [
                'options' => [
                    // Your additional tag options
                ],
                'clientOptions' => [
                    // Your client options
                    'hints' => ['bad', 'poor', 'regular', 'good', 'zooor'],
                ],
            ]); ?>

            <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'gps')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
