<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kt-login__container">
    <div class="kt-login__logo">
        <a href="<?= Yii::$app->homeUrl?>../">
            <img src="<?= Yii::$app->homeUrl?>admin/media/logos/logo-5.png">
        </a>
    </div>
    <div class="kt-login__signin">
        <div class="kt-login__head">
            <h3 class="kt-login__title">Вход в систему</h3>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'options'=>['class'=>'kt-form'],]); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder'=>'Логин'])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Пароль'])->label(false) ?>
            <div class="row kt-login__extra">
                <div class="col">
                    <?= $form->field($model, 'rememberMe')->checkbox(['class'=>'kt-checkbox'])->label('Запомнить?') ?>
                </div>
            </div>
            <div class="kt-login__actions">
                <?= Html::submitButton('Войти', ['id'=>'kt_login_signin_submit', 'class' => 'btn btn-brand btn-pill kt-login__btn-primary', 'name' => 'login-button']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="kt-login__signup">
        <div class="kt-login__head">
            <h3 class="kt-login__title">Sign Up</h3>
            <div class="kt-login__desc">Enter your details to create your account:</div>
        </div>
        <form class="kt-form" action="">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Fullname" name="fullname">
            </div>
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
            </div>
            <div class="input-group">
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="input-group">
                <input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
            </div>
            <div class="row kt-login__extra">
                <div class="col kt-align-left">
                    <label class="kt-checkbox">
                        <input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
                        <span></span>
                    </label>
                    <span class="form-text text-muted"></span>
                </div>
            </div>
            <div class="kt-login__actions">
                <button id="kt_login_signup_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
                <button id="kt_login_signup_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
    <div class="kt-login__forgot">
        <div class="kt-login__head">
            <h3 class="kt-login__title">Forgotten Password ?</h3>
            <div class="kt-login__desc">Enter your email to reset your password:</div>
        </div>
        <form class="kt-form" action="">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
            </div>
            <div class="kt-login__actions">
                <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                <button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
            </div>
        </form>
        </div>
</div>

