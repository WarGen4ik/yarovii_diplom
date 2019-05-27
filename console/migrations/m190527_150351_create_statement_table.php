<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statement}}`.
 */
class m190527_150351_create_statement_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%statement}}', [
            'id' => $this->primaryKey(),
            'worker_id' => $this->integer(11),
            'fio' => $this->string(100)->notNull(),
            'phone' => $this->string(100)->notNull(),
            'status' => $this->string(100)->notNull(),
            'cityFrom' => $this->string(100)->notNull(),
            'cityTo' => $this->string(100)->notNull(),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk-statement-worker_id',
            'statement',
            'worker_id',
            'workers',
            'id'
        );
        $this->addForeignKey(
            'fk-statement-created_by',
            'statement',
            'created_by',
            'user',
            'id'
        );
        $this->addForeignKey(
            'fk-statement-updated_by',
            'statement',
            'updated_by',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-statement-updated_by', 'statement');
        $this->dropForeignKey('fk-statement-created_by', 'statement');
        $this->dropForeignKey('fk-statement-worker_id', 'statement');
        $this->dropTable('{{%statement}}');
    }
}
