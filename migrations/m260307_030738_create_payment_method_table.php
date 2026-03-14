<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_method}}`.
 */
class m260307_030738_create_payment_method_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment_method}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('{{%payment_method}}', [
            'code' => 'cash',
            'name' => 'Наличные',
        ]);

        $this->insert('{{%payment_method}}', [
            'code' => 'card',
            'name' => 'Карта',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment_method}}');
    }
}
