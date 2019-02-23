<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2019/1/16
 * Time: 19:02
 */

namespace backend\controllers\base;


use backend\components\menu\MainMenuItems;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;

class Base extends Controller
{
    // 侧边栏菜单
    public $sidebarMenuItems;

    /**
     * 行为 访问控制
     */
    public function behaviors()
    {
        return [
            'access' => [
                // yii 用户角色权限控制
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],   // 匹配登录的用户
                    ],
                    [
                        'allow' => ['error'],
                        'roles' => ['?'],   // 匹配一个游客
                    ],
                ],
            ],
            'verbs' => [
                // 请求方法控制
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    // 定义方法指引
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                //'view' => '@yiister/gentelella/views/error',
            ]
        ];
    }


    public function beforeAction($action)
    {

        $user = Yii::$app->user;

        if ( $user->isGuest ) {
            return $this->redirect(['site/login'])->send();
        }

        $this->view->params['sidebarMenuItems'] = MainMenuItems::getItems($user);
        $this->view->params['profile'] = $user->identity->profile;

        return parent::beforeAction($action);
    }

}