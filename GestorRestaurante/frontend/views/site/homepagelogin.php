<?php
use yii\helpers\Url;
use common\models\User;
/* @var $this yii\web\View */

$this->title = 'Gestor Restaurante';
?>
<?php $id=Yii::$app->user->identity->getId() ?>
<br>
<div class="site-index-bemvindo">
<h2>Bem vindo, <?= User::findOne($id)->username ?></h2>


</div>


<div class="container-fluid">


</div>