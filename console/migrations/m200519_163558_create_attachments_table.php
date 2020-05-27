<?php

use yii\db\Migration;

/**
 * Handles the creation of table `attachments`.
 */
class m200519_163558_create_attachments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('attachments', [
            'id' => $this->primaryKey(),
            'type' => $this->integer()->notNull(),
            'relative_type' => $this->integer()->notNull(),
            'relative_id' => $this->integer()->notNull(),
            'source' => $this->text()->notNull(),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
            'published' => $this->smallInteger()->defaultValue(0),
        ]);

        $this->createIndex('index-published-attachments', 'attachments', 'published');
        $this->createIndex('index-relative-id-attachments', 'attachments', 'relative_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-relative-id-attachments', 'attachments');
        $this->dropIndex('index-published-attachments', 'attachments');
        $this->dropTable('attachments');
    }
}
