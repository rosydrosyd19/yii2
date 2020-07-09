<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FotoPegawai */

$this->title = 'Update Foto Pegawai: ' . $model->pegawai_id;
$this->params['breadcrumbs'][] = ['label' => 'Foto Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pegawai_id, 'url' => ['view', 'id' => $model->pegawai_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="foto-pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
