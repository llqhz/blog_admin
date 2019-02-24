<?php

use yii\helpers\Html;
use backend\components\forms\Tools;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = '新增文章';

?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


<?php $this->beginBlock('navListItems'); ?>
<?= Tools::button('index',['url'=>Url::toRoute(['index'])]) ?>
<?php $this->endBlock(); ?>
