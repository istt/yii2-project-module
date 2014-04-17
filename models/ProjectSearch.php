<?php

namespace vendor\istt\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\istt\project\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `vendor\istt\project\models\Project`.
 */
class ProjectSearch extends Project
{
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'description', 'start_date', 'end_date', 'url', 'demo_url', 'color_identifier'], 'safe'],
            [['percent_complete', 'target_budget', 'actual_budget'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Project::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'percent_complete' => $this->percent_complete,
            'target_budget' => $this->target_budget,
            'actual_budget' => $this->actual_budget,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'demo_url', $this->demo_url])
            ->andFilterWhere(['like', 'color_identifier', $this->color_identifier]);

        return $dataProvider;
    }
}
