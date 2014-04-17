<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="project-view">

    <h1><small><?= \Yii::t('app', 'Project'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'start_date',
            'end_date',
            'status',
            'url:url',
            'demo_url:url',
            'percent_complete',
            'color_identifier',
            'target_budget',
            'actual_budget',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
