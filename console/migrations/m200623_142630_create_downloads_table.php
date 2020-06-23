<?php

use yii\db\Migration;

/**
 * Handles the creation of table `downloads`.
 */
class m200623_142630_create_downloads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('downloads', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->defaultValue(0),
            'session_id' => $this->string()->notNull(),
            'literature_id' => $this->integer()->notNull(),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);

        $this->createIndex('index-user-downloads', 'downloads', 'user_id');
        $this->createIndex('index-session-downloads', 'downloads', 'session_id');
        $this->createIndex('index-literature-downloads', 'downloads', 'literature_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-literature-downloads', 'downloads');
        $this->dropIndex('index-session-downloads', 'downloads');
        $this->dropIndex('index-user-downloads', 'downloads');
        $this->dropTable('downloads');
    }
}
