<?php

namespace istt\project\models;

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
 * @property Contact[] $contacts
 * @property Department[] $departments
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
	public $fieldDepartments = [];
	public $fieldContacts = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
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
            [['start_date', 'end_date'], 'safe'],
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['percent_complete', 'target_budget', 'actual_budget'], 'number'],
            [['title', 'url', 'demo_url', 'color_identifier'], 'string', 'max' => 255],
            // Relation Data
            [['fieldContacts', 'fieldDepartments'], 'safe'],
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
            'fieldContacts' => Yii::t('project', 'Contacts'),
            'fieldDepartments' => Yii::t('project', 'Departments'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['id' => 'contact_id'])
        ->viaTable(ProjectContact::tableName(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['id' => 'department_id'])
        ->viaTable(ProjectDepartment::tableName(), ['project_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['id' => 'company_id'])
        ->via('departments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'id']);
    }

    /**
     * Return the option list suitable for dropDownList
     */
    public static function options($q = NULL){
      return \yii\helpers\ArrayHelper::map(self::find()->where($q)->all(), 'id', 'title');
    }

    const STATUS_FINISHED = 1;
    const STATUS_INPROGRESS = 0;
    public static function statusOptions($i = NULL) {
        	$options = [
    			self::STATUS_FINISHED		=>	\Yii::t('app', 'Finished'),
    			self::STATUS_INPROGRESS			=>	\Yii::t('app', 'In Progress'),
        	];
        	if (is_null($i)) return $options;
        	elseif (array_key_exists($i, $options)) return $options[$i];
        	else return $i;
        }
        public static function statusValue($i) {
        	if (is_null ( $i )) return NULL;
        	$options = [
        	self::STATUS_FINISHED => \Yii::t ( 'app', '<span class="label label-success">Finished</span>' ),
        	self::STATUS_INPROGRESS => \Yii::t ( 'app', '<span class="label label-info">In Progress</span>' ),
        	];
        	if (array_key_exists ( $i, $options ))
        		return $options [$i];
        	else
        		return $i;
        }

    /**
     * Insert related departments after save
     */
    public function afterSave($insert, $changedAttributes){
    	$new = $this->fieldDepartments;
    	$old = \yii\helpers\ArrayHelper::getColumn($this->getDepartments()->all(), 'id');
    	$addNew = array_diff($new, $old);
    	$removeOld = array_diff($old, $new);
    	// @TODO: Convert this to a batchInsert command
    	foreach ($addNew as $department_id){
    		$projectDepartment = new ProjectDepartment();
    		$projectDepartment->department_id = $department_id;
    		$projectDepartment->project_id = $this->primaryKey;
    		$projectDepartment->save();
    	}
    	ProjectDepartment::deleteAll(['and', ['project_id' => $this->primaryKey], ['in', 'department_id', $removeOld]]);
    	return parent::afterSave($insert, $changedAttributes);
    }

    public function afterFind(){
    	$this->fieldContacts = \yii\helpers\ArrayHelper::getColumn($this->getContacts()->all(), 'id');
    	$this->fieldDepartments = \yii\helpers\ArrayHelper::getColumn($this->getDepartments()->all(), 'id');
    	return parent::afterFind();
    }
}
