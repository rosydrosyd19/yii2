<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\helper;
use app\models\FotoPegawai;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FotoPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foto Pegawais';
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
                'format'=>['image',['width'=>'100','height'=>'100']],
                'value'=>function($data)
                {
                    // return 'data:image/jpeg;base64,'.$data->foto_blob;
                    return helper::showImage($data->foto_blob);
                }
            ],

                // 'showImage',

        // [
        //     'attribute'=>'foto_blob',
        //     // 'format'=>['image',['width'=>'100','height'=>'100']],
        //     'value'=>function($data)
        //     {
        //         // return 'data:image/jpeg;base64,'.$data->foto_blob;
        //         $foto_pegawai = FotoPegawai::find()->all();
        //         // $foto_pegawai = FotoPegawai::findOne('US');
        //         echo $foto_pegawai->foto_blob;
        //     }
        // ],

        // [
        //     'attribute'=>'foto_blob_other',
        //     'format'=>['image',['width'=>'100','height'=>'100']],
        //     'value'=>function($data)
        //     {
        //         return 'data:image/jpeg;base64,'.$data->foto_blob_other;

        //     }
        // ],

            // $result = FotoPegawaiController::DisplayBlob($_user);
            // foreach($result as $image){
             // echo  'hello';
                // echo '<img src="data:image/jpeg;base64,'.base64_encode($image['Picture'] ).'" height="100" width="100"/>';

            // 'foto_blob_other',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    
    ?>


</div>
