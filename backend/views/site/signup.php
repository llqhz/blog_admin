<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = '账号注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <h1><?= Html::encode($this->title) ?></h1>
            <?= $form->field($model, 'username')->label(false)->textInput(['autofocus' => true,'placeholder'=>'请输入用户名','autocomplete'=>'off']) ?>

            <?= $form->field($model, 'email')->label(false)->input('email',['placeholder'=>'请输入邮箱']) ?>

            <?= $form->field($model, 'password')->label(false)->passwordInput(['placeholder'=>'请输入密码']) ?>
            <?= $form->field($model, 'repassword')->label(false)->passwordInput(['placeholder'=>'请确认密码']) ?>

            <?= $form->field($model,'verifyCode')->widget(\yii\captcha\Captcha::className()) ?>

            <div class="clearfix"></div>

            <div class="separator">
                <div class="form-group">
                    <?= Html::a('注册','javascript:document.forms[0].submit()',['class' => 'btn btn-default', 'name' => 'signup-button']) ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?= Html::a('登录',\yii\helpers\Url::toRoute('site/login'),['class' => 'btn btn-default', 'name' => 'signup-button']) ?>
                </div>

                <div class="clearfix"></div>
                <br />

                <div>
                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </section>
    </div>
</div>
