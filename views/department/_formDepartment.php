<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use istt\project\models\Company;
use istt\project\models\Department;

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

    <?= $form->field($model, 'parent')->dropDownList(['' => \Yii::t('project', '-- Select Parent Department --')] + Department::options()) ?>

    <?= $form->field($model, 'company_id')->dropDownList(Company::options()); ?>

    <?= $form->field($model, 'email', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']] ])->input('email') ?>

    <?= $form->field($model, 'phone', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone-alt"></i>']] ]) ?>

    <?= $form->field($model, 'address',[ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-map-marker"></i>'] ]]) ?>

	<?= $form->field($model, 'website', [ 'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-link"></i>']] ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('project', 'Create') : Yii::t('project', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
