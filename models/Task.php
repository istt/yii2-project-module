<?php

namespace vendor\istt\project\models;

use Yii;

/**
 * This is the model class for table "tbl_task".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property integer $status
 * @property integer $priority
 * @property double $percent_complete
 * @property integer $project_id
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Project $project
 * @property TaskChild[] $taskChildren
 * @property TaskContact[] $taskContacts
 * @property TaskLog[] $taskLogs
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task}}';
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
            [['start_time', 'end_time'], 'safe'],
            [['status', 'priority', 'project_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['percent_complete'], 'number'],
            [['title'], 'string', 'max' => 255]
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
            'start_time' => Yii::t('project', 'Start Time'),
            'end_time' => Yii::t('project', 'End Time'),
            'status' => Yii::t('project', 'Status'),
            'priority' => Yii::t('project', 'Priority'),
            'percent_complete' => Yii::t('project', 'Percent Complete'),
            'project_id' => Yii::t('project', 'Project ID'),
            'created_at' => Yii::t('project', 'Created At'),
            'created_by' => Yii::t('project', 'Created By'),
            'updated_at' => Yii::t('project', 'Updated At'),
            'updated_by' => Yii::t('project', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskChildren()
    {
        return $this->hasMany(TaskChild::className(), ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskContacts()
    {
        return $this->hasMany(TaskContact::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskLogs()
    {
        return $this->hasMany(TaskLog::className(), ['task_id' => 'id']);
    }
}
