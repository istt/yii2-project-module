<?php

namespace vendor\istt\project\models;

use Yii;

/**
 * This is the model class for table "tbl_task_contact".
 *
 * @property integer $task_id
 * @property integer $contact_id
 *
 * @property Task $task
 * @property Contact $contact
 */
class TaskContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task_contact}}';
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
            [['task_id', 'contact_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => Yii::t('project', 'Task ID'),
            'contact_id' => Yii::t('project', 'Contact ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::className(), ['id' => 'contact_id']);
    }
}
