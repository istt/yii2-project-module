<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\istt\project\models\Contact $model
 */

$this->title = Yii::t('project', 'Create {modelClass}', [
  'modelClass' => 'Contact',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formContact', [
        'model' => $model,
    ]) ?>

</div>
