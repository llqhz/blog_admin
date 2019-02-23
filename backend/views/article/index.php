<?php

use yii\helpers\Html;
use yiister\gentelella\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' => '序号','headerOptions' => ['style'=>'min-width:35px;']],
            'id',
            'title',
            'sub_title',
            'author',
            //'user_id',
            'image',
            //'summary',
            //'content',
            'content_type',
            //'classify_id',
            //'view_num',
            //'comment_num',
            'is_new',
            'is_hot',
            //'created_at',
            'updated_at',
            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
