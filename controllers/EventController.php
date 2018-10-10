<?php

namespace app\controllers;

use app\models\Client;
use app\models\Users;
use Yii;
use app\models\Event;
use app\models\Zal;
use app\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{


    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create','delete','update'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    [
                        'actions' => ['view', 'create','delete','update'],
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $today ='';
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $today);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
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
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'zal'=> Zal::find()->asArray()->orderBy('name_zal')->all(),
                'client'=> Client::find()->asArray()->orderBy('name_client')->all(),
                'users'=> Users::find()->asArray()->where(['status' => 10])->orderBy('username')->all(),
            ]);
        }
    }

    /**
     * Updates an existing Event model.
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

            $tim = $model->time_event;
            $tim1 = explode(" - ", $tim);


            return $this->render('update', [
                'model' => $model,
                'zal'=> Zal::find()->asArray()->all(),
                'client'=> Client::find()->asArray()->orderBy('name_client')->all(),
                'users'=> Users::find()->asArray()->where(['status' => 10])->orderBy('username')->all(),
                'tim1' => $tim1,
                'oborud' => $model->oborud,
            ]);
        }
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    public function actionOtchet()
    {
        $this->layout = false;

        $poisk1 = Yii::$app->request->post('from_date');
        $poisk2 = Yii::$app->request->post('to_date');


        return $this->render('otchet', [
                'model'=> Event::find()->where(['between', 'date_event', $poisk1, $poisk2])
                    ->orderBy('date_event, time_event')
                    ->all(),

            'poisk1' =>$poisk1,
            'poisk2' =>$poisk2,
        ] );


    }





    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
