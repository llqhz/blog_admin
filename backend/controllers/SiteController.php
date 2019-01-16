<?php
namespace backend\controllers;

use backend\components\user\identity\LoginForm;
use backend\components\user\identity\SignupForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * 管理员登录
 */
class SiteController extends Controller
{

    public $layout = 'login';


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
                        'actions' => ['login', 'error'],
                        'allow' => true,    // 无条件允许
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],   // 匹配登录的用户
                    ],
                    [
                        'actions' => ['signup','refound','captcha'],
                        'allow' => true,
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
                //'view' => '@yiister/gentelella/views/error',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'height' => '38',
            ],
        ];
    }

    /**
     * 主页
     */
    public function actionIndex()
    {
        return $this->goHome();
    }


    /**
     * 登录
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
     * 注册
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

    /**
     * 用户找回密码
     * @return string
     */
    public function actionRefound()
    {
        return 'Site => refound';
    }


    
    
}
