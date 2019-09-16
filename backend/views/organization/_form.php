<?php

use common\models\Region;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use msvdev\widgets\mappicker\MapInput;
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
        'options'=>['enctype'=>'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'gps')->widget(
        MapInput::className(),
        [
            'language' => 'en-Us', // map language, default is the same as in the app
            'service' => 'yandex', // map service provider, "google" or "yandex", default "google"
//                    'apiKey' => '', // required google maps
//                    'coordinatesDelimiter' => '@', // attribute coordinate string delimiter, default "@" (lat@lng)
            'mapWidth' => '1600px', // width map container, default "500px"
            'mapHeight' => '500px', // height map container, default "500px"
            'mapZoom' => '16', // map zoom value, default "10"
            'mapCenter' => [55.753338, 37.622861], // coordinates center map with an empty attribute, default Moscow
        ]
    );
    ?>
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
                'clientOptions' => [
                    'hints' => ['bad', 'poor', 'regular', 'good', 'zooor'],
                ],
            ]); ?>

            <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions'=>[
                    'allowedFileExtensions'=>['jpg','gif','png'],
                    'showUpload' => false,
                ],
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
