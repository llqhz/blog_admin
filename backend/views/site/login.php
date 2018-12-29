<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = '用户登录';
?>
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <?php $form = ActiveForm::begin(['id'=>'login-form']); ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <?= $form->field($model,'username')->label(false)->textInput(
                    [
                        'autofocus'=>true,
                    ]) ?>
                <?= $form->field($model,'password')->label(false)->passwordInput() ?>

                <?= $form->field($model, 'verifyCode')->label('验证码: ')->widget(\yii\captcha\Captcha::classname(), [
                    // configure additional widget properties here
                ]) ?>

                <?=  $form->field($model,'rememberMe')->label('&nbsp;&nbsp;&nbsp;记住密码&nbsp;&nbsp;&nbsp;<small>(请在确保设备安全的情况下选择)</small>')->checkbox(['class'=>'flat']) ?>

                <div>
                    <?= Html::a('登录', 'javascript:document.forms[0].submit()',['class' => 'btn btn-default submit', 'name' => 'login-button','type'=>"submit"]) ?>
                    <?= Html::a('扫码登录', '#signup',['class' => 'btn btn-default submit', 'name' => 'login-button']) ?>
                    <?= Html::a('忘记密码?',Url::toRoute('site/refound'),['class'=>'reset_pass']) ?>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">新用户?
                        <a href="<?= Url::toRoute('site/signup') ?>" class="to_register"> 立即注册 </a>
                    </p>

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

    <div class="animate form registration_form">
        <section class="login_content">
            <form>
                <h1>扫码登录</h1>
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2">
                                <img class="img-responsive" src="./images/qrcode.jpg" alt="">
                            </div>

                            <div>
                                <?= Html::a('密码登录','#signin',['class'=>'to_register btn btn-default submit']) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">忘记密码 ?
                        <?= Html::a('点此找回',Url::toRoute('site/refound')) ?>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                    </div>
                </div>
            </form>
        </section>
    </div>

</div>

