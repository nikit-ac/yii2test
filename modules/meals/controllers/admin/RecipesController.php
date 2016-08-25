<?php

namespace app\modules\meals\controllers\admin;

use Yii;
use app\modules\meals\models\Ingredients;
use app\modules\meals\models\Recipes;
use app\modules\meals\models\RecipesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecipesController implements the CRUD actions for Recipes model.
 */
class RecipesController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Recipes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecipesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipes model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Recipes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recipes();
        $ingredients = new Ingredients();
        $ingredients_array = $ingredients->selectAll();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->setData(Yii::$app->request->post())) {
                return $this->redirect(['index']);
            } else {
                die('ошибка при сохранении в бд');
            };
        } else {
            return $this->render('create', [
                'model' => $model,
                'ingredients' => $ingredients,
                'ingredients_array' => $ingredients_array
            ]);
        }
    }

    /**
     * Updates an existing Recipes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ingredients = new Ingredients();
        $ingredients_array = $ingredients->selectAll();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->setData(Yii::$app->request->post())) {
                return $this->redirect(['index']);
            }
            else {
                die('ошибка при сохранении в бд');
            };
        } else {
            return $this->render('update', [
                'model' => $model,
                'ingredients' => $ingredients,
                'ingredients_array' => $ingredients_array
            ]);
        }
    }

    /**
     * Deletes an existing Recipes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Recipes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
