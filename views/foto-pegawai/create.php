<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FotoPegawai */

$this->title = 'Create Foto Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Foto Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-pegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
