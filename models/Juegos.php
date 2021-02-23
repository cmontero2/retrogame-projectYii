<?php

namespace app\models;

use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "juego".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $visitas
 * @property int $empresa_id
 * @property string $nombre_archivo
 * @property string $estado
 *
 * @property Usuarios $empresa
 * @property JuegoCategoria[] $juegoCategorias
 * @property Seccion[] $seccions
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
    public function __tostring(){
        return $this->nombre;
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'visitas', 'empresa_id', 'nombre_archivo', 'estado', 'iframe_url'], 'required'],
            [['visitas', 'empresa_id'], 'integer'],
            [['nombre'], 'string', 'max' => 60],
            [['descripcion'], 'string', 'max' => 400],
            [['nombre_archivo'], 'string', 'max' => 30],
            [['estado'], 'string', 'max' => 1],
            [['iframe_url'], 'string', 'max' => 200],
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
            'empresa_id' => 'Empresa',
            'nombre_archivo' => 'Nombre Archivo',
            'estado' => 'Estado',
            'iframe_url' => 'Iframe'
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
        return $this->hasMany(JuegoCategoria::className(), ['juego_id' => 'id']);
    }

    /**
     * Gets query for [[Seccions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['juego_id' => 'id']);
    }

    /**
     * Gets query for [[UsuarioJuegos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosJuegos()
    {
        return $this->hasMany(UsuariosJuego::className(), ['juego_id' => 'id']);
    }

    //permite buscar una caracteristica especifica de la tabla
    public static function lookup($condition=''){
        return ArrayHelper::map(self::find()->where($condition)->all(),'id','nombre');
    }

}
