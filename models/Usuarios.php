<?php

namespace app\models;

use yii\helpers\ArrayHelper;

use kartik\password\StrengthValidator;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property int $rol_id
 * @property int $nivel_foro_id
 * @property string $user
 * @property string|null $nombre
 * @property string $password
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
            [['rol_id', 'nivel_foro_id', 'user', 'password', 'email', 'estado', 'token'], 'required'],
            [['rol_id', 'nivel_foro_id', 'telefono'], 'integer'],
            [['nacimiento'], 'safe'],
            [['telefono'], 'k-phone', 'countryValue' => 'ES'],
            //[['password'], StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'user'],
            [['user', 'poblacion'], 'string', 'max' => 30],
            [['nombre', 'password', 'email', 'token'], 'string', 'max' => 60],
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
            'rol_id' => 'Rol',
            'nivel_foro_id' => 'Nivel Foro',
            'user' => 'Usuario',
            'nombre' => 'Nombre',
            'password' => 'Contraseña',
            'email' => 'Email',
            'nacimiento' => 'Fecha de nacimiento',
            'estado' => 'Estado',
            'poblacion' => 'Población',
            'CIF' => 'CIF',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'token' => 'Token',
        ];
    }

    public function __toString(){
        return $this->user;
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
    
    //antes de guardar, crea 
    public function beforeSave($insert){
        //guardar md5 pass si la contraseña no tiene 32 caracteres
        if(strlen($this->password) != 32){
            $this->password= md5($this->password);
        }
        return parent::beforeSave($insert);
    }
    
    //permite buscar una caracteristica especifica de la tabla
    public static function lookup($condition=''){
        return ArrayHelper::map(self::find()->where($condition)->all(),'id','nombre');
    }

    //formatea la fecha a d/m/y
    public function getfechaText(){
        return \Yii::$app->formatter->asDate($this->fecha);
    }
    
}
