<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserCenter */

$this->title = 'Create User Center';
$this->params['breadcrumbs'][] = ['label' => 'User Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-center-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
