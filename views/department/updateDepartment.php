<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Department $model
 */

$this->title = Yii::t('project', 'Update {modelClass}: ', [
  'modelClass' => 'Department',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('project', 'Update');
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formDepartment', [
        'model' => $model,
    ]) ?>

</div>
