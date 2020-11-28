<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaProduto */


$this->params['breadcrumbs'][] = ['label' => 'Categoria Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<h1><?= Html::encode($categoria->categoria) ?></h1>
    <p>
<?= Html::a('Update', ['update', 'id' => $categoria->id], ['class' => 'btn btn-primary']) ?>
<?= Html::a('Delete', ['delete', 'id' => $categoria->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']])?>
</p>

<table class="table table-striped projects mr-2 ml-2">
    <thead>
    <tr>
        <th class="text-center"  style="width: 10px">
            #
        </th>
        <th class="text-center" style="width: 70px">
            Nome
        </th>
        <th class="text-center" style="width: 30px">

        </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produtos_categoria as $categoria):?>
        <tr>
            <td class="text-center">
                <ul class="list-inline">

                    <li class="list-inline-item">
                        <?= Html::img('img/tag_icon.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']);?>
                    </li>

                </ul>
            </td>
            <td class="text-center">
                <?=$categoria->produto->nome?>
            </td >
            <td class="text-center">
                <!--<a href="<?/*=Url::toRoute(['categoriaproduto/view', 'id' => $categoria->categoriaProduto->id])*/?>" type="button" class="btn btn-dark">
                    <i class="far fa-eye"></i>
                </a>
                    <a href="<?/*=Url::toRoute(['categoriaproduto/update', 'id' => $categoria->categoriaProduto->id])*/?>" type="button" class="btn btn-warning">
                        <i class="far fa-edit color-white"></i>
                    </a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#apagarCategoria<?/*=$categoria->categoriaProduto->id*/?>">
                        <i class="fas fa-trash-alt"></i>
                    </button>-->
            </td>
        </tr>
        <div class="modal fade"  id="apagarCategoria<?=$categoria->categoriaProduto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Após apagar a categoria selecionada não é possivel reverter.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" href="<?=Url::toRoute(['categoriaproduto/delete', 'id' => $categoria->categoriaProduto->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach;?>
    </tbody>
</table>

