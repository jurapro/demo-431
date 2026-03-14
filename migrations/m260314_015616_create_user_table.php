<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%role}}`
 */
class m260314_015616_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'middle_name' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
        ]);

        // creates index for column `role_id`
        $this->createIndex(
            '{{%idx-user-role_id}}',
            '{{%user}}',
            'role_id'
        );

        // add foreign key for table `{{%role}}`
        $this->addForeignKey(
            '{{%fk-user-role_id}}',
            '{{%user}}',
            'role_id',
            '{{%role}}',
            'id',
            'CASCADE'
        );

        $this->insert('{{%user}}', [
            'role_id' => 1,
            'username' => 'Admin',
            'password' => md5('KorokNET'),
            'first_name' => 'Иван',
            'last_name' => 'Иванов',
            'middle_name' => 'Иванович',
            'phone' => '89131111111',
            'email' => 'admin@admin.com',
        ]);

        $this->insert('{{%user}}', [
            'role_id' => 2,
            'username' => 'user',
            'password' => md5('user'),
            'first_name' => 'Петр',
            'last_name' => 'Петров',
            'middle_name' => 'Петрович',
            'phone' => '89132222222',
            'email' => 'user@user.com',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%role}}`
        $this->dropForeignKey(
            '{{%fk-user-role_id}}',
            '{{%user}}'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            '{{%idx-user-role_id}}',
            '{{%user}}'
        );

        $this->dropTable('{{%user}}');
    }
}
