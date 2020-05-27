<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m200516_134309_create_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->notNull(),
            'language' => $this->string(3)->notNull()->defaultValue('all'),
            'content' => $this->string()->notNull(),
            'ts' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
        ]);

        $this->createIndex('index-type-settings', 'settings', 'type');
        $this->createIndex('index-language-settings', 'settings', 'language');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-language-settings', 'settings');
        $this->dropIndex('index-type-settings', 'settings');
        $this->dropTable('settings');
    }
}
