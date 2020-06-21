<?php

use yii\db\Migration;

/**
 * Handles the creation of table `literature`.
 */
class m200621_170253_create_literature_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('literature', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->notNull(),
            'title' => $this->string()->notNull(),
            'canonical_title' => $this->string()->notNull(),
            'author' => $this->text(),
            'description_ru' => $this->text(),
            'description_kk' => $this->text(),
            'publish_date' => $this->timestamp(),
            'published' => $this->smallInteger()->notNull()->defaultValue(0),
            'readable' => $this->smallInteger()->notNull()->defaultValue(0),
            'downloadable' => $this->smallInteger()->notNull()->defaultValue(0),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
        ]);

        $this->createIndex('index-published-literature', 'literature', 'published');
        $this->createIndex('index-publish-date-literature', 'literature', 'publish_date');
        $this->createIndex('index-type-literature', 'literature', 'type');
        $this->createIndex('index-canonical-title-literature', 'literature', 'canonical_title');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-canonical-title-literature', 'literature');
        $this->dropIndex('index-type-literature', 'literature');
        $this->dropIndex('index-publish-date-literature', 'literature');
        $this->dropIndex('index-published-literature', 'literature');
        $this->dropTable('literature');
    }
}
