<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property int $id
 * @property int $reserva_id
 * @property string $tipo_pago
 * @property float $monto
 *
 * @property Reserva $reserva
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reserva_id', 'tipo_pago', 'monto'], 'required'],
            [['reserva_id'], 'integer'],
            [['tipo_pago'], 'string'],
            [['monto'], 'number'],
            [['reserva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::class, 'targetAttribute' => ['reserva_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reserva_id' => 'Reserva ID',
            'tipo_pago' => 'Tipo Pago',
            'monto' => 'Monto',
        ];
    }

    /**
     * Gets query for [[Reserva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::class, ['id' => 'reserva_id']);
    }
}
