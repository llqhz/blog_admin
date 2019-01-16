<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2018/12/28
 * Time: 10:44
 */

namespace backend\controllers;


use backend\controllers\base\Base;

class IndexController extends Base
{

    public function actionIndex()
    {

        $assign = [
            'numbers' => [],  //数量  ->访问量
            'trends' => [],   // 趋势
            'topList'   => [], //访问排行
        ];

        return $this->render('index',$assign);
    }


    //  菜单管理  ,分类管理,  用户管理,  文章管理,   评论管理




}