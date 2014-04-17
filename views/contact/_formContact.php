<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Contact $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'job')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']] ])->input('email') ?>

    <?= $form->field($model, 'phone', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone-alt"></i>']] ]) ?>

    <?= $form->field($model, 'address',[ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-map-marker"></i>'] ]]) ?>

    <?= $form->field($model, 'website', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-link"></i>']] ]) ?>

    <?= $form->field($model, 'im', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-comment"></i>']] ]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('project', 'Create') : Yii::t('project', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
