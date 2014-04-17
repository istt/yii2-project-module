<?php

namespace istt\project\models;

use Yii;

/**
 * This is the model class for table "tbl_company".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $website
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Department[] $departments
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company}}';
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
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'email', 'phone', 'address', 'website'], 'string', 'max' => 255]
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
            'email' => Yii::t('project', 'Email'),
            'phone' => Yii::t('project', 'Phone'),
            'address' => Yii::t('project', 'Address'),
            'website' => Yii::t('project', 'Website'),
            'created_at' => Yii::t('project', 'Created At'),
            'created_by' => Yii::t('project', 'Created By'),
            'updated_at' => Yii::t('project', 'Updated At'),
            'updated_by' => Yii::t('project', 'Updated By'),
        ];
    }

    public function behaviors(){
        return [
        	['class' => \yii\behaviors\BlameableBehavior::className()],
        	['class' => \yii\behaviors\TimestampBehavior::className()],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['company_id' => 'id']);
    }

    /**
     * Return the option list suitable for dropDownList
     */
    public static function options($q = NULL){
      return \yii\helpers\ArrayHelper::map(self::find()->where($q)->all(), 'id', 'title');
    }
}
