<?php

namespace vendor\istt\project\models;

use Yii;

/**
 * This is the model class for table "tbl_task_child".
 *
 * @property integer $parent
 * @property integer $child
 *
 * @property Task $child0
 * @property Task $parent0
 */
class TaskChild extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task_child}}';
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
            [['parent', 'child'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('project', 'Parent'),
            'child' => Yii::t('project', 'Child'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(Task::className(), ['id' => 'child']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Task::className(), ['id' => 'parent']);
    }
}
