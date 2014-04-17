<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\project\models\Contact $model
 */

$this->title = Yii::t('project', 'Update {modelClass}: ', [
  'modelClass' => 'Contact',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('project', 'Update');
?>
<div class="contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formContact', [
        'model' => $model,
    ]) ?>

</div>
