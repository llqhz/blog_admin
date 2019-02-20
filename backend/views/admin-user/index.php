<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\forms\Tools;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-index index-list">

    <?= GridView::widget([
        'columns' => [
            [
               'class' => 'yii\grid\SerialColumn',
               'header' => '序号',
               'headerOptions' => [
                   'style' => 'min-width:60px',
               ],
            ],
            [
                'attribute' => 'id',
                'headerOptions' => [
                    'style' => 'min-width:60px',
                ],
            ],
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email_validate_token:email',
            'email:email',
            [
                'attribute' => 'mobile',
                'value' => function($model){
                    return $model->mobile ?: '--';
                }
            ],
            [
                'attribute' => 'role',
                'value' => function($model){
                    return $model->getVar('role');
                },
             ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->getVar('status');
                },
            ],
            'avatar',
            [
                'attribute' => 'vip_lv',
                'value' => function($model){
                    return $model->getVar('vip_lv');
                },
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date','php:Y-m-d H:i:s'],
                'headerOptions' => [  // 作用于th
                    'style' => 'background-color:lightgreen'
                ],
                'contentOptions' => [  // 作用于td
                    'style' => 'background-color:lightblue'
                ],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date','php:Y-m-d H:i:s'],
            ],
            ['class' => 'yii\grid\ActionColumn','header' => '操作'],
        ],
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,   // 关闭搜索框
        'options' => ['class'=>'table table-striped table-responsive table-bordered'],
        'showFooter' => false,
        // 'caption' => '会员列表',
        'showOnEmpty' => true,
        'summary' => false,
    ]); ?>
</div>


<?php $this->beginBlock('navListItems'); ?>
    <?= Tools::button('search') ?>
    <?= Tools::button('create',['url'=>Url::toRoute('create')]) ?>
<!--    --><?//= Tools::button('order') ?>
<!--    --><?//= Tools::button('delete') ?>

<?php $this->endBlock(); ?>

