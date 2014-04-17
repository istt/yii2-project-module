<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use istt\project\models\Department;
use istt\project\models\Contact;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Project $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	    <div class="col-xs-9">
		    <?= $form->field($model, 'title', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']] ]) ?>

			<?= $form->field($model, 'fieldDepartments')->widget(\kartik\widgets\Select2::className(), [
			    'data' => ["" => "--- Select Departments ---"] + Department::options(),
			    'options' => [ 'multiple' => TRUE, ],
			    'pluginOptions' => [ 'allowClear' => true ],
			])?>

			<?= $form->field($model, 'fieldContacts')->widget(\kartik\widgets\Select2::className(), [
			    'data' => ["" => "--- Select Contacts ---"] + Contact::options(),
			    'options' => [ 'multiple' => TRUE, ],
			    'pluginOptions' => [ 'allowClear' => true ],
			])?>
	    </div>
	     <div class="col-xs-3">
		    <?= $form->field($model, 'status', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-heart"></i>']]])->dropDownList([0 => 'No', 1 => 'Yes'])?>
		    <?= $form->field($model, 'color_identifier')->widget(\kartik\widgets\ColorInput::classname()) ?>
	    </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="row">
	    <div class="col-xs-6">
		    <?= $form->field($model, 'url', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-link"></i>']] ]) ?>
		    <?= $form->field($model, 'demo_url', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-paperclip"></i>']] ]) ?>
	    </div>
    </div>

    <div class="row">
	    <div class="col-xs-8">
		    <?= $form->field($model, 'start_date')->widget(\kartik\widgets\DatePicker::className(), [ 'pluginOptions' => [ 'format' => 'yyyy-mm-dd', 'todayHighlight' => true ] ]); ?>
		    <?= $form->field($model, 'end_date')->widget(\kartik\widgets\DatePicker::className(), [ 'pluginOptions' => [ 'format' => 'yyyy-mm-dd', 'todayHighlight' => true ] ]); ?>
	    </div>
	    <div class="col-xs-4">
		    <?= $form->field($model, 'target_budget', [ 'addon' => ['append' => ['content' => '<i class="glyphicon glyphicon-usd"></i>']]])->textInput(['maxlength' => 19]) ?>
		    <?= $form->field($model, 'actual_budget', [ 'addon' => ['append' => ['content' => '<i class="glyphicon glyphicon-usd"></i>']]])->textInput(['maxlength' => 19]) ?>
	    </div>
    </div>

    <div class="row">
	    <div class="col-xs-3">
	    </div>
	    <div class="col-xs-3 col-xs-offset-3">
	    </div>
	    <div class="col-xs-3">
	    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('project', 'Create') : Yii::t('project', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
