<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_types}}`.
 */
class m190527_150299_create_car_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_types}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(100)->unique(),
            'name' => $this->string(100)->notNull(),
            'maxVolume' => $this->float(2)->notNull(),
            'maxWeight' => $this->float(2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_types}}');
    }
}
