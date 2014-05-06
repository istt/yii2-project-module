<?php

use yii\helpers\Html;
use yii\grid\GridView;
use istt\project\models\Project;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var istt\project\models\ProjectSearch $searchModel
 */

$this->title = Yii::t('project', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('project', 'Create {modelClass}', [
  'modelClass' => 'Project',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description:ntext',
            'start_date',
            'end_date',
            ['attribute' => 'status', 'filter' => Project::statusOptions(), 'value' => function($data){ return Project::statusValue($data->status); }, 'format' => 'html'],
            // 'url:url',
            // 'demo_url:url',
            // 'percent_complete',
            // 'color_identifier',
            // 'target_budget',
            // 'actual_budget',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
