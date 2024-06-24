<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tarifa}}`.
 */
class m240624_044022_create_tarifa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tarifa}}', [
            'id' => $this->primaryKey(),
            'apartamento_id' => $this->integer()->notNull(),
            'tipo' => $this->string()->notNull(),
            'precio' => $this->decimal(10, 2)->notNull(),
            // Añade más columnas según sea necesario
        ]);

        // Crear índice para la clave foránea
        $this->createIndex(
            'idx-tarifa-apartamento_id',
            'tarifa',
            'apartamento_id'
        );

        // Agregar la clave foránea
        $this->addForeignKey(
            'fk-tarifa-apartamento_id',
            'tarifa',
            'apartamento_id',
            'apartamento',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Eliminar la clave foránea
        $this->dropForeignKey(
            'fk-tarifa-apartamento_id',
            'tarifa'
        );

        // Eliminar el índice
        $this->dropIndex(
            'idx-tarifa-apartamento_id',
            'tarifa'
        );

        // Eliminar la tabla
        $this->dropTable('{{%tarifa}}');
    }
}
