<?php

namespace frontend\controllers;

use Yii;
use common\models\Country;
use common\models\CountryQuery;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
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

    /**
     * Lists all Country models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Country();
        $searchModel = new CountryQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (1==1){ //Yii::$app->user->isGuest
            return $this->goHome();
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageFile->saveAs('uploads/'.$model->name.'.'.$model->imageFile->extension);
            $model->photo = $model->name.'.'.$model->imageFile->extension;
            $model->user_id = Yii::$app->user->id;
            if ($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success', "Country created successfully.");
                return $this->redirect(['index']);
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Country model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $child = $this->findModel($id)->getCountries()->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'child' => $child,
        ]);
    }

    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageFile->saveAs('uploads/'.$model->name.'.'.$model->imageFile->extension);
            $model->photo = $model->name.'.'.$model->imageFile->extension;
            $model->user_id = Yii::$app->user->id;
            if ($model->validate() && $model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageFile->saveAs('uploads/'.$model->name.'.'.$model->imageFile->extension);
            $model->photo = $model->name.'.'.$model->imageFile->extension;
            $model->user_id = Yii::$app->user->id;
            if ($model->validate() && $model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Country model.
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
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
