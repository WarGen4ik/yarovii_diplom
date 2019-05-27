<?php

use yii\db\Migration;

/**
 * Class m190527_145637_alter_user_table
 */
class m190527_145637_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'phone', $this->string(25));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'phone');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190527_145637_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
