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
            [
                'attribute'=>'foto_blob',
                // 'format'=>['image',['width'=>'100','height'=>'100']],
                'format'=>'raw',
                'value'=>function($data)
                {
                    // return 'data:image/jpeg;base64,'.base64_decode($data->foto_blob);
                    // return 'data:image/jpeg;base64_decode,'.$data->foto_blob;
                    // return 'data:image/jpeg;base64,'.helper::test($data->foto_blob_other);
                    // return 'data:image/jpeg;base64,'.helper::readImageBlob($data->foto_blob_other);
                    // return Html::img("data:image/jpeg;base64,'.base64_decode($data->foto_blob).'");
                    return Html::img(helper::showImage($data->foto_blob),['width'=>'100px']);
                    // return helper::test2($data->foto_blob);
                    // return('@web/images/'.$data->foto_blob);
                    // return 'data:image/jpeg;base64,'.base64_decode($data['foto_blob'] );
                    // return ''.helper::readImageBlob( );
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
