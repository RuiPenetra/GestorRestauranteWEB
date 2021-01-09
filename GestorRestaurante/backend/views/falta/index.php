<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FaltaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faltas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callout callout-warning">
    <h5>Criar Faltas</h5>

    <p>Necessário selecionar o utilizador a marcar falta. </p>

    <p>
    <span style="font-size: small"><b>Legenda : </b></span>
        <button type="button" class="btn btn-outline-dark">
            <i class="fas fa-user"></i>
        </button>
        Consultar utilizador
        <button type="button" class="btn btn-outline-success ml-3">
            <i class="fas fa-plus-circle"></i>
        </button>
        Selecionar utilizador
    </p>
</div>
<div class="card card-outline card-warning mr-5 ml-5">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            <b>Lista Utilizadores</b>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <?php echo $this->render('//perfil/_search', ['model' => $searchFalta]); ?>
        <div class="row">
            <table class="table table-striped projects mr-2 ml-2">
                <thead>
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Nome
                    </th>
                    <th class="text-center">
                        Apelido
                    </th>
                    <th class="text-center">
                        Email
                    </th>
                    <th class="text-center">
                        Função
                    </th>
                    <th class="text-center">
                        Estado
                    </th>
                    <th class="text-center">
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataProviderFalta->models as $perfil):?>
                    <?php if($perfil->cargo!='cliente'):?>
                        <tr>
                            <td class="text-center">
                                <ul class="list-inline">

                                    <li class="list-inline-item">
                                        <?php if($perfil->genero==0):?>
                                            <?= Html::img('@web/img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                        <?php endif?>
                                        <?php if($perfil->genero==1):?>
                                            <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                        <?php endif?>
                                    </li>

                                </ul>
                            </td>
                            <td class="text-center">
                                <?=$perfil->nome?>
                            </td >
                            <td class="text-center">
                                <?=$perfil->apelido?>
                            </td>
                            <td class="text-center">
                                <?=$perfil->user->email?>
                            </td>
                            <td class="text-center">
                                <?php if($perfil->cargo=='gerente'):?>
                                    Gerente
                                <?php endif;?>
                                <?php if($perfil->cargo=='cliente'):?>
                                    Cliente
                                <?php endif;?>
                                <?php if($perfil->cargo=='atendedorPedidos'):?>
                                    Atendedor Pedidos
                                <?php endif;?>
                                <?php if($perfil->cargo=='empregadoMesa'):?>
                                    Empregado Mesa
                                <?php endif;?>
                                <?php if($perfil->cargo=='cozinheiro'):?>
                                    Cozinheiro
                                <?php endif;?>
                            </td>
                            <td class="text-center">
                                <?php if($perfil->user->status==9){?>
                                    <span class="badge bg-danger">INATIVO</span>
                                <?php }else{?>
                                    <span class="badge bg-success">ATIVO</span>
                                <?php }?>
                            </td>
                            <td class="text-center">
                                <?=Html::a('<i class="fas fa-plus-circle"></i>', ['falta/create', 'id' => $perfil->id_user], ['class' => 'btn btn-success btn-sm']) ?>
                                <?=Html::a('<i class="fas fa-user"></i>',['user'], ['class' => 'btn btn-info btn-sm','data-toggle'=>'modal', 'data-target'=>'#verUser'.$perfil->id_user]) ?>
                                <?=Html::a('<i class="fas fa-calendar"></i>', ['falta/view', 'id' => $perfil->id_user], ['class' => 'btn btn-dark btn-sm']) ?>
                            </td>
                        </tr>
                        <div class="modal fade"  id="verUser<?=$perfil->id_user?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content mt-2 p-0" >
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-10">
                                                <div class="card p-5">
                                                    <div class="card-body">
                                                        <div class="align-center">
                                                            <?php $form = ActiveForm::begin(); ?>
                                                            <div class="mb-4">
                                                                <h6 class="text-uppercase">Dados Pessoais</h6>
                                                                <!-- Solid divider -->
                                                                <hr class="solid">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="box-body box-profile user-painel mt-3">
                                                                        <div class="profile-username text-center">
                                                                            <?php if($perfil->genero==0):?>
                                                                                <?= Html::img('@web/img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                                                            <?php endif?>
                                                                            <?php if($perfil->genero==1):?>
                                                                                <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                                                            <?php endif?>
                                                                            <div class="info center">
                                                                                <div style="text-align: center;">
                                                                                    <?php if (Yii::$app->authManager->getAssignment('gerente',$perfil->id_user) != null):?>
                                                                                        <span class="center badge badge-warning">Gerente</span>
                                                                                    <?php endif;?>
                                                                                    <?php if (Yii::$app->authManager->getAssignment('cliente',$perfil->id_user) != null):?>
                                                                                        <span class="center badge badge-danger">Cliente</span>
                                                                                    <?php endif;?>
                                                                                    <?php if (Yii::$app->authManager->getAssignment('atendedorPedidos',$perfil->id_user) != null):?>
                                                                                        <span class="center badge badge-primary">Atendedor Pedidos</span>
                                                                                    <?php endif;?>
                                                                                    <?php if (Yii::$app->authManager->getAssignment('empregadoMesa',$perfil->id_user) != null
                                                                                    ):?>
                                                                                        <span class="center badge badge-indigo-light">Empregado Mesa</span>
                                                                                    <?php endif;?>
                                                                                    <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$perfil->id_user) != null):?>
                                                                                        <span class="center badge badge-success">Cozinheiro</span>
                                                                                    <?php endif;?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3 rounded-left">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome"])->label(false) ?>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil, 'apelido', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Apelido"])->label(false) ?>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil, 'genero')->dropDownList(['1' => 'Masculino', '0' => 'Feminino'], ['disabled' => 'disabled'],
                                                                            ['prompt'=>'Selecione...'],['maxlenght'=> true],
                                                                            ['options'=> ['class' => 'form-control input_user rounded-right']])->label(false); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil, 'morada', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Morada"])->label(false) ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil, 'codigopostal', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Codigo-Postal"])->label(false) ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil, 'datanascimento',['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'type' => 'date','autocomplete' => 'off'])->label(false) ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil, 'nacionalidade', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Nacionalidade"])->label(false) ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil, 'telemovel', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Telemovel"])->label(false) ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            </div>
                                                            <div class="mb-4 mt-4">
                                                                <h6 class="text-uppercase">Dados Acesso</h6>
                                                                <!-- Solid divider -->
                                                                <hr class="solid">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil->user, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Username"])->label(false) ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                                                        </div>
                                                                        <?= $form->field($perfil->user, 'email', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Email", 'type' => 'email'])->label(false) ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php ActiveForm::end(); ?>
                                                        </div>
                                                    </div>
                                                    <!-- /.tab-content -->
                                                </div><!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
                </tbody>
            </table>
            <div class="row col-md-12 d-flex justify-content-center">
                <?= LinkPager::widget([
                    'pagination' => $dataProviderFalta->getPagination(),
                    'options' => [
                        'class' => 'page-item',
                    ],
                ]);?>
            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>
