<?php

use yii\db\Migration;

/**
 * Class m190528_115045_alter_user_table
 */
class m190528_115045_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'is_admin', $this->boolean()->defaultValue(false));
        $this->addColumn('user', 'is_manager', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'is_admin');
        $this->dropColumn('user', 'is_manager');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190528_115045_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
