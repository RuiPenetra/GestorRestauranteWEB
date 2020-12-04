<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoprodutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidoprodutos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidoproduto-index">



        <?= Html::a('Criar', ['pedidoproduto/criar', 'id' => $pedido->id], ['class' => 'btn btn-primary']) ?>

<!--    --><?php /*echo $this->render('_search', ['model' => $searchModel]); */?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'produto.nome',
            'quantidade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
