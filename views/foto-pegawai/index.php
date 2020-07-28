<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\helper;
use app\models\FotoPegawai;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FotoPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foto Pegawai';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="foto-pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Foto Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pegawai_id',
            // 'foto_blob',

            //** Menampilkan hasil foto yang telah di ubah di fungsi helper sebelumnya.
            [
                'attribute'=>'foto_blob',
                'format'=>'raw',
                'value'=>function($data)
                {
                    return Html::img(helper::showImage($data->foto_blob),['width'=>'100px']);
                }
            ],

            [
                'attribute'=>'foto_blob_other',
                'format'=>'raw',
                'value'=>function($data){
                    return Html::img(helper::showImage($data->foto_blob_other),['width'=>'100px']);
                }
            ],

            [
                'attribute'=>'foto',
                'format'=>'html',
                'value'=>function($data){
                    // return Html::img(Yii::$app->request->BaseUrl . $data->foto,['width'=>'100px']);
                    return Html::img(Yii::$app->request->baseUrl . $data->foto, ['width'=>'100px']);
                }
            ],

            [
                'attribute'=>'foto_other',
                'format'=>'html',
                'value'=>function($data){
                    // return Html::img(Yii::$app->request->BaseUrl . $data->foto,['width'=>'100px']);
                    // return Html::img(Yii::$app->request->baseUrl . $data->foto_other, ['width'=>'100px']);
                    return Html::img(Yii::$app->request->baseUrl . $data->foto_other, ['width'=>'100px']);
                }
            ],

            // [
            //     'attribute'=>'foto',
            //     'format' => 'image',
            //     'value' => function ($model) {
            //         return Url::to('../images/pegawai/foto/'.$model->foto, ['width'=>'100px']);
            //     },
            // ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    ?>

</div>
