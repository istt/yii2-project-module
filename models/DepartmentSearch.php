<?php

namespace vendor\istt\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\istt\project\models\Department;

/**
 * DepartmentSearch represents the model behind the search form about `vendor\istt\project\models\Department`.
 */
class DepartmentSearch extends Department
{
    public function rules()
    {
        return [
            [['id', 'parent', 'company_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'description', 'email', 'phone', 'address', 'website'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Department::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent' => $this->parent,
            'company_id' => $this->company_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'website', $this->website]);

        return $dataProvider;
    }
}
