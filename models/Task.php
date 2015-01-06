<?php

namespace istt\project\models;

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
            [['start_time', 'end_time'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['start_time'], 'compare', 'compareAttribute' => 'end_time', 'operator' => '<='],
            [['status', 'priority', 'project_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['percent_complete'], 'number'],
            [['percent_complete'], 'compare', 'compareValue' => 100, 'operator' => '<='],
            [['percent_complete'], 'compare', 'compareValue' => 0, 'operator' => '>='],
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


    /**
     * Options function
     */
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
				self::STATUS_FINISHED => \Yii::t ( 'app', 'Finished' ),
				self::STATUS_INPROGRESS => \Yii::t ( 'app', 'In Progress' )
		];
		if (is_null ( $i ))
			return $options;
		elseif (array_key_exists ( $i, $options ))
			return $options [$i];
		else
			return $i;
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
    const PRIORITY_HIGHEST = 6;
    const PRIORITY_HIGHER = 5;
    const PRIORITY_HIGH = 4;
    const PRIORITY_NORMAL = 3;
    const PRIORITY_LOW = 2;
    const PRIORITY_LOWER = 1;
    const PRIORITY_LOWEST = 0;
    public static function priorityOptions($i = NULL) {
        	$options = [
    			self::PRIORITY_HIGHEST		=>	\Yii::t('app', 'Highest'),
    			self::PRIORITY_HIGHER		=>	\Yii::t('app', 'Higher'),
    			self::PRIORITY_HIGH		=>	\Yii::t('app', 'High'),
    			self::PRIORITY_NORMAL		=>	\Yii::t('app', 'Normal'),
    			self::PRIORITY_LOW		=>	\Yii::t('app', 'Low'),
    			self::PRIORITY_LOWER		=>	\Yii::t('app', 'Lower'),
    			self::PRIORITY_LOWEST		=>	\Yii::t('app', 'Lowest'),
        	];
        	if (is_null($i)) return $options;
        	elseif (array_key_exists($i, $options)) return $options[$i];
        	else return $i;
        }
        public static function priorityValue($i) {
        	if (is_null ( $i )) return NULL;
        	$options = [
        		self::PRIORITY_HIGHEST		=>	\Yii::t('app', '<span class="label label-danger">Highest</span>'),
    			self::PRIORITY_HIGHER		=>	\Yii::t('app', '<span class="label label-warning">Higher</span>'),
    			self::PRIORITY_HIGH		=>	\Yii::t('app', '<span class="label label-primary">High</span>'),
    			self::PRIORITY_NORMAL		=>	\Yii::t('app', '<span class="label label-default">Normal</span>'),
    			self::PRIORITY_LOW		=>	\Yii::t('app', '<span class="label label-primary">Low</span>'),
    			self::PRIORITY_LOWER		=>	\Yii::t('app', '<span class="label label-warning">Lower</span>'),
    			self::PRIORITY_LOWEST		=>	\Yii::t('app', '<span class="label label-danger">Lowest</span>'),
        	];
        	if (array_key_exists ( $i, $options ))
        		return $options [$i];
        	else
        		return $i;
        }
}
