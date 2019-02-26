<?php

namespace backend\models;

use backend\models\base\BaseModel;
use Yii;

/**
 * This is the model class for table "user_center".
 *
 * @property string $id Id
 * @property string $name 姓名
 * @property string $nickname 昵称
 * @property string $job 职业
 * @property string $address 地址
 * @property string $mobile 电话
 * @property string $email 邮箱
 * @property string $tags 个性标签
 * @property string $sex 性别
 * @property int $age 年龄
 * @property string $avatar 头像
 * @property string signature_title 个性签名
 * @property string signature_desc 签名描述
 *
 */
class UserCenter extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_center';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age'], 'integer'],
            [['name', 'nickname', 'job', 'address', 'mobile', 'email', 'tags', 'sex', 'avatar','signature_title','signature_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => '姓名',
            'nickname' => '昵称',
            'job' => '职业',
            'address' => '地址',
            'mobile' => '电话',
            'email' => '邮箱',
            'tags' => '个性标签',
            'sex' => '性别',
            'age' => '年龄',
            'avatar' => '头像',
            'signature_title' => '个性签名',
            'signature_desc' => '签名描述',
        ];
    }

    /**
     * 返回修改字段 key为int(优先)或者string
     *
     * @var array
     */
    public static $opts = [
        'sex' => [
            0 => '未知',
            1 => '男',
            2 => '女',
        ],
        'job' => [
            0 => '其他',
            1 => '学生',
            2 => '技术',
            3 => '设计',
            4 => '财务',
            5 => '市场',
            6 => '影视',
            7 => '作家',
            8 => '科学家',
        ],
    ];
}
