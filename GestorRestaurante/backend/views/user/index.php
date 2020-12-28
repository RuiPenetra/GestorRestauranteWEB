<?php

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
          </div>',['user/create']) ?>
    </div>

    <div class="card card-yellow mr-5 ml-5">
        <div class="card-header">
            <h3 class="card-title text-gray-dark">
                <i class="fas fa-users"></i>
                <b>Lista Utilizadores</b>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <?php echo $this->render('//perfil/_search', ['model' => $searchModel]); ?>
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
                    <?php foreach ($dataProvider->models as $user):?>
                        <tr>
                            <td class="text-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <?php if($user->genero==0):?>
                                            <?= Html::img('@web/img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                        <?php endif?>
                                        <?php if($user->genero==1):?>
                                            <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                        <?php endif?>
                                    </li>

                                </ul>
                            </td>
                            <td class="text-center">
                                <?=$user->nome?>
                            </td >
                            <td class="text-center">
                                <?=$user->apelido?>
                            </td>
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
                                    <button type="button" class="btn btn-block btn-warning btn-sm">INATIVO</button>
                                <?php }else{?>
                                    <button type="button" class="btn btn-block btn-success btn-sm">ATIVO</button>
                                <?php }?>
                            </td>
                            <td class="text-center">
                                <?= Html::a('<i class="fas fa-eye"></i>', ['user/view', 'id' => $user->id_user], ['class' => 'btn btn-info btn-sm']) ?>
                                <?= Html::a('<i class="far fa-edit color-white"></i>', ['user/update', 'id' => $user->id_user], ['class' => 'btn btn-warning btn-sm']) ?>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#apagarUser<?=$user->id_user?>">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade"  id="apagarUser<?=$user->id_user?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            Após apagar o utilizador selecionado não é possivel reverter.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $user->id_user], [
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




