<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

?>
<div class="site-error">

<!--    <h1><?/*= Html::encode($this->title) */?></h1>

    <div class="alert alert-danger">
        <?/*= nl2br(Html::encode($message)) */?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>
-->
    <div class="error-page">
        <h2 class="headline text-warning"> 403</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i>Forbidden</h3>

            <p>
                You don’t have permission to access / on this page.
            </p>

        </div>
        <!-- /.error-content -->
    </div>


</div>
