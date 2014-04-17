<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\istt\project\models\Company $model
 */

$this->title = Yii::t('project', 'Create {modelClass}', [
  'modelClass' => 'Company',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCompany', [
        'model' => $model,
    ]) ?>

</div>
