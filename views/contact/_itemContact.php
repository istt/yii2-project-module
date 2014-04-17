<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="contact-view">

    <h1><small><?= \Yii::t('app', 'Contact'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'title',
            'birthday',
            'job',
            'company',
            'department',
            'email:email',
            'phone',
            'address',
            'website',
            'im',
            'notes:ntext',
            'type',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
