<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property string $data
 * @property int $estado
 * @property int $tipo
 * @property string|null $nome_pedido
 * @property int|null $id_mesa
 * @property int $id_perfil
 *
 * @property Fatura[] $faturas
 * @property Perfil $perfil
 * @property Mesa $mesa
 * @property PedidoProduto[] $pedidoProdutos
 */
class Pedido extends \yii\db\ActiveRecord
{
    const SCENARIO_RESTAURANTE='scenariorestaurante';
    const SCENARIO_TAKEAWAY='scenariotakeaway';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    public function getCustomScenarios()
    {
        return[
          self::SCENARIO_RESTAURANTE => [['data','estado','tipo','id_mesa','id_perfil'],'required'],
          self::SCENARIO_TAKEAWAY => [['data','estado','tipo','nome_pedido','id_perfil'],'required']
        ];
    }

    public function scenarios()
    {
        $scenarios=parent::scenarios();
        $scenarios[self::SCENARIO_RESTAURANTE] = ['data','estado','tipo','id_mesa','id_perfil'];
        $scenarios[self::SCENARIO_TAKEAWAY] = ['data','estado','tipo','nome_pedido','id_perfil'];
        return $scenarios;
    }

    public function MofifyRequired(){
        $allscenarios= $this->getCustomScenarios();
        return $allscenarios;
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado','tipo','id_mesa','id_perfil'], 'required', 'on' => self::SCENARIO_RESTAURANTE],
            [['estado','tipo','nome_pedido','id_perfil'], 'required', 'on' => self::SCENARIO_TAKEAWAY],
            [['data'], 'safe'],
            [['estado', 'tipo', 'id_mesa', 'id_perfil'], 'integer'],
            [['nome_pedido'], 'string', 'max' => 255],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_user']],
            [['id_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::className(), 'targetAttribute' => ['id_mesa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'estado' => 'Estado',
            'tipo' => 'Tipo',
            'nome_pedido' => 'Nome Pedido',
            'id_mesa' => 'Id Mesa',
            'id_perfil' => 'Id Perfil',
        ];
    }

    /**
     * Gets query for [[Faturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Fatura::className(), ['id_pedido' => 'id']);
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id_user' => 'id_perfil']);
    }

    /**
     * Gets query for [[Mesa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMesa()
    {
        return $this->hasOne(Mesa::className(), ['id' => 'id_mesa']);
    }

    /**
     * Gets query for [[PedidoProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['id_pedido' => 'id']);
    }
}
