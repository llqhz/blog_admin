<?php

use yii\helpers\Html;
use backend\components\forms\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'status')->radioList($model->getVar('status',true)) ?>

    <?= isset($noBtns)&&$noBtns===true?'':$form->submitBtns() ?>

    <?php ActiveForm::end(); ?>

</div>
