<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mesas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/>
            Criar mesa
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="row col-md-12 d-flex justify-content-center">
                <div class="col-md-3 mt-0 ">
                    <div class="box-body box-profile user-painel mt-3">
                        <div class="text-center">
                            <img class="img-responsive" src="https://img.icons8.com/color/100/000000/table.png"/>
<!--                            <img class="img-responsive" width="100px" height="100px" src="img/soup.png" alt="imgPerfil">-->
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="input-group mb-3 col-md-8">
                        <div class="input-group-append">
                            <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                        </div>
                        <?= $form->field($model, 'id', ['options' => ['tag' => 'input',  'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Numero",  'type'=>'number', 'min'=>'0', 'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="input-group mb-3 col-md-8">
                        <div class="input-group-append">
                            <span class="input-group-text rounded-left"><i class="fas fa-euro-sign"></i></span>
                        </div>
                        <?= $form->field($model, 'n_lugares', ['options' => ['tag' => 'input',  'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nº Lugares",  'type'=>'number', 'min'=>'0', 'autofocus' => true])->label(false) ?>
                    </div>
                        <div class="input-group mb-3 d-flex justify-content-end col-md-8">
                            <?= Html::submitButton('Criar', ['class' => 'btn login_btn col-md-4', 'name' => 'login-button']) ?>
                        </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.card-body -->
</div>

<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/>
            Lista de mesas
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="row d-flex justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 60px" class="text-center"></th>
                    <th class="text-center">Nº</th>
                    <th class="text-center">Lugares</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataProvider->models as $mesa):?>
                    <tr>
                        <td class="text-center"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/></td>
                        <td class="text-center"><?=$mesa->id?></td>
                        <td class="text-center"><?=$mesa->n_lugares?></td>
                        <?php if($mesa->estado==0):?>
                            <td class="text-center"><span class="badge bg-dark">Reservada</span></td>
                        <?php endif;?>
                        <?php if($mesa->estado==1):?>
                            <td class="text-center"><span class="badge bg-warning">Ocupada</span></td>
                        <?php endif;?>
                        <?php if($mesa->estado==2):?>
                            <td class="text-center"><span class="badge bg-success">Livre</span></td>
                        <?php endif;?>
                        <td class="text-center">
                            <a href="<?=Url::toRoute(['mesa/view', 'id' => $mesa->id])?>" type="button" class="btn btn-warning">
                                <i class="far fa-edit color-white"></i>
                            </a>
                            <a href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#apagarMesa<?=$mesa->id?>">
                                <i class="far fa-trash-alt color-white"></i>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade"  id="apagarMesa<?=$mesa->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <button type="button" href="<?=Url::toRoute(['mesa/delete', 'id' => $mesa->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
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
