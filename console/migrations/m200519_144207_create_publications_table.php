<?php

use yii\db\Migration;

/**
 * Handles the creation of table `publications`.
 */
class m200519_144207_create_publications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('publications', [
            'id' => $this->primaryKey(),
            'language' => $this->string(3)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'announce' => $this->text()->notNull(),
            'title' => $this->string()->notNull(),
            'canonical_title' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
            'published' => $this->smallInteger()->notNull()->defaultValue(0),
        ]);

        $this->createIndex('index-language-publications', 'publications', 'language');
        $this->createIndex('index-category-id-publications', 'publications', 'category_id');
        $this->addForeignKey(
            'fk-category-id-publications',
            'publications',
            'category_id',
            'categories',
            'id'
        );
        $this->createIndex('index-canonical-title-publications', 'publications', 'canonical_title');
        $this->createIndex('index-published-publications', 'publications', 'published');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-published-publications', 'publications');
        $this->dropIndex('index-canonical-title-publications', 'publications');
        $this->dropForeignKey('fk-category-id-publications', 'publications');
        $this->dropIndex('index-category-id-publications', 'publications');
        $this->dropIndex('index-language-publications', 'publications');
        $this->dropTable('publications');
    }
}
