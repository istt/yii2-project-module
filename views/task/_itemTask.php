<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="task-view">

    <h1><small><?= \Yii::t('app', 'Task'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'start_time',
            'end_time',
            'status',
            'priority',
            'percent_complete',
            'project_id',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
