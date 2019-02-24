<?php

use yii\helpers\Html;
use backend\components\forms\Tools;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Comments */

$this->title = '修改评论';

?>
<div class="comments-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


<?php $this->beginBlock('navListItems'); ?>
<?= '';//Tools::button('search')?>
<?= Tools::button('index',['url'=>Url::toRoute(['index'])]) ?>
<?php $this->endBlock(); ?>
