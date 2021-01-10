<?php

use kartik\growl\Growl;
use yii\bootstrap4\LinkPager;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriaProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoria Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tags"></i> Nova categoria</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card card-outline card-warning mr-5 ml-5">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tags"></i> Todas as categorias</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="row justify-content-center">
                <table class="table table-striped projects mr-2 ml-2 categoria-table">
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
                    <?php foreach ($dataProvider->models as $categoria):?>
                        <tr>
                            <td class="text-center">
                                <ul class="list-inline">

                                    <li class="list-inline-item">
                                        <?= Html::img('img/tag_icon.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']);?>
                                    </li>

                                </ul>
                            </td>
                            <td class="text-center">
                                <span class="categoria-nome"><?=$categoria->nome?></span>
                            </td >
                            <td class="text-center">
                                <?=Html::a('<i class="far fa-eye"></i>', ['categoriaproduto/view', 'id' => $categoria->id], ['class' => 'btn btn-dark btn-sm']) ?>
                                <?php if($categoria->editavel==true):?>
                                    <?=Html::a('<i class="far fa-edit color-white"></i>', ['categoriaproduto/update', 'id' => $categoria->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#apagarCategoria<?=$categoria->id?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                <?php endif;?>
                            </td>
                        </tr>
                        <div class="modal fade"  id="apagarCategoria<?=$categoria->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button type="button" href="<?=Url::toRoute(['categoriaproduto/delete', 'id' => $categoria->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="row col-md-12 d-flex justify-content-center">
                    <?= LinkPager::widget([
                        'pagination' => $dataProvider->getPagination(),
                        'options' => [
                            'class' => 'page-item',
                        ],
                    ]);?>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>

