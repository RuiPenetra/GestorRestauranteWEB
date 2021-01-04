<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Pedido */

$this->title = 'Criar Pedido';

?>

<!--<div class="col-md-12">
    <div class="row d-flex justify-content-center">
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-warning rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-cart-plus m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Criar</div>
        </div>
        <div class="col-md-2">
            <hr class="connecting-line rounded">
        </div>
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-dark rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-utensils m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Add Prod</div>
        </div>
        <div class="col-md-2">
            <hr class="connecting-line rounded">
        </div>
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-dark rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-cash-register m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Terminar</div>
        </div>
    </div>
</div>-->
<div class="card card-outline card-yellow mr-5 ml-5 mt-3"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title text-gray-dark">
            <i class="fas fa-users"></i>
            <?php if($pedido->tipo==0):?>
            <b>Pedido Restaurante</b>
            <?php else:?>
            <b>Pedido Takeaway</b>
            <?php endif;?>
        </h3>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row col-md-12">
            <div class="col-md-6">
                <?php if($pedido->tipo==0):?>
                    <?php echo $this->render('//mesa/_search', ['model' => $searchMesa]);
                endIf?>
            </div>
            <div class="col-md-6">
                <?php echo $this->render('//perfil/_search', ['model' => $searchUser]); ?>
            </div>
        </div>
        <?php $form = ActiveForm::begin(['enableClientValidation'=> false]);?>
        <div class="row col-md-12">
            <div class="col-md-6">
                <?php if($pedido->tipo!=0):?>
                    <div class="card card-outline card-yellow col-md-12 ml-2">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-file-signature"></i> Inserir o nome do pedido</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="col-md-7">
                                <?= $form->field($pedido, 'nome_pedido')->textInput(['class'=>'form-control rounded w-100','placeholder'=>'Nome Pedido','maxlength' => 80])->label(false) ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <?php endif;?>
                <?php if($pedido->tipo==0):?>
                    <div class="row col-md-12">
                        <div class="card card-outline card-yellow col-md-12 mr-2">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-plus"></i> Selecionar Mesa</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
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
                                    <?php foreach ($dataProviderMesa->models as $mesa):?>
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
                                            <td>
                                                <?php if($mesa->estado==2):?>
                                                    <div style="height: 15px">
                                                        <?= $form->field($pedido, 'id_mesa')->radio(['class'=>'','uncheck'=>null,'value' => $mesa->id,'label'=>'Selecionar'])?>
                                                    </div>
                                                <?php endIf?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <div class="row col-md-12 d-flex justify-content-center mt-4">
                                    <?= LinkPager::widget([
                                        'pagination' => $dataProviderMesa->getPagination(),
                                        'options' => [
                                            'class' => 'page-item',
                                        ],
                                    ]);?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="card card-outline card-yellow col-md-12 ml-2">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-plus"></i> Selecionar Responsável</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Apelido</th>
                                    <th class="text-center">Função</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($dataProviderUser->models as $user):?>
                                        <tr>
                                            <td class="text-center">
                                                <?php if($user->genero==0):?>
                                                    <?= Html::img('@web/img/female.png', ['alt' => 'imgPerfil', 'class' => 'table-avatar', 'width'=>'30px', 'height'=>'30px']); ?>
                                                <?php endif?>
                                                <?php if($user->genero==1):?>
                                                    <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'table-avatar', 'width'=>'30px', 'height'=>'30px']); ?>
                                                <?php endif?>
                                            </td>
                                            <td class="text-center"><?=$user->nome?></td>
                                            <td class="text-center"><?=$user->apelido?></td>
                                            <td class="text-center">
                                                <?php if (Yii::$app->authManager->getAssignment('gerente',$user->id_user) != null):?>
                                                    Gerente
                                                <?php endif;?>
                                                <?php if (Yii::$app->authManager->getAssignment('cliente',$user->id_user) != null):?>
                                                    Cliente
                                                <?php endif;?>
                                                <?php if (Yii::$app->authManager->getAssignment('atendedorPedidos',$user->id_user) != null):?>
                                                    Atendedor Pedidos
                                                <?php endif;?>
                                                <?php if (Yii::$app->authManager->getAssignment('empregadoMesa',$user->id_user) != null):?>
                                                    Empregado Mesa
                                                <?php endif;?>
                                                <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$user->id_user) != null):?>
                                                    Cozinheiro
                                                <?php endif;?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($user->user->status==9){?>
                                                    <span class="badge bg-danger">INATIVO</span>
                                                <?php }else{?>
                                                    <span class="badge bg-success">ATIVO</span>
                                                <?php }?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($user->user->status!=9){?>
                                                    <?= $form->field($pedido, 'id_perfil')->radio(['class'=>'','uncheck'=>null,'value' => $user->id_user,'label'=>'Selecionar'])?>
                                                <?php }?>
                                            </td>
                                        </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <div class="row col-md-12 d-flex justify-content-center mt-4">
                                <?= LinkPager::widget([
                                    'pagination' => $dataProviderUser->getPagination(),
                                    'options' => [
                                        'class' => 'page-item',
                                    ],
                                ]);?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <div class="card card-outline card-yellow col-md-12 ml-2">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-calendar"></i> Selecionar data e hora do pedido</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="col-md-5 mt-2">
                        <?= $form->field($pedido, 'data')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Data'],
                            'type' =>DateTimePicker::TYPE_COMPONENT_PREPEND,
                            'size'=>'md',
                            'readonly' => true,
                            'pluginOptions' => [
                                'todayBtn' => true,
                                'autoclose' => true,
                                'language'=>'pt-PT',
                            ]
                        ])->label(false);?>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <?= Html::submitButton('Criar', ['class' => 'btn btn-success']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
