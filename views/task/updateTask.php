<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Task $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
  'modelClass' => 'Task',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('project', 'Update');
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formTask', [
        'model' => $model,
    ]) ?>

</div>
