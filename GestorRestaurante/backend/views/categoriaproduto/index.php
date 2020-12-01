<?php

use kartik\growl\Growl;
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
            <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Criar categoria
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5 col-xl-2 d-flex justify-content-center">
                    <div class="box-body box-profile user-painel">
                        <?= Html::img('@web/img/tag.png' , ['alt' => 'Tag', 'class' => 'img-fluid', 'width'=>'100px']);?>
                    </div>
                </div>
                <div class="col-md-5 col-xl-3">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <?= $form->field($model, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="d-flex justify-content-end">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card card-warning mr-5 ml-5">
        <div class="card-header">
            <h3 class="card-title">Todas as categorias</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="row justify-content-center">
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
                                <?=$categoria->nome?>
                            </td >
                            <td class="text-center">
                                <a href="<?=Url::toRoute(['categoriaproduto/view', 'id' => $categoria->id])?>" type="button" class="btn btn-dark">
                                    <i class="far fa-eye"></i>
                                </a>
                                <?php if($categoria->editavel==true):?>
                                    <a href="<?=Url::toRoute(['categoriaproduto/update', 'id' => $categoria->id])?>" type="button" class="btn btn-warning">
                                        <i class="far fa-edit color-white"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#apagarCategoria<?=$categoria->id?>">
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
            </div>

        </div>
        <!-- /.card-body -->
    </div>

