<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b><h1><?= Html::encode($this->title) ?></h1></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group has-feedback">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <div class="checkbox icheck">
                            <label>
                                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
            <a href="<?= Yii::$app->homeUrl?>../../frontend/web/site/signup" class="text-center">Register a new membership</a>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</div>
