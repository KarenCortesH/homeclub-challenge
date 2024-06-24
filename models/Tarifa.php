<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tarifa".
 *
 * @property int $id
 * @property int $apartamento_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property float $valor
 * @property string $tipo_tarifa
 *
 * @property Apartamento $apartamento
 */
class Tarifa extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarifa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apartamento_id', 'fecha_inicio', 'fecha_fin', 'valor', 'tipo_tarifa'], 'required'],
            [['apartamento_id'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['valor'], 'number'],
            [['tipo_tarifa'], 'string'],
            [['apartamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartamento::class, 'targetAttribute' => ['apartamento_id' => 'id']],
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
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'valor' => 'Valor',
            'tipo_tarifa' => 'Tipo Tarifa',
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
}
