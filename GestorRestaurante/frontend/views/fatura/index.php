<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-calendar-alt"></i>
            Gerar Fatura
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row">
            <div class="row col-md-12">
                <div class="col-md-3 mt-0 ">
                    <div class="box-body box-profile user-painel mt-3">
                        <div class="text-center">
                            <img class="img-responsive" width="100px" height="100px" src="img/calendario.png" alt="imgPerfil">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="input-group mb-3">
                        <?= $form->field($model, 'nif')->textInput() ?>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<?php if ($fatura!=null):?>
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
                    <th>Quant</th>
                    <th>Produto</th>
                    <th>Preco</th>
                    <th>Categoria</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($items_pedido as $item): ?>
                <tr>
                    <td><?=$item->quant_Pedida?></td>
                    <td><?=$item->produto->nome?></td>
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
            <p class="lead">Payment Methods:</p>
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>
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
            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
            </button>
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
            </button>
        </div>
    </div>
</div>
<?php endif;?>