<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m200517_022842_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->notNull(),
            'name_ru' => $this->string()->notNull(),
            'name_kk' => $this->string()->notNull(),
            'name_en' => $this->string()->notNull(),
            'url_ru' => $this->string()->notNull(),
            'url_kk' => $this->string()->notNull(),
            'url_en' => $this->string()->notNull(),
            'description_ru' => $this->text()->notNull(),
            'description_kk' => $this->text()->notNull(),
            'description_en' => $this->text()->notNull(),
            'parent_id' => $this->integer(),
            'published' => $this->smallInteger()->notNull()->defaultValue(0),
            'ts' => $this->timestamp(),
        ]);

        $this->createIndex('index-type-categories', 'categories', 'type');
        $this->createIndex('index-published-categories', 'categories', 'published');
        $this->createIndex('index-url-ru-categories', 'categories', 'url_ru');
        $this->createIndex('index-url-kk-categories', 'categories', 'url_kk');
        $this->createIndex('index-url-en-categories', 'categories', 'url_en');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-url-en-categories', 'categories');
        $this->dropIndex('index-url-kk-categories', 'categories');
        $this->dropIndex('index-url-ru-categories', 'categories');
        $this->dropIndex('index-published-categories', 'categories');
        $this->dropIndex('index-type-categories', 'categories');
        $this->dropTable('categories');
    }
}
