<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "juego".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $visitas
 * @property int $empresa_id
 *
 * @property Usuarios $empresa
 * @property JuegosCategoria[] $juegoCategorias
 * @property Secciones[] $seccions
 * @property UsuariosJuego[] $usuarioJuegos
 */
class Juegos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'juego';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'visitas', 'empresa_id'], 'required'],
            [['visitas', 'empresa_id'], 'integer'],
            [['nombre'], 'string', 'max' => 60],
            [['descripcion'], 'string', 'max' => 400],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['empresa_id' => 'id']],
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
            'descripcion' => 'Descripcion',
            'visitas' => 'Visitas',
            'empresa_id' => 'Empresa ID',
        ];
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'empresa_id']);
    }

    /**
     * Gets query for [[JuegoCategorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJuegoCategorias()
    {
        return $this->hasMany(JuegosCategoria::className(), ['juego_id' => 'id']);
    }

    /**
     * Gets query for [[Seccions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Secciones::className(), ['juego_id' => 'id']);
    }

    /**
     * Gets query for [[UsuarioJuegos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioJuegos()
    {
        return $this->hasMany(UsuariosJuego::className(), ['juego_id' => 'id']);
    }
}
