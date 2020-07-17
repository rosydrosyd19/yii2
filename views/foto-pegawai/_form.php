<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FotoPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foto-pegawai-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'pegawai_id')->textInput() ?>

    <?= $form->field($model, 'foto_blob')->textInput() ?>

    <?= $form->field($model, 'foto_blob_other')->textInput() ?>

    <?= $form->field($model, 'foto')->fileInput() ?>

    <?php ActiveForm::end(); ?>

</div>
