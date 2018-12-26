<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserQq */

$this->title = 'Create User Qq';
$this->params['breadcrumbs'][] = ['label' => 'User Qqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-qq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
