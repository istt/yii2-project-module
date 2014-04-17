<?php

namespace vendor\istt\project\models;

use Yii;

/**
 * This is the model class for table "tbl_task_log".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $task_id
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Task $task
 */
class TaskLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task_log}}';
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
            [['task_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
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
            'task_id' => Yii::t('project', 'Task ID'),
            'created_at' => Yii::t('project', 'Created At'),
            'created_by' => Yii::t('project', 'Created By'),
            'updated_at' => Yii::t('project', 'Updated At'),
            'updated_by' => Yii::t('project', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
}
