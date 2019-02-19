<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2019/1/18
 * Time: 10:50
 */

namespace backend\models\base;


use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    /**
     * 获取枚举值的文字值
     * @var array
     */
    public static $opts = [];

    /**
     * 获取状态字段
     *
     * @param $field
     * @param $key
     * @return array|mixed|null|string
     */
    public static function getOptValue($field, $key=null)
    {
        if ( array_key_exists($field,static::$opts) ) {
            if ( $key===true ) {
                return static::$opts[$field];
            } else {
                $key = (string)$key;
                if ( array_key_exists($key,static::$opts[$field]) ) {
                    return static::$opts[$field][$key];
                } else {
                    return null;
                }
            }
        } else {
            return $key===true ? [] : '';
        }
    }

    public function getVar($field,$key=null)
    {
        if ( $key === null ) $key = $this->getAttribute($field);
        return static::getOptValue($field,$key);
    }
    
}