<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var vendor\istt\project\models\Project $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><small><?= \Yii::t('app', 'Project'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('project', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('project', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('project', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
