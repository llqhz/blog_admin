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
            'cards' => [
                //数量  ->访问量
                [
                    'icon' => 'home',
                    'title' => '用户数量',
                    'value' => 3200,
                    'trend' => true,
                    'trendValue' => '4%',
                    'trendText' => '同比上周',
                ],
                [
                    'icon' => 'user',
                    'title' => '访客数量',
                    'value' => 2800,
                    'trend' => false,
                    'trendValue' => '4%',
                    'trendText' => '同比上周',
                ],
                [
                    'icon' => 'file',
                    'title' => '文件数量',
                    'value' => 1200,
                    'trend' => true,
                    'trendValue' => '4%',
                    'trendText' => '同比上周',
                ],
                [
                    'icon' => 'eye',
                    'title' => '内存数量',
                    'value' => 1200,
                    'trendText' => '有所改善',
                ],

            ],
            // 趋势
            'graph' => [
                'title' => '这里是标题',
                'subTitle' => '副标题',
                'data' => [],
            ],
            'keyFactors'   => [
                [
                    'title' => '市场开拓',
                    'value' => 20,
                ],
                [
                    'title' => '资金筹集',
                    'value' => 80,
                ],
                [
                    'title' => '人员招募',
                    'value' => 60,
                ],
                [
                    'title' => '客户维护',
                    'value' => 40,
                ],
            ], //访问排行
        ];

        return $this->render('index',$assign);
    }


    //  菜单管理  ,分类管理,  用户管理,  文章管理,   评论管理




}