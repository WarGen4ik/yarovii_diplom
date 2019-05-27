<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%workers}}`.
 */
class m190527_150300_create_workers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%workers}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(100)->notNull(),
            'city' => $this->string(100)->notNull(),
            'phone' => $this->string(50)->notNull(),
            'car_type_id' => $this->integer(11)->notNull(),
            'created_by' => $this->integer(11),
            'created_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk-worker-car_type',
            'workers',
            'car_type_id',
            'car_types',
            'id'
        );

        $this->addForeignKey(
            'fk-worker-created_by',
            'workers',
            'created_by',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-worker-created_by', 'workers');
        $this->dropForeignKey('fk-worker-car_type', 'workers');
        $this->dropTable('{{%workers}}');
    }
}
