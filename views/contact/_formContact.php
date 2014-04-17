<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\istt\project\models\Contact $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'title', [
				    			'options' => ['maxlength' => 255],
				    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
					]) ?>

    <?= $form->field($model, 'job')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'im')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('project', 'Create') : Yii::t('project', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
