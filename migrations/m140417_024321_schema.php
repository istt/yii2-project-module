<?php

use yii\db\Schema;

class m140417_024321_schema extends \yii\db\Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	// companies
    	$this->createTable('{{%company}}',[
    			'id' => Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'email' => Schema::TYPE_STRING,
    			'phone' => Schema::TYPE_STRING,
    			'address' => Schema::TYPE_STRING,
    			'website' => Schema::TYPE_STRING,
    			'created_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    	], $tableOptions);
    	// departments
    	$this->createTable('{{%department}}',[
    			'id' => Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'email' => Schema::TYPE_STRING,
    			'phone' => Schema::TYPE_STRING,
    			'address' => Schema::TYPE_STRING,
    			'website' => Schema::TYPE_STRING,
    			// Custom fields
    			'parent' => Schema::TYPE_INTEGER,
    			'company_id' => Schema::TYPE_INTEGER,
    			'created_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    			], $tableOptions);
    	$this->addForeignKey('department_company', '{{%department}}', 'company_id', '{{%company}}', 'id');
    	// Project
    	$this->createTable('{{%project}}',[
    			'id' => Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'start_date' => Schema::TYPE_DATE,
    			'end_date' => Schema::TYPE_DATE,
    			'status' => Schema::TYPE_BOOLEAN,
    			'url' => Schema::TYPE_STRING,
    			'demo_url' => Schema::TYPE_STRING,
    			'percent_complete' => Schema::TYPE_FLOAT,
    			'color_identifier'	=> Schema::TYPE_STRING,
    			'target_budget' => Schema::TYPE_MONEY,
    			'actual_budget' => Schema::TYPE_MONEY,
    			'created_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    	], $tableOptions);
		// Related dependencies
    	$this->createTable('{{%project_department}}',[
    			'project_id'	=>	Schema::TYPE_INTEGER,
    			'department_id'	=>	Schema::TYPE_INTEGER,
    	], $tableOptions);
    	$this->addForeignKey('project_department_id', '{{%project_department}}', 'department_id', '{{%department}}', 'id');
    	$this->addForeignKey('department_project_id', '{{%project_department}}', 'project_id', '{{%project}}', 'id');
    	// Contacts
    	$this->createTable('{{%contact}}',[
    			'id' => Schema::TYPE_PK,
    			'first_name' => Schema::TYPE_STRING,
    			'last_name' => Schema::TYPE_STRING,
    			'title' => Schema::TYPE_STRING,
    			'birthday' => Schema::TYPE_DATE,
    			'job' => Schema::TYPE_STRING,
    			'company' => Schema::TYPE_STRING,
    			'department' => Schema::TYPE_STRING,
    			'email' => Schema::TYPE_STRING,
    			'phone' => Schema::TYPE_STRING,
    			'address' => Schema::TYPE_STRING,
    			'website' => Schema::TYPE_STRING,
    			'im' => Schema::TYPE_STRING,
    			'notes' => Schema::TYPE_TEXT,
    			// Relation fields
    			'type' => Schema::TYPE_STRING,
    			'created_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    			], $tableOptions);
    	$this->createTable('{{%project_contact}}',[
    			'project_id'	=>	Schema::TYPE_INTEGER,
    			'contact_id'	=>	Schema::TYPE_INTEGER,
    	], $tableOptions);
    	$this->addForeignKey('project_contact_id', '{{%project_contact}}', 'contact_id', '{{%contact}}', 'id');
    	$this->addForeignKey('contact_project_id', '{{%project_contact}}', 'project_id', '{{%project}}', 'id');
    	// Tasks
    	$this->createTable('{{%task}}',[
    			'id' => Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'start_time'	=>	Schema::TYPE_DATETIME,
    			'end_time'	=>	Schema::TYPE_DATETIME,
    			'status' => Schema::TYPE_BOOLEAN,
    			'priority' => Schema::TYPE_SMALLINT,
    			'percent_complete' => Schema::TYPE_FLOAT,
				// Related Attributes
    			'project_id' => Schema::TYPE_INTEGER,
    			'created_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
  		], $tableOptions);
    	$this->addForeignKey('task_project_id', '{{%task}}', 'project_id', '{{%project}}', 'id');
    	$this->createTable('{{%task_contact}}',[
    			'task_id'	=>	Schema::TYPE_INTEGER,
    			'contact_id'	=>	Schema::TYPE_INTEGER,
    			], $tableOptions);
    	$this->addForeignKey('task_contact_id', '{{%task_contact}}', 'contact_id', '{{%contact}}', 'id');
    	$this->addForeignKey('contact_task_id', '{{%task_contact}}', 'task_id', '{{%task}}', 'id');
    	// Task child parent relation
    	$this->createTable('{{%task_child}}',[
    			'parent'	=>	Schema::TYPE_INTEGER,
    			'child'	=>	Schema::TYPE_INTEGER,
    			], $tableOptions);
    	$this->addForeignKey('task_parent', '{{%task_child}}', 'parent', '{{%task}}', 'id');
    	$this->addForeignKey('task_child', '{{%task_child}}', 'child', '{{%task}}', 'id');
    	// Task Log
    	$this->createTable('{{%task_log}}',[
    			'id' => Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			// Related Attributes
    			'task_id' => Schema::TYPE_INTEGER,
    			'created_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    			], $tableOptions);
    	$this->addForeignKey('task_log_task', '{{%task_log}}', 'task_id', '{{%task}}', 'id');
    }

    public function down()
    {
    	$this->dropTable('{{%task_log}}');
    	$this->dropTable('{{%task_contact}}');
    	$this->dropTable('{{%task_child}}');
    	$this->dropTable('{{%task}}');
    	$this->dropTable('{{%project_contact}}');
    	$this->dropTable('{{%contact}}');
    	$this->dropTable('{{%project_department}}');
    	$this->dropTable('{{%department}}');
    	$this->dropTable('{{%project}}');
    	$this->dropTable('{{%company}}');
    }
}
