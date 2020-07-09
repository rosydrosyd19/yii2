<?php

namespace app\components;

use Yii;

/**
 * This is the model class for table "foto_pegawai".
 *
 * @property int $pegawai_id
 * @property resource|null $foto_blob
 * @property resource|null $foto_blob_other
 */
class helper
{
    public static function showImage($data=null)
    {
        if ($data) {
            header("Content-type: image/jpeg");
            echo base64_decode($data);
            return base64_decode($data);
            // print_r(base64_decode($data));
            exit;
        }
        return false;
    }
}