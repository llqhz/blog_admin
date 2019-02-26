<?php

use yii\helpers\Html;
use yiister\gentelella\widgets\grid\GridView;
use backend\components\forms\Tools;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            ['attribute'=>'image','format'=>['image',['class'=>'image-responsive lay-pic-pre','style'=>'max-width:46px']]],
            //'summary',
            //'content',
            ['attribute'=>'content_type','value'=>function($model){return $model->getVar('content_type');}],
            //'classify_id',
            //'view_num',
            //'comment_num',
            ['attribute'=>'is_new','value'=>function($model){return $model->getVar('is_new');}],
            ['attribute'=>'is_hot','value'=>function($model){return $model->getVar('is_hot');}],
            //'created_at',
            'updated_at',
            ['attribute'=>'status','value'=>function($model){return $model->getVar('status');}],
            ['class' => 'yii\grid\ActionColumn','header'=>'操作'],
        ],
    ]); ?>
</div>



<?php $this->beginBlock('navListItems'); ?>
    <?= Tools::button('create',['url'=>Url::toRoute('create')]) ?>
<?php $this->endBlock(); ?>
