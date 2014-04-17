<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Department $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title', [ 'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']] ]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parent')->textInput() ?>

    <?= $form->field($model, 'company_id')->widget(Select2::className(), [
				    'data' => ['' => '--- Select ---'],
				    'options' => [
				    	'placeholder' => 'Select a state ...',
				    	'multiple' => TRUE,
				    ],
				    'pluginOptions' => [
				        'allowClear' => true
				    ],
				]); ?>


    <?= $form->field($model, 'email', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']] ])->input('email') ?>

    <?= $form->field($model, 'phone', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone-alt"></i>']] ]) ?>

    <?= $form->field($model, 'address',[ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-map-marker"></i>'] ]]) ?>

	<?= $form->field($model, 'website', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-link"></i>']] ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('project', 'Create') : Yii::t('project', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
