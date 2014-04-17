<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Company $model
 */

$this->title = Yii::t('project', 'Update {modelClass}: ', [
  'modelClass' => 'Company',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('project', 'Update');
?>
<div class="company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCompany', [
        'model' => $model,
    ]) ?>

</div>
