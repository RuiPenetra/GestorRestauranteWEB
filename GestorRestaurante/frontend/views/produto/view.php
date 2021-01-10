<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $produto common\models\Produto */

$this->title ="Produto: ".$produto->nome;
\yii\web\YiiAsset::register($this);
?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-utensils"></i>
            Produto
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row">
            <div class="row col-md-12 d-flex justify-content-center">
                <div class="col-md-3 mt-0 ">
                    <div class="box-body box-profile user-painel mt-3">
                        <div class="text-center">
                            <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image',  'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Carne'): ?>
                                <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                                <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                            <?php if ($produto->categoria->nome == 'Bebida'): ?>
                                <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','style'=>'width:130px;']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row col-md-8">
                        <table class="table table-striped table-bordered detail-view">
                            <tbody>
                                <tr>
                                    <th>Nome</th><td><?=$produto->nome?></td>
                                </tr>
                                <tr>
                                    <th>Preço</th><td><?=$produto->preco?></td>
                                </tr>
                                <tr>

                                    <th>Categoria</th>
                                    <td>
                                        <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                        <span class="badge badge-warning text-gray">
                                        <?php endif; ?>
                                            <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                            <span class="badge badge-success">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Carne'): ?>
                                            <span class="badge badge-danger text-white">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                            <span class="badge badge-blue-light">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                                            <span class="badge badge-info">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Bebida'): ?>
                                            <span class="badge badge-orange">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome != 'Entrada' && $produto->categoria->nome != 'Sopa' && $produto->categoria->nome != 'Carne'
                                                && $produto->categoria->nome != 'Peixe' && $produto->categoria->nome != 'Sobremesa'&& $produto->categoria->nome != 'Bebida'): ?>
                                            <span class="badge badge-dark">
                                        <?php endif; ?>
                                        <?=$produto->categoria->nome?>
                                            </span>
                                    </td>
                                    <tr>
                                    <th>Ingredientes</th><td><?=$produto->ingredientes?></td>

                                </tr>
                            </tbody>
                        </table>

                        <p>
                            <?php if (\Yii::$app->user->can('atualizarProdutos')):?>
                            <?=Html::a('<i class="fas fa-edit"></i> Atualizar', ['produto/update', 'id' => $produto->id], ['class' => 'btn btn-warning btn-sm']) ?>
                            <?php endif?>
                            <?php if (\Yii::$app->user->can('apagarProdutos')):?>
                            <?=Html::a('<i class="fas fa-trash"></i> Apagar', ['produto/delete', 'id' => $produto->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarMesa'.$produto->id]) ?>
                            <?php endif?>
                        <div class="modal fade"  id="apagarMesa<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            Após apagar a mesa selecionada não é possivel reverter.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $produto->id], [
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
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>


