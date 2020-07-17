<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foto_pegawai".
 *
 * @property int $pegawai_id
 * @property resource|null $foto_blob
 * @property resource|null $foto_blob_other
 */
class FotoPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foto_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pegawai_id'], 'required'],
            [['pegawai_id'], 'default', 'value' => null],
            [['pegawai_id'], 'integer'],
            [['foto_blob', 'foto_blob_other','foto','foto_other'], 'safe'],
            [['pegawai_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'Pegawai ID',
            'foto_blob' => 'Foto Blob',
            'foto_blob_other' => 'Foto Blob Other',
            'foto'=>'Foto',
            'foto_other'=>'Foto Other',
        ];
    }
}
