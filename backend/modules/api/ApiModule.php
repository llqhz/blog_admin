<?php

namespace backend\modules\api;

use yii\web\Response;
use Yii;

/**
 * api module definition class
 */
class ApiModule extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here

        //绑定beforeSend事件，更改数据输出格式
        // Yii::$app->getResponse()->on(Response::EVENT_BEFORE_SEND, [$this, 'beforeSend']);

        $response = Yii::$app->response;

        $response->format = Response::FORMAT_JSON;
        $response->headers->add('Access-Control-Allow-Origin','*');
    }
}
