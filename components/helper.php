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
    //** Fungsi untuk merubah foto_blob dan foto_blob_other agar dapat di load di web
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

    //** Menyimpan image pada directory.
    public static function simpanFile()
    {

        $model = FotoPegawai::find()
            ->select(['pegawai_id','foto_blob','foto_blob_other'])
            ->orderBy('pegawai_id')
            ->asArray()
            ->all();

        foreach ($model as $key => $value) {
            //** Memeriksa data pada kolom foto_blob.
            if ($value['foto_blob'] != null) {

                //** Menentukan tampat dan memberi nama pada image yang akan di unduh */
                $file_name = "images/pegawai/foto/" . $value['pegawai_id'] .'_'. uniqid() . ".jpg";

                $model = FotoPegawai::find()
                    ->where(['pegawai_id'=>$value['pegawai_id']])
                    ->one();
                $model->foto = $file_name;

                //** Bila file ada maka akan di simpan dapa folder "web/images/pegawai/foto"
                if ($model->Validate() && $model->save()) {
                    $save_foto = file_put_contents($file_name,file_get_contents(self::showImage($value['foto_blob'])));
                    echo $file_name;
                    echo "<br>";
                }else{
                    print_r($model->getErrors());
                }

            //** Memeriksa data pada kolom foto_blob_other.
            }if ($value['foto_blob_other'] != null) {

                //** Menentukan tampat dan memberi nama pada image yang akan di unduh */
                $file_name_other = "images/pegawai/foto_other/" . $value['pegawai_id'] .'_'. uniqid() . ".jpg";

                $model = FotoPegawai::find()
                    ->where(['pegawai_id'=>$value['pegawai_id']])
                    ->one();
                $model->foto_other = $file_name_other;

                //** Bila file ada maka akan di simpan dapa folder "web/images/pegawai/foto"
                if ($model->Validate() && $model->save()) {
                    $save_foto_other = file_put_contents($file_name_other,file_get_contents(self::showImage($value['foto_blob_other'])));
                    echo $file_name_other;
                    echo "<br>";
                }else{
                    print_r($model->getErrors());
                }

            //** Bila kolom foto_blob atau foto_blob_other kosong maka akan di lewati.
            } else {

                continue;

            }

        }
    }

        //** Menyimpan image pada directory console comman */
        public static function simpanFileConsole()
        {

        $model = FotoPegawai::find()
            ->select(['pegawai_id','foto_blob','foto_blob_other'])
            ->orderBy('pegawai_id')
            // ->limit(10)
            ->asArray()
            ->all();

        //** Memeriksa data pada kolom foto_blob.
        foreach ($model as $key => $value) {
            if ($value['foto_blob'] != null) {

                //** Memberi nama pada file yang akan di simpan */
                $file = $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                //** Tempat menyimpan file */
                $file_name = "web/images/pegawai/foto/" . $file;
                //**  */
                $file_name_tampil = "images/pegawai/foto/" . $file;;

                $model = FotoPegawai::find()
                    ->where(['pegawai_id'=>$value['pegawai_id']])
                    ->one();
                $model->foto = $file_name_tampil;

                //** Bila file ada maka akan di simpan dapa folder "web/images/pegawai/foto"
                if ($model->Validate() && $model->save()) {
                    $save_foto = file_put_contents($file_name,file_get_contents(self::showImage($value['foto_blob'])));
                    echo $file_name;
                    echo '\n';

                }else{
                    print_r($model->getErrors());
                }

            //** Memeriksa data pada kolom foto_blob_other.
            }if ($value['foto_blob_other'] != null) {

                //** Memberi nama pada file yang akan di simpan */
                $file_other = $value['pegawai_id'] .'_'. uniqid() . ".jpg";
                //** Tempat menyimpan file */
                $file_name_other = "web/images/pegawai/foto_other/" . $file_other;
                $file_name_tampil_other = "images/pegawai/foto_other/" . $file_other;

                $model = FotoPegawai::find()
                    ->where(['pegawai_id'=>$value['pegawai_id']])
                    ->one();
                $model->foto_other = $file_name_tampil_other;

                //** Bila file ada maka akan di simpan dapa folder "web/images/pegawai/foto"
                if ($model->Validate() && $model->save()) {
                    $save_foto_other = file_put_contents($file_name_other,file_get_contents(self::showImage($value['foto_blob_other'])));
                    echo $file_name_other;
                    echo '\n';

                }else{
                    print_r($model->getErrors());
                }

            //** Bila kolom foto_blob atau foto_blob_other kosong maka akan di lewati.
            } else {

                continue;
            }
        }

    }

}
