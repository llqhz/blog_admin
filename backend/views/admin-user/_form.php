<?php

use yii\helpers\Html;
use backend\components\forms\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->dropDownList($model->getVar('role',true)) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getVar('status',true)) ?>

    <?= $form->field($model, 'avatar')->imageInput() ?>

    <?= $form->field($model, 'vip_lv')->dropDownList($model->getVar('vip_lv',true)) ?>

    <?= $form->field($model, 'created_at')->timeInput() ?>

    <?= $form->field($model, 'updated_at')->timeInput() ?>

    <!--<div class="form-group">
        <?/*= Html::submitButton('Save', ['class' => 'btn btn-success']) */?>
    </div>-->
    
    <?= $form->submitBtns() ?>

    <?php ActiveForm::end(); ?>

</div>
