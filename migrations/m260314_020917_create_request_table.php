<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%status}}`
 * - `{{%payment_method}}`
 * - `{{%course}}`
 */
class m260314_020917_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'payment_method_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'started_at' => $this->date()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-request-user_id}}',
            '{{%request}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-request-user_id}}',
            '{{%request}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `status_id`
        $this->createIndex(
            '{{%idx-request-status_id}}',
            '{{%request}}',
            'status_id'
        );

        // add foreign key for table `{{%status}}`
        $this->addForeignKey(
            '{{%fk-request-status_id}}',
            '{{%request}}',
            'status_id',
            '{{%status}}',
            'id',
            'CASCADE'
        );

        // creates index for column `payment_method_id`
        $this->createIndex(
            '{{%idx-request-payment_method_id}}',
            '{{%request}}',
            'payment_method_id'
        );

        // add foreign key for table `{{%payment_method}}`
        $this->addForeignKey(
            '{{%fk-request-payment_method_id}}',
            '{{%request}}',
            'payment_method_id',
            '{{%payment_method}}',
            'id',
            'CASCADE'
        );

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-request-course_id}}',
            '{{%request}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-request-course_id}}',
            '{{%request}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-request-user_id}}',
            '{{%request}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-request-user_id}}',
            '{{%request}}'
        );

        // drops foreign key for table `{{%status}}`
        $this->dropForeignKey(
            '{{%fk-request-status_id}}',
            '{{%request}}'
        );

        // drops index for column `status_id`
        $this->dropIndex(
            '{{%idx-request-status_id}}',
            '{{%request}}'
        );

        // drops foreign key for table `{{%payment_method}}`
        $this->dropForeignKey(
            '{{%fk-request-payment_method_id}}',
            '{{%request}}'
        );

        // drops index for column `payment_method_id`
        $this->dropIndex(
            '{{%idx-request-payment_method_id}}',
            '{{%request}}'
        );

        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-request-course_id}}',
            '{{%request}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-request-course_id}}',
            '{{%request}}'
        );

        $this->dropTable('{{%request}}');
    }
}
