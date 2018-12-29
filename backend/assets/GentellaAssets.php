<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2018/12/27
 * Time: 18:21
 */

namespace backend\assets;


use yii\web\AssetBundle;

class GentellaAssets extends AssetBundle
{
    public $depends = [
        'yiister\gentelella\assets\ThemeAsset',
        'yiister\gentelella\assets\ExtensionAsset',
    ];

    // 前端依赖的js , 需要按顺序填写
    public $js = [
        // app 的js [depends] 依赖加载  [ 依赖先加载 ]
        // 多选
        'https://lib.baomitu.com/jquery.sumoselect/3.0.2/jquery.sumoselect.min.js',
        // 标签输入
        'https://lib.baomitu.com/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js',
        // iCheck
        'https://lib.baomitu.com/iCheck/1.0.2/icheck.min.js',
        // Switch
        'https://lib.baomitu.com/switchery/0.8.2/switchery.min.js',
        // layer
        'https://cdn.jsdelivr.net/npm/ilayui@2.0.4/src/layui.min.js',
        // laydate
//        'https://cdn.jsdelivr.net/npm/laydate@1.0.7/laydate/laydate.min.js',
        // nprogress
        'https://lib.baomitu.com/nprogress/0.2.0/nprogress.min.js',
    ];

    // 按先后顺序加载
    public $css = [
        // app 的css [depends]依赖加载  [ 依赖先加载 ]
        // 多选
        'https://lib.baomitu.com/jquery.sumoselect/3.0.2/sumoselect.min.css',
        // 标签输入
        'https://lib.baomitu.com/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css',
        // iCheck
        'https://lib.baomitu.com/iCheck/1.0.2/skins/flat/green.css',
        // Switch
        'https://lib.baomitu.com/switchery/0.8.2/switchery.min.css',
        // layer
        'https://cdn.jsdelivr.net/npm/ilayui@2.0.4/src/css/layui.min.css',
        // nprogress 页面加载进度条
        'https://lib.baomitu.com/nprogress/0.2.0/nprogress.min.css',
        // animate
        'https://lib.baomitu.com/animate.css/3.7.0/animate.min.css'
    ];
}