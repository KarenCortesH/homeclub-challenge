<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartamento}}`.
 */
class m240624_020345_create_apartamento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartamento}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartamento}}');
    }
}
