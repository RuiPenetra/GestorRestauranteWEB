<?php

use common\models\FaltaSearch;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilizadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $id_userLogado=Yii::$app->user->identity->getId()?>

    <div class="row col-md-12 d-flex justify-content-center">
        <?= Html::a('<div class="col-md-4">
            <!-- small card -->
            <div class="small-box bg-gradient-orange p-3" style="width: 300px">
                <div class="inner text-white">
                    <h4><b>Novo</b></h4>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
          </div>',['user/create'],['class'=>'createUser-button']) ?>
    </div>

    <div class="card card-outline card-warning mr-5 ml-5">
        <div class="card-header">
            <h3 class="card-title text-gray-dark">
                <i class="fas fa-users"></i>
                <b>Lista Utilizadores</b>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <?php echo $this->render('//perfil/_search', ['model' => $searchUser]); ?>
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
                    <?php foreach ($dataProviderUser->models as $perfil):?>
                        <tr>
                            <td class="text-center">
                                <div class="profile-username text-center">
                                    <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$perfil->id_user) !=null):
                                        if ($perfil->genero==0):?>
                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-responsive table-avatar']); ?>
                                        <?php else:?>
                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-responsive table-avatar']); ?>
                                        <?php endif; endif;?>

                                    <?php if(Yii::$app->authManager->getAssignment('cliente',$perfil->id_user) != null):
                                        if ($perfil->genero==0):?>
                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-responsive table-avatar']); ?>
                                        <?php else:?>
                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-responsive table-avatar']); ?>
                                        <?php endif; endif;?>

                                    <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$perfil->id_user) != null):
                                        if ($perfil->genero==0):?>
                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos img-responsive table-avatar']); ?>
                                        <?php else:?>
                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos img-responsive table-avatar']); ?>
                                        <?php endif; endif;?>
                                    <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$perfil->id_user) != null):
                                        if ($perfil->genero==0):?>
                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive table-avatar']); ?>
                                        <?php else:?>
                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive table-avatar']); ?>
                                        <?php endif; endif;?>
                                    <?php if(Yii::$app->authManager->getAssignment('gerente',$perfil->id_user) != null):
                                        if ($perfil->genero==0):?>
                                            <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-gerente img-responsive table-avatar']); ?>
                                        <?php else:?>
                                            <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-gerente img-responsive table-avatar']); ?>
                                        <?php endif; endif;?>
                                </div>
                            </td>
                            <td class="text-center">
                                <?=$perfil->nome?>
                            </td >
                            <td class="text-center">
                                <?=$perfil->apelido?>
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
                                <?php if($perfil->user->status==9):?>
                                    <span class="badge bg-danger">Inativo</span>
                                <?php else:?>
                                    <span class="badge bg-success">Ativo</span>
                                <?php endif;?>
                            </td>
                            <td class="text-center">
                                <?php if($perfil->id_user!=$id_userLogado):?>
                                    <?= Html::a('<i class="fas fa-eye"></i>', ['user/view', 'id' => $perfil->id_user], ['class' => 'btn btn-info btn-sm']) ?>
                                    <?= Html::a('<i class="far fa-edit color-white"></i>', ['user/update', 'id' => $perfil->id_user], ['class' => 'btn btn-warning btn-sm']) ?>
                                    <?php if ($perfil->user->status!=9):?>
                                        <?=Html::a('<i class="far fa-trash-alt color-white"></i>', ['user/delete', 'id' => $perfil->id_user], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#desativarUser'.$perfil->id_user]) ?>
                                    <?php else:?>
                                        <?=Html::a('<i class="fas fa-trash-restore-alt"></i>', ['user/delete', 'id' => $perfil->id_user], ['class' => 'btn btn-success btn-sm','data-toggle'=>'modal', 'data-target'=>'#ativarUser'.$perfil->id_user]) ?>
                                    <?php endif;?>
                                <?php endIf?>
                            </td>
                        </tr>
                        <div class="modal fade"  id="desativarUser<?=$perfil->id_user?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content mt-2" >
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Tem a certeza que quer desativar?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                           Ao desativar este utilizador o utilizador passara a ficar inativo, não podendo fazer login.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $perfil->id_user], [
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
                        <div class="modal fade"  id="ativarUser<?=$perfil->id_user?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content mt-2" >
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Tem a certeza que quer ativar?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            Ao ativar este utilizador o utilizador passara a ficar disponivel fazer login.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $perfil->id_user], [
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
                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="row col-md-12 d-flex justify-content-center">
                    <?= LinkPager::widget([
                        'pagination' => $dataProviderUser->getPagination(),
                        'options' => [
                            'class' => 'page-item',
                        ],
                    ]);?>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>




