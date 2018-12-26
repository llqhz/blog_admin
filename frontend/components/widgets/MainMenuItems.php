<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2018/12/11
 * Time: 17:22
 */

namespace frontend\components\widgets;


use yii\base\Widget;

class MainMenuItems extends Widget
{
    public $items = [];

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        if ( empty($this->items) ) {
            $this->items = [];
        }
    }

    public function run()
    {
        return var_export($this->items,true);
    }

}