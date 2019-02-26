<?php

use yii\helpers\Html;
use backend\components\forms\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserCenter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-center-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->imageInput() ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->radioList($model->getVar('sex',true)) ?>

    <?= $form->field($model, 'age')->Input('number') ?>

    <?= $form->field($model, 'job')->dropDownList($model->getVar('job',true)) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tags')->tagsInput() ?>

    <?= $form->field($model, 'signature_title')->textInput() ?>
    <?= $form->field($model, 'signature_desc')->textarea(['rows'=>3]) ?>

    <?= isset($noBtns)&&$noBtns===true?: $form->submitBtns() ?>

    <?php ActiveForm::end(); ?>

</div>
