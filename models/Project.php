<?php

namespace vendor\istt\project\models;

use Yii;

/**
 * This is the model class for table "tbl_project".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $status
 * @property string $url
 * @property string $demo_url
 * @property double $percent_complete
 * @property string $color_identifier
 * @property string $target_budget
 * @property string $actual_budget
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property ProjectContact[] $projectContacts
 * @property ProjectDepartment[] $projectDepartments
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
    * @inheritdoc
    */
    public static function getDb(){
    	if (\Yii::$app->has('db') && \Yii::$app->db instanceof \yii\db\Connection)
    		return \Yii::$app->db;
    	else
    		return \Yii::$app->db;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['percent_complete', 'target_budget', 'actual_budget'], 'number'],
            [['title', 'url', 'demo_url', 'color_identifier'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('project', 'ID'),
            'title' => Yii::t('project', 'Title'),
            'description' => Yii::t('project', 'Description'),
            'start_date' => Yii::t('project', 'Start Date'),
            'end_date' => Yii::t('project', 'End Date'),
            'status' => Yii::t('project', 'Status'),
            'url' => Yii::t('project', 'Url'),
            'demo_url' => Yii::t('project', 'Demo Url'),
            'percent_complete' => Yii::t('project', 'Percent Complete'),
            'color_identifier' => Yii::t('project', 'Color Identifier'),
            'target_budget' => Yii::t('project', 'Target Budget'),
            'actual_budget' => Yii::t('project', 'Actual Budget'),
            'created_at' => Yii::t('project', 'Created At'),
            'created_by' => Yii::t('project', 'Created By'),
            'updated_at' => Yii::t('project', 'Updated At'),
            'updated_by' => Yii::t('project', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectContacts()
    {
        return $this->hasMany(ProjectContact::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectDepartments()
    {
        return $this->hasMany(ProjectDepartment::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'id']);
    }
}
