<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cliente}}`.
 */
class m240624_020252_create_cliente_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cliente}}', [
			'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'telefono' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cliente}}');
    }
}
