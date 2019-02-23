<?php

use yii\helpers\Html;
use backend\components\forms\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content',['options'=>['id'=>'content-markdown']])->markdown() ?>
    <?= $form->field($model, 'content',['options'=>['id'=>'content-html']])->ueditor() ?>

    <?= $form->field($model, 'content_type')->radioList($model->getVar('content_type',true)) ?>

    <?= $form->field($model, 'classify_id')->dropDownList($model->getVar('classify_id',true)) ?>

    <?= $form->field($model, 'view_num')->input('number') ?>

    <?= $form->field($model, 'comment_num')->input('number') ?>

    <?= $form->field($model, 'is_new')->radioList($model->getVar('is_new',true)) ?>

    <?= $form->field($model, 'is_hot')->radioList($model->getVar('is_hot',true)) ?>

    <?= $form->field($model, 'status')->radioList($model->getVar('status',true)) ?>

    <?= $form->submitBtns() ?>

    <?php ActiveForm::end(); ?>

</div>
