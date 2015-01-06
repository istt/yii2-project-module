<?php

use yii\helpers\Html;
use yii\grid\GridView;
use istt\project\models\Task;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var istt\project\models\TaskSearch $searchModel
 */

$this->title = Yii::t('project', 'Tasks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Task',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description:ntext',
            'start_time',
            'end_time',
            ['attribute' => 'status', 'filter' => Task::statusOptions(), 'value' => function ($data, $index, $widget){ return Task::statusValue($data->status); }, 'format' => 'html'],
            ['attribute' => 'priority', 'filter' => Task::priorityOptions(), 'value' => function($data, $index, $widget){ return Task::priorityValue($data->priority); }, 'format' => 'html'],
            'percent_complete',
            // 'project_id',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
