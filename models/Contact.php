<?php

namespace istt\project\models;

use Yii;

/**
 * This is the model class for table "tbl_contact".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $title
 * @property string $birthday
 * @property string $job
 * @property string $company
 * @property string $department
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $website
 * @property string $im
 * @property string $notes
 * @property string $type
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property ProjectContact[] $projectContacts
 * @property TaskContact[] $taskContacts
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }

    public function behaviors(){
        return [
        	['class' => \yii\behaviors\BlameableBehavior::className()],
        	['class' => \yii\behaviors\TimestampBehavior::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['notes'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['first_name', 'last_name', 'title', 'job', 'company', 'department', 'email', 'phone', 'address', 'website', 'im', 'type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('project', 'ID'),
            'first_name' => Yii::t('project', 'First Name'),
            'last_name' => Yii::t('project', 'Last Name'),
            'title' => Yii::t('project', 'Title'),
            'birthday' => Yii::t('project', 'Birthday'),
            'job' => Yii::t('project', 'Job'),
            'company' => Yii::t('project', 'Company'),
            'department' => Yii::t('project', 'Department'),
            'email' => Yii::t('project', 'Email'),
            'phone' => Yii::t('project', 'Phone'),
            'address' => Yii::t('project', 'Address'),
            'website' => Yii::t('project', 'Website'),
            'im' => Yii::t('project', 'Im'),
            'notes' => Yii::t('project', 'Notes'),
            'type' => Yii::t('project', 'Type'),
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
        return $this->hasMany(ProjectContact::className(), ['contact_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskContacts()
    {
        return $this->hasMany(TaskContact::className(), ['contact_id' => 'id']);
    }
}
