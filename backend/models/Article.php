<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property string $id 文章Id
 * @property string $title 标题
 * @property string $sub_title 副标题
 * @property string $author 作者
 * @property string $user_id 作者Id
 * @property string $image 封面图
 * @property string $summary 简介
 * @property string $content 文章内容
 * @property int $content_type 文章类型
 * @property int $classify_id 文章分类
 * @property int $view_num 浏览量
 * @property int $comment_num 评论数
 * @property int $is_new 最新
 * @property int $is_hot 最热
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property int $status 状态
 *
 * @property UserCenter $user
 */
class Article extends \backend\models\base\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }


    public static $opts = [
        'status' => [
            0 => '未发布',
            1 => '正常',
            2 => '隐藏',
        ],
        'is_hot' => [
            0 => '否',
            1 => '是'
        ],
        'is_new' => [
            0 => '否',
            1 => '是'
        ],
        'classify_id' => [
            0 => '网站建设',
            1 => '服务器搭建',
            2 => '性能优化',
            3 => '开发技巧',
            4 => '系统架构',
            5 => '开发总结',
            6 => '资源推荐',
        ],
        'content_type' => [
            0 => 'Html',
            1 => 'Markdown',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'content_type', 'classify_id', 'view_num', 'comment_num', 'is_new', 'is_hot', 'status'], 'integer'],
            [['view_num', 'created_at', 'status'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'sub_title', 'author', 'image', 'summary', 'content'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserCenter::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '文章Id',
            'title' => '标题',
            'sub_title' => '副标题',
            'author' => '作者',
            'user_id' => '作者Id',
            'image' => '封面图',
            'summary' => '简介',
            'content' => '文章内容',
            'content_type' => '文章类型',
            'classify_id' => '文章分类',
            'view_num' => '浏览量',
            'comment_num' => '评论数',
            'is_new' => '最新',
            'is_hot' => '最热',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'status' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserCenter::className(), ['id' => 'user_id']);
    }
}
