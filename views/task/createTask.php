<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Task $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Task',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formTask', [
        'model' => $model,
    ]) ?>

</div>
