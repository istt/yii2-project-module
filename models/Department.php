<?php

namespace istt\project\models;

use Yii;

/**
 * This is the model class for table "tbl_department".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $website
 * @property integer $parent
 * @property integer $company_id
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Company $company
 * @property ProjectDepartment[] $projectDepartments
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%department}}';
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
            [['description'], 'string'],
            [['parent', 'company_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
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
            'parent' => Yii::t('project', 'Parent'),
            'company_id' => Yii::t('project', 'Company ID'),
            'created_at' => Yii::t('project', 'Created At'),
            'created_by' => Yii::t('project', 'Created By'),
            'updated_at' => Yii::t('project', 'Updated At'),
            'updated_by' => Yii::t('project', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectDepartments()
    {
        return $this->hasMany(ProjectDepartment::className(), ['department_id' => 'id']);
    }
}
