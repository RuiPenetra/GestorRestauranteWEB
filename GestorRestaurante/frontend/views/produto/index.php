<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\User */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
$id = Yii::$app->user->identity->id;
?>
<?php if (Yii::$app->user->can('criarProdutos')) :?>
<div class="row col-md-12 d-flex justify-content-center">
    <?= Html::a('<div class="col-md-4">
                <!-- small card -->
                <div class="small-box bg-gradient-green p-3" style="width: 300px" id="btn_createProduto">
                    <div class="inner text-white">
                        <h4><b>Novo</b></h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cheese"></i>
                    </div>
                </div>
              </div>', ['produto/create'],['class'=>'novo-produto']) ?>
</div>
<?php endif;?>
<?php if (Yii::$app->authManager->getAssignment('cozinheiro',$id) !=null):?>
    <div class="card card-outline card-success mr-5 ml-5">
<?php endif;?>
<?php if(Yii::$app->authManager->getAssignment('cliente',$id) != null):?>
    <div class="card card-outline card-danger mr-5 ml-5">
<?php endif;?>
<?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
    <div class="card card-outline card-primary mr-5 ml-5">
<?php endif;?>
<?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id) != null):?>
    <div class="card card-outline card-indigo mr-5 ml-5">
<?php endif;?>
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-search"></i>
                Lista Produtos
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <!-- /.card-header -->
            <?php echo $this->render('//produto/_search', ['model' => $searchModel,'categorias'=>$categorias]); ?>
            <div class="row mt-3 ml-3">
                <div class="col-12">
                    <div class="row">
                        <?php foreach ($dataProvider->models as $produto): ?>

                            <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-3 mr-3">
                                <div class="card">
                                    <div class="row d-flex justify-content-center">
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
                                        <?php if ($produto->categoria->editavel== 1): ?>
                                            <?= Html::img('@web/img/outros.png', ['alt' => 'Product Image', 'class' => 'img-fluid m-2','width'=>'130px']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row ml-2 mr-2">
                                    <h7><b><?=$produto->nome?></b></h7>
                                </div>
                                <div class="row ml-2 mr-2 mt-2">
                                    <div class="col">
                                        <p class="«"><?=$produto->preco?> <i class="fas fa-euro-sign text-yellow"></i></p>
                                    </div>
                                    <div class="col text-right">
                                        <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                        <span class="badge badge-warning text-gray">
                                        <?php endif; ?>
                                            <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                            <span class="badge badge-success text-white">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Carne'): ?>
                                            <span class="badge badge-danger text-white">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                            <span class="badge badge-primary text-white">
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

                                    </div>
                                </div>
                                <div class="row ml-3 mr-3 mb-5">
                                    <a href="<?= Url::toRoute(['produto/view','id'=>$produto->id]) ?>" class="btn btn-dark btn-block">Saber mais...</a>
                                </div>
                            </div>

                        <?php endforeach;?>

                    </div>
                    <div class="d-flex justify-content-center">
                        <?= LinkPager::widget([
                            'pagination' => $dataProvider->getPagination(),
                            'options' => [
                                'class' => 'page-item',
                            ],
                        ]);?>
                    </div>
                </div>

            </div>

        </div>
    </div>