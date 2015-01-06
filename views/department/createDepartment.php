<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Department $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Department',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formDepartment', [
        'model' => $model,
    ]) ?>

</div>
