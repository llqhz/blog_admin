<?php

use yii\helpers\Html;
use yiister\gentelella\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            'id',
            'article_id',
            ['attribute'=>'content','options'=>['style'=>'width:380px;']],
            //'pid',
            'floor',
            'love',
            ['label'=>'评论人','value'=>function($model){return $model->user->nickname;}],
            ['attribute'=>'status','value'=>function($model){return $model->getVar('status');}],

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}','header'=>'操作'],
        ],
    ]); ?>
</div>
