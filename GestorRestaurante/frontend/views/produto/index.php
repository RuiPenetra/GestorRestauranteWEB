<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\User */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $id = Yii::$app->user->identity->id; ?>
<?php if (Yii::$app->authManager->getAssignment('cozinheiro',$id) !=null){?>
<div class="card card-outline card-success mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-utensils"></i>
            Criar Ementa
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body" style="display: block;">
        <button type="button" class="btn btn-success">
            <a class="btn-success" href="<?= Url::toRoute(['produto/create']) ?>" role="button">
                <i class="fas fa-plus"></i>
                Novo
            </a>
        </button>
    </div>
    <?php }?>
    <!-- /.card-body -->
</div>
<?php if(Yii::$app->authManager->getAssignment('cliente',$id) != null){?>
<div class="card card-danger mr-5 ml-5">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-utensils"></i>
            <b>Lista Ementas</b>
        </h3>
    </div>
    <?php }?>
<?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null){?>
    <div class="card card-primary mr-5 ml-5">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-utensils"></i>
                <b>Lista Ementas</b>
            </h3>
        </div>

    <?php }?>

        <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id) != null){?>
        <div class="card card-indigo mr-5 ml-5">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-utensils"></i>
                    <b>Lista Ementas</b>
                </h3>
            </div>

            <?php }?>
    <div class="card-body p-0">
        <!-- /.card-header -->
        <?php echo $this->render('//produto/_search', ['model' => $searchModel,'categorias'=>$categorias]); ?>
        <div class="row">
            <table class="table table-striped projects mr-2 ml-2">
                <thead>
                <tr>
                    <th class="text-center">
                        Nome
                    </th>
                    <th class="text-center">
                        Categoria
                    </th>
                    <th class="text-center">
                        Preco
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataProvider->models as $produto):?>
                <tr>
                    <td class="text-center">
                        <ul class="list-inline">

                            <li class="list-inline-item">
                                <?= $produto->nome?>
                            </li>

                        </ul>

                    </td>
                    <td class="text-center">
                        <?= ($produto->categoria->nome)?>
                    </td >
                    <td class="text-center">
                        <ul class="list-inline">

                            <li class="list-inline-item">
                                <?= $produto->preco?>€
                            </li>

                        <td class="text-center">
                        <ul>
                        <span class="product-description text-right">

                                <?= Html::a('<i class="fas fa-eye"></i>', ['produto/view', 'id' => $produto->id], ['class' => 'btn btn-info btn-sm']) ?>
                                <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$id) !=null){?>
                                <?= Html::a('<i class="far fa-edit color-white"></i>', ['produto/update', 'id' => $produto->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                <?= Html::a('<i class="far fa-trash-alt color-white"></i>', ['produto/delete', 'id' => $produto->id], ['class' => 'btn btn-danger btn-sm','data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                                 ]]) ;}?>

                      </span>

                    </td>
                        </ul>
            <?php endforeach;?>


</div>
