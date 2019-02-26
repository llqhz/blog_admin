<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `backend\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'content_type', 'classify_id', 'view_num', 'comment_num', 'is_new', 'is_hot', 'status'], 'integer'],
            [['title', 'sub_title', 'author', 'image', 'summary', 'content', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'content_type' => $this->content_type,
            'classify_id' => $this->classify_id,
            'view_num' => $this->view_num,
            'comment_num' => $this->comment_num,
            'is_new' => $this->is_new,
            'is_hot' => $this->is_hot,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'sub_title', $this->sub_title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
