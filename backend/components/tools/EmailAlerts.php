<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2019/3/1
 * Time: 18:34
 */

namespace backend\components\tools;


class EmailAlerts
{
    public static function getItems($start=0,$length=6)
    {
        $res = [
            [
                'imgurl' => 'http://placehold.it/128x128',
                'alt' => 'Profile Image',
                'name' => 'John Smith',
                'time' => '3 mins ago',
                'message' => 'Film festivals used to be do-or-die moments for movie makers. They were where...',
            ],[
                'imgurl' => 'http://placehold.it/128x128',
                'alt' => 'Profile Image',
                'name' => 'John Smith',
                'time' => '3 mins ago',
                'message' => 'Film festivals used to be do-or-die moments for movie makers. They were where...',
            ],[
                'imgurl' => 'http://placehold.it/128x128',
                'alt' => 'Profile Image',
                'name' => 'John Smith',
                'time' => '3 mins ago',
                'message' => 'Film festivals used to be do-or-die moments for movie makers. They were where...',
            ],[
                'imgurl' => 'http://placehold.it/128x128',
                'alt' => 'Profile Image',
                'name' => 'John Smith',
                'time' => '3 mins ago',
                'message' => 'Film festivals used to be do-or-die moments for movie makers. They were where...',
            ],
        ];
        return $res;
    }
}
