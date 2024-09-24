<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m240924_091936_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('Задача'),
            'description' => $this->text()->null()->comment('Описание'),
            'due_date' => $this->date()->notNull()->comment('Срок готовности'),
            'priority' => $this->integer()->notNull()->defaultValue(10)->comment('Приоритет'),
        ], 'CHARACTER SET utf8');

        $this->addColumn('{{%tasks}}', 'status',"ENUM('pause','active','done') NOT NULL DEFAULT 'pause' COMMENT 'Статус'");
        $this->createIndex('idx-tasks-title', '{{%tasks}}', 'title');
        $this->createIndex('idx-tasks-due_date', '{{%tasks}}', 'due_date');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%tasks}}');
    }
}
