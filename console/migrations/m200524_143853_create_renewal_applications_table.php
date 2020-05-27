<?php

use yii\db\Migration;

/**
 * Handles the creation of table `renewal_applications`.
 */
class m200524_143853_create_renewal_applications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('renewal_applications', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'full_name' => $this->string()->notNull(),
            'card_number' => $this->string()->notNull(),
            'book_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('renewal_applications');
    }
}
