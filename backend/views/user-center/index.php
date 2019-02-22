<?php

use yii\helpers\Html;
use yiister\gentelella\widgets\grid\GridView;
use backend\components\forms\Tools;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserCenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-center-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn','header' => '序号'],
            'id',
            'name',
            ['attribute' => 'avatar','format' => ['image',['class'=>'image-responsive lay-pic-pre','style'=>'max-width:46px']]],
            'nickname',
            ['attribute' => 'sex','value' => function($model){return $model->getVar('sex');}],
            'age',
            ['attribute' => 'job','value' => function($model){return $model->getVar('job');}],
            'address',
            'mobile',
            'email:email',
            'tags',
            ['class' => 'yii\grid\ActionColumn','header' => '操作'],
        ],
    ]); ?>
</div>


<?php $this->beginBlock('navListItems'); ?>
    <?= Tools::button('create',['url'=>Url::toRoute('create')]) ?>
<?php $this->endBlock(); ?>
