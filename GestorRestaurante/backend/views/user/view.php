<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
$this->title="Ver utilizador";
\yii\web\YiiAsset::register($this);
?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

<div class="utilizador-view">
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
                                    <div class="row d-flex justify-content-center mb-3">
                                        <div class="col-6">
                                            <div class="box-body box-profile user-painel mt-3">
                                                <div class="profile-username text-center">
                                                    <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$perfil->id_user) !=null):
                                                        if ($perfil->genero==0):?>
                                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-fluid img-circle']); ?>
                                                        <?php else:?>
                                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-fluid img-circle']); ?>
                                                        <?php endif; endif;?>

                                                    <?php if(Yii::$app->authManager->getAssignment('cliente',$perfil->id_user) != null):
                                                        if ($perfil->genero==0):?>
                                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-fluid img-circle']); ?>
                                                        <?php else:?>
                                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-fluid img-circle']); ?>
                                                        <?php endif; endif;?>

                                                    <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$perfil->id_user) != null):
                                                        if ($perfil->genero==0):?>
                                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos img-fluid img-circle']); ?>
                                                        <?php else:?>
                                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos img-fluid img-circle']); ?>
                                                        <?php endif; endif;?>
                                                    <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$perfil->id_user) != null):
                                                        if ($perfil->genero==0):?>
                                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive img-circle']); ?>
                                                        <?php else:?>
                                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive img-circle']); ?>
                                                        <?php endif; endif;?>
                                                    <?php if(Yii::$app->authManager->getAssignment('gerente',$perfil->id_user) != null):
                                                        if ($perfil->genero==0):?>
                                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-gerente img-responsive img-circle']); ?>
                                                        <?php else:?>
                                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-gerente img-responsive img-circle']); ?>
                                                        <?php endif; endif;?>
                                                    <div class="info center">
                                                        <div style="text-align: center;">
                                                            <?php if (Yii::$app->authManager->getAssignment('gerente',$perfil->id_user) != null):?>
                                                                <span class="center badge badge-warning text-white"><h8>Gerente</h8></span>
                                                            <?php endif;?>
                                                            <?php if (Yii::$app->authManager->getAssignment('cliente',$perfil->id_user) != null):?>
                                                                <span class="center badge badge-danger text-white"><h8>Cliente</h8></span>
                                                            <?php endif;?>
                                                            <?php if (Yii::$app->authManager->getAssignment('atendedorPedidos',$perfil->id_user) != null):?>
                                                                <span class="center badge badge-primary text-white"><h8>Atendedor Pedidos</h8></span>
                                                            <?php endif;?>
                                                            <?php if (Yii::$app->authManager->getAssignment('empregadoMesa',$perfil->id_user) != null
                                                            ):?>
                                                                <span class="center badge badge-indigo-light"><h8>Empregado Mesa</h8></span>
                                                            <?php endif;?>
                                                            <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$perfil->id_user) != null):?>
                                                                <span class="center badge badge-success text-white"><h8>Cozinheiro</h8></span>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
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
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'datanascimento',['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'type' => 'date','autocomplete' => 'off'])->label(false) ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
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
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <?= $form->field($user, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Username"])->label(false) ?>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <?= $form->field($user, 'email', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Email", 'type' => 'email'])->label(false) ?>
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