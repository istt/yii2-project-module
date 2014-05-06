<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use istt\project\models\Project;
use istt\project\models\Task;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Task $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
	    <div class="col-xs-8">
		    <?= $form->field($model, 'title', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']] ]) ?>
		    <?= $form->field($model, 'project_id', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-cloud"></i>']] ])->dropDownList(Project::options()); ?>
		    <div class="row">
	    		<div class="col-xs-6">
				    <?= $form->field($model, 'start_time')->widget(\kartik\widgets\DateTimePicker::className(), [
				        'pluginOptions' => [
				            'format' => 'yyyy-mm-dd hh:ii:ss',
				            'todayHighlight' => true
				        ]
				    ]);?>
	    		</div>
			    <div class="col-xs-6">
				    <?= $form->field($model, 'end_time')->widget(\kartik\widgets\DateTimePicker::className(), [
				        'pluginOptions' => [
				            'format' => 'yyyy-mm-dd hh:ii:ss',
				            'todayHighlight' => true
				        ]
				    ]);?>
	    		</div>
    		</div>
	    </div>
	    <div class="col-xs-4">
		    <?= $form->field($model, 'status', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-heart"></i>']] ])->dropDownList(Task::statusOptions()) ?>
		    <?= $form->field($model, 'priority', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-fire"></i>']] ])->dropDownList(Task::priorityOptions()) ?>
		    <?= $form->field($model, 'percent_complete', [ 'addon' => ['append' => ['content' => '%']] ])->textInput() ?>
	    </div>
    </div>

    <?= $form->field($model, 'description')->widget(kartik\markdown\MarkdownEditor::classname(), ['height' => 300] );  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('project', 'Create') : Yii::t('project', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
