<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reserva}}`.
 */
class m240624_020407_create_reserva_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reserva}}', [
            'id' => $this->primaryKey(),
            'apartamento_id' => $this->integer()->notNull(),
            'cliente_id' => $this->integer()->notNull(),
            'codigo' => $this->string()->notNull()->unique(),
            'fecha_inicio' => $this->date()->notNull(),
            'fecha_fin' => $this->date()->notNull(),
            'estado' => $this->string()->notNull(),
        ]);

		// Crear llaves foráneas
        $this->addForeignKey(
            'fk-reserva-apartamento_id',
            '{{%reserva}}',
            'apartamento_id',
            '{{%apartamento}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-reserva-cliente_id',
            '{{%reserva}}',
            'cliente_id',
            '{{%cliente}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Eliminar llaves foráneas
        $this->dropForeignKey('fk-reserva-apartamento_id', '{{%reserva}}');
        $this->dropForeignKey('fk-reserva-cliente_id', '{{%reserva}}');

        // Eliminar tabla
        $this->dropTable('{{%reserva}}');
    }
}
