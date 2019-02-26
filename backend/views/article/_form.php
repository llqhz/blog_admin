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

    <?= $form->field($model, 'image')->imageInput() ?>

    <?= $form->field($model, 'music')->fileInput(['style'=>'margin-top:5px;']) ?>

    <?= $form->field($model, 'summary')->textarea(['rows'=>4]) ?>

    <?= $form->field($model, 'classify_id')->dropDownList($model->getVar('classify_id',true)) ?>

    <?= $form->field($model, 'content_type',['options'=>['id'=>'content_type','class'=>'form-group']])->radioList($model->getVar('content_type',true)) ?>

    <?= $form->field($model, 'content',['options'=>['id'=>'content-html','class'=>'form-group']])->ueditor() ?>

    <?= $form->field($model, 'content_md',['options'=>['id'=>'content-markdown','class'=>'form-group']])->markdown() ?>

<!--   <?//= $form->field($model, 'is_new')->radioList($model->getVar('is_new',true)) ?>  -->

<!--   <?//= $form->field($model, 'is_hot')->radioList($model->getVar('is_hot',true)) ?>   -->

    <?= $form->field($model, 'status')->radioList($model->getVar('status',true)) ?>

    <?= isset($noBtns)&&$noBtns===true?'': $form->submitBtns() ?>

    <?php ActiveForm::end(); ?>

</div>


<?php $this->beginBlock('FORM_JS'); ?>

$(()=>{
  setTimeout(()=>{
    updateContentType();
    $('input[name="Article[content_type]"][class]').on('ifChanged', function(event){
        updateContentType();
    })
  },1000)
})


function updateContentType() {
    $('input[name="Article[content_type]"][class]').each(function(){
        if(true == $(this).is(':checked')){
            var type = $(this).val();
            if ( type == 0 ) {
                // html
                $('#content-html').show();
                $('#content-markdown').hide();
            } else {
                // markdown
                $('#content-html').hide();
                $('#content-markdown').show();
            }
        }
    })
}

<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['FORM_JS'],\yii\web\View::POS_END); ?>
