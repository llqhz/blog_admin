<?php

namespace backend\models;

use backend\models\base\BaseModel;

/**
 * This is the model class for table "admin_user".
 *
 * @property int $id 自增ID
 * @property string $username 用户名
 * @property string $auth_key 自动登录key
 * @property string $password_hash 加密密码
 * @property string $password_reset_token 重置密码token
 * @property string $email_validate_token 邮箱验证token
 * @property string $email 邮箱
 * @property string $mobile 电话
 * @property int $role 角色等级
 * @property int $status 状态
 * @property string $avatar 头像
 * @property int $vip_lv vip等级
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class AdminUser extends BaseModel
{

    /**
     * 返回修改字段 key为int(优先)或者string
     *
     * @var array
     */
    public static $opts = [
        'status' => [
            0 => '普通用户',
            10 => '管理员',
        ],
        'role' => [
            0 => '普通等级',
            10 => '管理员等级',
        ],
        'vip_lv' => [
            0 => '普通会员',
            10 => '黄金会员',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'mobile', 'created_at', 'updated_at'], 'required'],
            [['role', 'status', 'vip_lv', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email_validate_token', 'email', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['mobile'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户ID',
            'username' => '用户名',
            'auth_key' => '自动登录key',
            'password_hash' => '加密密码',
            'password_reset_token' => '重置密码token',
            'email_validate_token' => '邮箱验证token',
            'email' => '邮箱',
            'mobile' => '电话',
            'role' => '角色等级',
            'status' => '状态',
            'avatar' => '头像',
            'vip_lv' => 'vip等级',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }


    /**
     * @return int
     */
    public function getStatus0()
    {
        return self::getOptValue('status',$this->getAttribute('status'));
    }


}
