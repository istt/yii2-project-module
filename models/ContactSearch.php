<?php

namespace vendor\istt\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\istt\project\models\Contact;

/**
 * ContactSearch represents the model behind the search form about `vendor\istt\project\models\Contact`.
 */
class ContactSearch extends Contact
{
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['first_name', 'last_name', 'title', 'birthday', 'job', 'company', 'department', 'email', 'phone', 'address', 'website', 'im', 'notes', 'type'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Contact::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'job', $this->job])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'im', $this->im])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
