<?php

namespace istt\project;

class ProjectModule extends \yii\base\Module
{
    public $controllerNamespace = 'istt\project\controllers';

    public function init()
    {
        parent::init();

        \Yii::$app->getI18n()->translations['*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
    }
}
