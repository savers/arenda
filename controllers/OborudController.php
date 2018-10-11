<?php

namespace app\controllers;

use Yii;
use app\models\Oborud;
use app\models\Zal;
use app\models\OborudSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Users;

/**
 * OborudController implements the CRUD actions for Oborud model.
 */
class OborudController extends Controller
{


    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create','delete','update'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create','delete','update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Users::isUserAdmin(Yii::$app->user->identity->login);
                        }
                    ],
                ],
            ],

        ];



    }





    /**
     * Lists all Oborud models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OborudSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Oborud model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Oborud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Oborud();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'zal' => Zal::find()->all()
            ]);
        }
    }

    /**
     * Updates an existing Oborud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'zal' => Zal::find()->all()
            ]);
        }
    }

    /**
     * Deletes an existing Oborud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionLists($id)
    {


        $countPosts = Oborud::find()
            ->where(['id_zal' => $id])
            ->count();

        $posts = Oborud::find()
            ->where(['id_zal' => $id])
            ->orderBy('name_oborud')
            ->all();

        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->name_oborud."'>".$post->name_oborud."</option>";

            }

        }
        else{
            echo "<option>-</option>";
        }

    }

    public function actionListsupd($id, $idst)
    {


        $countPosts = Oborud::find()
            ->where(['id_zal' => $id])
            ->count();

        $posts = Oborud::find()
            ->where(['id_zal' => $id])
            ->orderBy('name_oborud')
            ->all();

        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->name_oborud."'>".$post->name_oborud."</option>";

            }

        }
        else{
            echo "<option>-</option>";
        }

    }


    /**
     * Finds the Oborud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Oborud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Oborud::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
