<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property string $id 评论Id
 * @property string $content 评论内容
 * @property int $pid 评论父Id
 * @property int $floor 楼数
 * @property int $love 获赞数
 * @property string $user_id 作者id
 * @property string $article_id 文章Id
 * @property int $status 状态
 *
 * @property Article $article
 * @property UserCenter $user
 */
class Comments extends \backend\models\base\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    public static $opts = [
        'status' => [
            0 => '默认',
            1 => '正常',
            2 => '隐藏'
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'floor', 'love', 'user_id', 'article_id', 'status'], 'integer'],
            [['content'], 'string', 'max' => 255],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserCenter::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '评论Id',
            'content' => '评论内容',
            'pid' => '评论父Id',
            'floor' => '楼数',
            'love' => '获赞数',
            'user_id' => '作者id',
            'article_id' => '文章Id',
            'status' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserCenter::className(), ['id' => 'user_id']);
    }
}
