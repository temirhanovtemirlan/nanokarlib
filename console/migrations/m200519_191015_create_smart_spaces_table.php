<?php

use yii\db\Migration;

/**
 * Handles the creation of table `smart_spaces`.
 */
class m200519_191015_create_smart_spaces_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('smart_spaces', [
            'id' => $this->primaryKey(),
            'name_ru' => $this->string()->notNull(),
            'name_kk' => $this->string()->notNull(),
            'name_en' => $this->string()->notNull(),
            'description_ru' => $this->text()->notNull(),
            'description_kk' => $this->text()->notNull(),
            'description_en' => $this->text()->notNull(),
            'published' => $this->smallInteger()->notNull()->defaultValue(0),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
        ]);

        $this->createIndex('index-published-smart-spaces', 'smart_spaces', 'published');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-published-smart-spaces', 'smart_spaces');
        $this->dropTable('smart_spaces');
    }
}
