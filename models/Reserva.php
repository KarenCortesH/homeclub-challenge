<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property int $apartamento_id
 * @property int $cliente_id
 * @property string $codigo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $estado
 *
 * @property Apartamento $apartamento
 * @property Cliente $cliente
 * @property Pago[] $pagos
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			[['apartamento_id', 'cliente_id', 'codigo', 'fecha_inicio', 'fecha_fin', 'estado'], 'required'],
			[['apartamento_id', 'cliente_id'], 'integer'],
			[['fecha_inicio', 'fecha_fin'], 'safe'],
			[['estado'], 'string'],
			[['estado'], 'in', 'range' => ['Activa', 'Anulada']],
			[['codigo'], 'string', 'max' => 255],
			[['codigo'], 'unique'],
			[['apartamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartamento::class, 'targetAttribute' => ['apartamento_id' => 'id']],
			[['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['cliente_id' => 'id']],
		];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apartamento_id' => 'Apartamento ID',
            'cliente_id' => 'Cliente ID',
            'codigo' => 'Codigo',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Apartamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartamento()
    {
        return $this->hasOne(Apartamento::class, ['id' => 'apartamento_id']);
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id' => 'cliente_id']);
    }

    /**
     * Gets query for [[Pagos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::class, ['reserva_id' => 'id']);
    }
}
