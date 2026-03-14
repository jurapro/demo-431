<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m260307_024503_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('{{%role}}', [
            'code' => 'admin',
            'name' => 'Администратов',
        ]);

        $this->insert('{{%role}}', [
            'code' => 'user',
            'name' => 'Пользователь',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }
}
