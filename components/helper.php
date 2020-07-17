<?php

namespace app\components;

use Yii;
use yii\db\Expression;
use yii\web\UploadedFile;
use app\models\FotoPegawai;

/**
 * This is the model class for table "foto_pegawai".
 *
 * @property int $pegawai_id
 * @property resource|null $foto_blob
 * @property resource|null $foto_blob_other
 */

 class helper
{
    public static function showImage($data = null)
    {
        if ($data) {
			ob_start(); // Let's start output buffering.
	        fpassthru($data); //This will normally output the image, but because of ob_start(), it won't.
	        $contents = ob_get_contents(); //Instead, output above is saved to $contents
	        ob_end_clean(); //End the output buffer.

	        $dataUri = "data:image/png;base64," . base64_encode($contents);
            return $dataUri;//"<img src='$dataUri' />";

        }
        return false;
    }

    public static function simpanFile()
    {

        $model = FotoPegawai::find()
            ->select(['pegawai_id','foto_blob','foto_blob_other'])
            ->orderBy('pegawai_id')
            // ->limit(10)
            ->asArray()
            ->all();

        foreach ($model as $key => $value) {
            if ($value['foto_blob'] != null) {
                // $file_name = "images/pegawai/foto/" . $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                $file_name = "images/pegawai/foto/" . $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                // $file_name = "images/pegawai/foto/" . $value['pegawai_id'] . ".jpg";

                // $model = FotoPegawai::find()
                //     ->where(['pegawai_id'=>$value['pegawai_id']])
                //     ->one();
                // $model->foto ='tes';

                $model = FotoPegawai::find()
                    ->where(['pegawai_id'=>$value['pegawai_id']])
                    ->one();
                // $model->foto = '';
                // $model->foto = $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                // $model->foto = $value['pegawai_id'] . ".jpg";
                $model->foto = $file_name;

                if ($model->Validate() && $model->save()) {
                    $save_foto = file_put_contents($file_name,file_get_contents(self::showImage($value['foto_blob'])));
                    echo $file_name;
                    echo "<br>";
                    // print_r($value);
                    // exit;
                }else{
                    print_r($model->getErrors());
                }
            }if ($value['foto_blob_other'] != null) {

                // print_r($value);
                // $file_name_other = "images/pegawai/foto_other/" . $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                $file_name_other = "images/pegawai/foto_other/" . $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                // $file_name_other = 'images/pegawai/foto_other/' . $value['pegawai_id'] . ".jpg";

                $model = FotoPegawai::find()
                    ->where(['pegawai_id'=>$value['pegawai_id']])
                    ->one();
                // $model->foto_other = '';
                // $model->foto_other = $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                $model->foto_other = $file_name_other;

                if ($model->Validate() && $model->save()) {
                    $save_foto_other = file_put_contents($file_name_other,file_get_contents(self::showImage($value['foto_blob_other'])));
                    echo $file_name_other;
                    echo "<br>";
                    // print_r($value);
                }else{
                    print_r($model->getErrors());
                }
            } else {

                continue;
                // print_r($value);

            }

            // return file_put_contents("../images/pegawai/" . $value['pegawai_id'] . ".jpg",file_get_contents(self::showImage($value['foto_blob_other'])));
            // print_r($value);
        }
    }


        public static function simpanFileConsole()
        {

        $model = FotoPegawai::find()
            ->select(['pegawai_id','foto_blob','foto_blob_other'])
            ->orderBy('pegawai_id')
            // ->limit(10)
            ->asArray()
            ->all();

        foreach ($model as $key => $value) {
            if ($value['foto_blob'] != null) {

                $file = $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                $file_name = "web/images/pegawai/foto/" . $file;
                $file_name_tampil = "images/pegawai/foto/" . $file;;

                $model = FotoPegawai::find()
                    ->where(['pegawai_id'=>$value['pegawai_id']])
                    ->one();
                $model->foto = $file_name_tampil;

                if ($model->Validate() && $model->save()) {
                    $save_foto = file_put_contents($file_name,file_get_contents(self::showImage($value['foto_blob'])));
                    echo $file_name;
                    echo '\n';

                }else{
                    print_r($model->getErrors());
                }

            }if ($value['foto_blob_other'] != null) {

                $file_other = $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                $file_name_other = "web/images/pegawai/foto_other/" . $file_other;
                $file_name_tampil_other = "images/pegawai/foto_other/" . $file_other;

                $model = FotoPegawai::find()
                    ->where(['pegawai_id'=>$value['pegawai_id']])
                    ->one();
                $model->foto_other = $file_name_tampil_other;

                if ($model->Validate() && $model->save()) {
                    $save_foto_other = file_put_contents($file_name_other,file_get_contents(self::showImage($value['foto_blob_other'])));
                    echo $file_name_other;
                    echo '\n';

                }else{
                    print_r($model->getErrors());
                }

            } else {

                continue;
            }
        }

    }

}
