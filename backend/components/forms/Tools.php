<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2018/12/17
 * Time: 18:06
 */

namespace backend\components\forms;


use yii\helpers\Html;
use yii\web\UploadedFile;

class Tools
{
    public static function upload($model,$field)
    {
        $file = UploadedFile::getInstance($model,$field);
        if ( !$file ) {
            unset($model->$field);
            return;
        }

        if ( substr($file->type,0,5) == 'image' ) {
            $dir = 'images/';
        } else {
            $dir = 'files/';
        }
        $path = 'uploads/'.$dir.date('Ymd/His/').$file->baseName.'.'.$file->extension;
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }
        // 这个函数有毒 是该php安装本身的问题
        $file->saveAs($path,false);
        //move_uploaded_file($path,$file->tempName);
        $model->$field = \Yii::getAlias('@web').'/'.$path;
    }

    public static function button($type='',$options=[])
    {
        $url = empty($options['url']) ? '#' : $options['url'];
        switch ($type) {
            case 'create':
                $button = '<i class="fa fa-fw fa-plus"></i>增加';
                break;

            case 'order':
                $button = '<i class="fa fa-fw fa-signal"></i>排序';
                break;

            case 'delete':
                $button = '<i class="fa fa-fw fa-close"></i>删除';
                break;

            case 'update':
                $button = '<i class="fa fa-fw fa-edit"></i>编辑';
                break;

            case 'index':
                $button = '<i class="fa fa-fw fa-home"></i>主页';
                break;

            case 'search':
                return '<li>
                           <form action="" method="get" accept-charset="utf-8">
                              <div class="input-group input-group-sm" style="width:180px">
                                  <input type="text" name="word" value="" class="form-control">
                                  <span class="input-group-btn">
                                      <button class="btn btn-info" type="submit">搜索</button>
                                  </span>
                              </div>
                            </form>
                         </li>';

            default:
                $button = '';
        }
        $template = Html::tag(
            'li',
             Html::button(
                 $button,
                 ['class'=>implode(' ',['btn','btn-sm','dropdown-toggle',$type=='delete'?'btn-danger':'btn-info']) ]
             ),
             ['data-url'=>$url,'onclick'=>"location.replace(this.dataset.url)"]
        );
        return $template;
    }
}