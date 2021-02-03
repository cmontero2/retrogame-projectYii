<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property int $rol_id
 * @property int $nivel_foro_id
 * @property string $user
 * @property string|null $nombre
 * @property string $contraseña
 * @property string $email
 * @property string|null $nacimiento
 * @property string $estado
 * @property string|null $poblacion
 * @property string|null $CIF
 * @property string|null $direccion
 * @property int|null $telefono
 * @property string $token
 *
 * @property Entrada[] $entradas
 * @property Juego[] $juegos
 * @property JuegoCategoria[] $juegoCategorias
 * @property NivelForo $nivelForo
 * @property Roles $rol
 * @property UsuarioJuego[] $usuarioJuegos
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rol_id', 'nivel_foro_id', 'user', 'contraseña', 'email', 'estado', 'token'], 'required'],
            [['rol_id', 'nivel_foro_id', 'telefono'], 'integer'],
            [['nacimiento'], 'safe'],
            [['user', 'poblacion'], 'string', 'max' => 30],
            [['nombre', 'contraseña', 'email', 'token'], 'string', 'max' => 60],
            [['estado'], 'string', 'max' => 1],
            [['CIF'], 'string', 'max' => 9],
            [['direccion'], 'string', 'max' => 90],
            [['nivel_foro_id'], 'exist', 'skipOnError' => true, 'targetClass' => NivelForo::className(), 'targetAttribute' => ['nivel_foro_id' => 'id']],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['rol_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rol_id' => 'Rol ID',
            'nivel_foro_id' => 'Nivel Foro ID',
            'user' => 'User',
            'nombre' => 'Nombre',
            'contraseña' => 'Contraseña',
            'email' => 'Email',
            'nacimiento' => 'Nacimiento',
            'estado' => 'Estado',
            'poblacion' => 'Poblacion',
            'CIF' => 'Cif',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'token' => 'Token',
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Juegos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJuegos()
    {
        return $this->hasMany(Juegos::className(), ['empresa_id' => 'id']);
    }

    /**
     * Gets query for [[JuegoCategorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJuegoCategorias()
    {
        return $this->hasMany(JuegosCategoria::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[NivelForo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNivelForo()
    {
        return $this->hasOne(NivelForo::className(), ['id' => 'nivel_foro_id']);
    }

    /**
     * Gets query for [[Rol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Roles::className(), ['id' => 'rol_id']);
    }

    /**
     * Gets query for [[UsuarioJuegos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioJuegos()
    {
        return $this->hasMany(UsuariosJuego::className(), ['usuario_id' => 'id']);
    }

}
