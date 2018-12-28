<?php
namespace backend\controllers;

use backend\components\user\identity\LoginForm;
use backend\components\user\identity\SignupForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $enableCsrfValidation = false;

    // 根据条件控制csrf 校验
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = true;
        return parent::beforeAction($action);
    }

    /**
     * 行为
     */
    public function behaviors()
    {
        return [
            'access' => [
                // yii权限控制
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error',],
                        'allow' => true,    // 无条件允许
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],   // 匹配登录的用户
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],   // 匹配一个游客
                    ],
                ],
            ],
            'verbs' => [
                // 请求方法控制
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * 定义每个方法的导向
     */
    public function actions()
    {
        return [
            // error路由
            'error' => [
                // 将error路由交由action类处理
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionHello()
    {
        return 'Hello';
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * 登录用户退出
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
