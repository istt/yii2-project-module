<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="department-view">

    <h1><small><?= \Yii::t('app', 'Department'); ?>:</small> <?= Html::encode($this->title) ?></h1>


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
            'parent',
            'company_id',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
