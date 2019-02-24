<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\components\forms\Tools;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = '查看文章';

?>
<div class="article-view">

    <?= $this->render('_form', [
        'model' => $model,
        'noBtns' => true
    ]) ?>

</div>


<?php $this->beginBlock('navListItems'); ?>
<?= Tools::button('index',['url'=>Url::toRoute(['index'])]) ?>
<?= Tools::button('update',['url'=>Url::toRoute(['update','id'=>$model->id])]) ?>
<?= Tools::button('delete',['url'=>Url::toRoute(['delete','id'=>$model->id])]) ?>
<?php $this->endBlock(); ?>
