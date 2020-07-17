<?php

namespace app\controllers;

use Yii;
use app\models\FotoPegawai;
use app\models\FotoPegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\components\helper;

/**
 * FotoPegawaiController implements the CRUD actions for FotoPegawai model.
 */
class FotoPegawaiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionDownload()
    {
        helper::simpanFile();
        // return file_put_contents('../images/pegawai/coba.jpg',file_get_contents('http://static.adzerk.net/Advertisers/12f0cc69cd9742faa9c8ee0f7b0d210e.jpg'));

        // $model= FotoPegawai::find()->all();
        // print_r($model);
        // $this->render('index',['model'=> $model]);
        // return $model;
    }

    public function actionUpload()
    {
        $model = new Item();
      if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file=file_get_contents($model->file->tempName);
            $model->save();

        }
        return $this->render('upload', [
                'model' => $model,
            ]);
    }

    /**
     * Lists all FotoPegawai models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new FotoPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // exit;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FotoPegawai model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FotoPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FotoPegawai();

        if ($model->load(Yii::$app->request->post())&& $model->save()) {

            return $this->redirect(['view', 'id' => $model->pegawai_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FotoPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pegawai_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FotoPegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FotoPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FotoPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FotoPegawai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
