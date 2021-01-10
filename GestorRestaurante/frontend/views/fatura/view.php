<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fatura */

$this->title = 'Refe:'.$fatura->id;
/*$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
\yii\web\YiiAsset::register($this);
?>
    <div class="invoice p-3 mb-3 mr-5 ml-5">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> Gestor Restaurante, Lda.
                    <small class="float-right">Data: <?=$fatura->pedido->data?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Empresa:
                <address>
                    <strong>Gestor Restaurante, Lda.</strong><br>
                    Morada Rua do tasco nº2, 2530-450, Lisboa<br>
                    Telefone: (+351) 219 949 393<br>
                    Email: gestorrestaurante@org.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Funcionário:
                <address>
                    <strong><?=$fatura->pedido->perfil->nome?> <?=$fatura->pedido->perfil->apelido?> </strong><br>
                    Email: <?=$fatura->pedido->perfil->user->email?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Nº fatura: </b><?=$fatura->id?><br>
                <br>
                <b>Nif cliente:</b> <?=$fatura->nif?><br>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quant</th>
                        <th>Preco</th>
                        <th>Categoria</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($items_pedido as $item): ?>
                        <tr>
                            <td><?=$item->produto->nome?></td>
                            <td><?=$item->quant_Pedida?></td>
                            <td><?=$item->produto->preco?> €</td>
                            <td><?=$item->produto->categoria->nome?></td>
                            <td><?=$item->preco?> €</td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">

            </div>
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Montante de:</p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Total:</th>
                            <td><?=$fatura->valor?> €</td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <?= Html::a('<i class="fas fa-trash"></i> Apagar', ['delete', 'id' => $fatura->id], ['class' => 'btn btn-danger float-right','data-toggle'=>'modal',' data-target'=>'#apagarFatura']) ?>
                <div class="modal fade"  id="apagarFatura" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content mt-2" >
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Tem a certeza que quer apagar?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    Após apagar a fatura selecionado não é possivel reverter.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <?= Html::a('<b>SIM</b>', ['delete', 'id' => $fatura->id], [
                                    'class' => 'btn btn-outline-success',
                                    'data' => [
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?= Html::a('<i class="fas fa-edit"></i> Update', ['update', 'id' => $fatura->id], ['class' => 'btn btn-info float-right mr-3']) ?>
            </div>
        </div>
    </div>

