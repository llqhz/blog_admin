<?php
/**
 * Created by PhpStorm.
 * User: llqhz
 * Date: 2019-03-18
 * Time: 22:23
 */

namespace backend\modules\api\forms;


use yii\db\ActiveRecord;

class UserLogin extends ActiveRecord
{
    public static function tableName()
    {
        return 'AdminUser';
    }


}
