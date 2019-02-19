<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminUser */

$this->title = '查看文章';
$this->params['breadcrumbs'][] = ['label' => 'Admin Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="admin-user-view">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确认删除该条记录 ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <hr>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email_validate_token:email',
            'email:email',
            'mobile',
            ['attribute'=>'role','value'=>$model->getVar('role')],
            ['attribute' => 'status','value' => $model->getVar('status'),],
            'avatar',
            ['attribute' => 'vip_lv','value' => $model->getVar('vip_lv'),],
            [
                'attribute' => 'created_at',
                'value' => date('Y-m-d H:i:s',$model->created_at)
            ],
            [
                'attribute' => 'updated_at',
                'value' => date('Y-m-d H:i:s',$model->updated_at)
            ],
        ],
        'template' => '<tr> <th style="width: 120px">{label}</th> <td>{value}</td> </tr>',
        'options' => [ 'class' => 'table table-striped table-responsive table-bordered detail-view' ]
    ]) ?>

</div>
