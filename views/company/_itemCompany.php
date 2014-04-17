<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="company-view">

    <h1><small><?= \Yii::t('app', 'Company'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'email:email',
            'phone',
            'address',
            'website',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
