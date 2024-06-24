<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "apartamento".
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $tipo_apartamento
 * @property string $ciudad
 *
 * @property Reserva[] $reservas
 * @property Tarifa[] $tarifas
 */
class Apartamento extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'tipo_apartamento', 'ciudad'], 'required'],
            [['tipo_apartamento'], 'string'],
            [['nombre', 'direccion', 'ciudad'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'tipo_apartamento' => 'Tipo Apartamento',
            'ciudad' => 'Ciudad',
        ];
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['apartamento_id' => 'id']);
    }

    /**
     * Gets query for [[Tarifas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarifas()
    {
        return $this->hasMany(Tarifa::class, ['apartamento_id' => 'id']);
    }
}
