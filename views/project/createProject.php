<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Project $model
 */

$this->title = Yii::t('project', 'Create {modelClass}', [
  'modelClass' => 'Project',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formProject', [
        'model' => $model,
    ]) ?>

</div>
