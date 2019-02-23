<?php

use yii\helpers\Html;
use backend\components\forms\Tools;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\UserCenter */

$this->title = '修改用户';
$this->params['breadcrumbs'][] = ['label' => 'User Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-center-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


<?php $this->beginBlock('navListItems'); ?>
<?= '';//Tools::button('search')?>
<?= Tools::button('index',['url'=>Url::toRoute(['index'])]) ?>
<?php $this->endBlock(); ?>