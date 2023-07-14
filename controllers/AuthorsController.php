<?php

namespace app\controllers;

use app\models\Author;
use app\models\AuthorBook;
use app\models\Book;
use app\models\SearchAuthors;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthorsController implements the CRUD actions for Author model.
 */
class AuthorsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Author models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $authors = Author::find()->all();
        //var_dump($authors);
//        $authors = Author::find()->one()->getAuthorsBooks()->with('book_id')->all();
//        $authors = Author::find()
//            ->innerJoinWith('authors_books')
//            ->innerJoinWith('books')
//            ->all();
//
//        echo '<pre>';
//        var_dump($authors);
//        echo '</pre>';
//        exit;
        $searchModel = new SearchAuthors();
        $dataProvider = $searchModel->search($this->request->queryParams);
//
        return $this->render('index', [
            'authors' => $authors,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
//        return $this->render(
//            'index',
//            [
//                'authors' => $authors
//            ]
//        );
    }

    /**
     * Displays a single Author model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render(
            'view',
            [
                'model' => $this->findModel($id),

            ]
        );
    }

    /**
     * Creates a new Author model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $author = new Author();
        if ($this->request->isPost) {
            if ($author->load($this->request->post()) && $author->save()) {
                if (!empty($this->request->post()['books'])) {
                    foreach ($this->request->post()['books'] as $book) {
                        $authorBook = new AuthorBook();
                        $authorBook->author_id = $author->id;
                        $authorBook->book_id = $book;
                        $authorBook->save();
                    }
                }
                return $this->redirect('/authors');
            }
        } else {
            $author->loadDefaultValues();
        }

        return $this->render(
            'create',
            [
                'model' => $author,
                'list' => (new Book)::find()->asArray()->all(),
                'selectedBookIds' => null
            ]
        );
    }

    /**
     * Updates an existing Author model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $author = $this->findModel($id);

        if ($this->request->isPost && $author->load($this->request->post()) && $author->save()) {
            AuthorBook::deleteAll(['in', 'author_id', $author->id]);
            if (!empty($this->request->post()['books'])) {
                foreach ($this->request->post()['books'] as $book) {
                    $authorBook = new AuthorBook();
                    $authorBook->author_id = $author->id;
                    $authorBook->book_id = $book;
                    $authorBook->save();
                }
            }
            return $this->redirect(['index']);
        }
        $selectedBookIds = [];
        foreach ($author->authorsBooks as $authorsBook) {
            $selectedBookIds[] = (!is_null($authorsBook->book)) ? $authorsBook->book->id : null;
        }
        return $this->render(
            'update',
            [
                'model' => $author,
                'list' => (new Book)::find()->asArray()->all(),
                'selectedBookIds' => $selectedBookIds
            ]
        );
    }

    /**
     * Deletes an existing Author model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Author model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Author the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Author::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
