<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2019/3/1
 * Time: 19:32
 */

namespace backend\modules\api\controllers;

use backend\modules\api\models\Article;
use Yii;
use backend\controllers\base\Base;
use yii\helpers\Json;

class ArticleController extends Base
{

    public function actionGetArticle()
    {
        $id = Yii::$app->request->get('id');

    }

    public function actionGetArticles()
    {
        $params = Yii::$app->request->get();

        $articles = Article::getArticles($params);


        return $articles;

    }
}