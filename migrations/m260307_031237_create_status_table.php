<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 */
class m260307_031237_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('{{%status}}', [
            'code' => 'new',
            'name' => 'Новая',
        ]);

        $this->insert('{{%status}}', [
            'code' => 'in_progress',
            'name' => 'Идет обучение',
        ]);

        $this->insert('{{%status}}', [
            'code' => 'done',
            'name' => 'Обучение завершено',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%status}}');
    }
}
