<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2019/3/1
 * Time: 19:46
 */

namespace backend\modules\api\models;


class Article extends \backend\models\Article
{
    public static function getArticles($params=[])
    {
        return self::find()->all();
    }


}