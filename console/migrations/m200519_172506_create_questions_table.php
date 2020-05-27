<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%questions}}`.
 */
class m200519_172506_create_questions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('questions', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'answer' => $this->text(),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
            'published' => $this->smallInteger()->notNull()->defaultValue(0),
        ]);

        $this->createIndex('index-published-questions', 'questions', 'published');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-published-questions', 'questions');
        $this->dropTable('questions');
    }
}
