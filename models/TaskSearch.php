<?php

namespace istt\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use istt\project\models\Task;

/**
 * TaskSearch represents the model behind the search form about `istt\project\models\Task`.
 */
class TaskSearch extends Task
{
    public function rules()
    {
        return [
            [['id', 'status', 'priority', 'project_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'description', 'start_time', 'end_time'], 'safe'],
            [['percent_complete'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Task::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
            'priority' => $this->priority,
            'percent_complete' => $this->percent_complete,
            'project_id' => $this->project_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
