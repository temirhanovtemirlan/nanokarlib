<?php

use yii\db\Migration;

/**
 * Handles the creation of table `views`.
 */
class m200623_140152_create_views_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('views', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->defaultValue(0),
            'session_id' => $this->string()->notNull(),
            'literature_id' => $this->integer()->notNull(),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);

        $this->createIndex('index-user-views', 'views', 'user_id');
        $this->createIndex('index-session-views', 'views', 'session_id');
        $this->createIndex('index-literature-views', 'views', 'literature_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-literature-views', 'views');
        $this->dropIndex('index-session-views', 'views');
        $this->dropIndex('index-user-views', 'views');
        $this->dropTable('views');
    }
}
