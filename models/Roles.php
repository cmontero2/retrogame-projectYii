<?php

namespace app\models;

use Yii;
use app\models\Usuario;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "rol".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Usuario[] $usuarios
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 30],
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
        ];
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['rol_id' => 'id']);
    }

    public static function lookup($condition=''){
        return ArrayHelper::map(self::find()->where($condition)->all(),'id','nombre');
    }
      
}
