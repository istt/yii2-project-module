<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use istt\project\models\Task;
use yii\helpers\Markdown;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Task $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><small><?= \Yii::t('app', 'Task'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <div class="row">
    	<div class="col-md-12">
		    <?= Markdown::process($model->description, 'gfm'); ?>
    	</div>
    </div>
    <p>
        <?= Html::a(Yii::t('project', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('project', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'start_time',
            'end_time',
            ['attribute' => 'status', 'value' => Task::statusValue($model->status), 'format' => 'html'],
            ['attribute' => 'priority', 'value' => Task::priorityValue($model->priority), 'format' => 'html'],
            'percent_complete',
            'created_at:datetime',
            'created_by',
            'updated_at:datetime',
            'updated_by',
        ],
    ]) ?>

</div>
