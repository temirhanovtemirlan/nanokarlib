<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedbacks`.
 */
class m200519_201826_create_feedbacks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('feedbacks', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'full_name' => $this->string()->notNull(),
            'message' => $this->text()->notNull(),
            'published' => $this->smallInteger()->notNull()->defaultValue(0),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
        ]);

        $this->createIndex('index-published-feedbacks', 'feedbacks', 'published');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-published-feedbacks', 'feedbacks');
        $this->dropTable('feedbacks');
    }
}
