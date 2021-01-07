<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FaltaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faltas';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
<div class="card card-outline card-blue mr-5 ml-5"><!--collapsed-card-->
<?php endif?>

<?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id) != null):?>
    <div class="card card-outline card-indigo mr-5 ml-5"><!--collapsed-card-->
<?php endif?>
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-calendar-alt"></i>
            Lista de faltas
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <?php echo $this->render('_search', ['falta' => $searchFalta]); ?>
        <div class="row d-flex justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 60px" class="text-center"></th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Hora Inicio</th>
                    <th class="text-center">Hora Fim</th>
                    <th class="text-center">NºHoras</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataProviderFalta->models as $falta):?>
                    <tr>
                        <td class="text-center"><i class="fas fa-calendar-alt"></i></td>
                        <td class="text-center"><?=$falta->data?></td>
                        <td class="text-center"><?=date('H:i',strtotime($falta->hora_inicio))?></td>
                        <td class="text-center"><?=date('H:i',strtotime($falta->hora_fim))?></td>
                        <td class="text-center"><?=$falta->num_horas?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>

