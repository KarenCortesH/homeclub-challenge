<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 *
 * @property Reserva[] $reservas
 */
class Cliente extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'email'], 'required'],
            [['nombre', 'apellido', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
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
            'apellido' => 'Apellido',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['cliente_id' => 'id']);
    }
}
