<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use istt\project\models\Project;

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
		    <?= $form->field($model, 'project_id')->dropDownList(Project::options()); ?>
		    <div class="row">
	    		<div class="col-xs-6">
				    <?= $form->field($model, 'start_time')->textInput() ?>
	    		</div>
			    <div class="col-xs-6">
				    <?= $form->field($model, 'end_time')->textInput() ?>
	    		</div>
    		</div>
	    </div>
	    <div class="col-xs-4">
		    <?= $form->field($model, 'status')->textInput() ?>
		    <?= $form->field($model, 'priority')->textInput() ?>
		    <?= $form->field($model, 'percent_complete')->textInput() ?>
	    </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('project', 'Create') : Yii::t('project', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
