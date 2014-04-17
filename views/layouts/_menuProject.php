<?php
/**
 * Return a list of menu item suitable for display in the main Nav
 */
return [
	['label' => \Yii::t('project', 'Project Management'), 'url' => '#', 'items' => [
		['label' => \Yii::t('project','Companies'), 'url' => ['/project/company/index']],
		['label' => \Yii::t('project','Departments'), 'url' => ['/project/department/index']],
		['label' => \Yii::t('project','Projects'), 'url' => ['/project/project/index']],
		['label' => \Yii::t('project','Contacts'), 'url' => ['/project/contact/index']],
		['label' => \Yii::t('project','Tasks'), 'url' => ['/project/task/index']],
	]]
];