<?php
/**
 * @file frontned/controllers/SimpleController.php
 * 
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use \common\models\Book;
use \common\models\Client;
use \common\models\Issuing_books;
use yii\bootstrap\ActiveForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use backend\models\SignupForm;
use backend\models\ContactForm;
/**
 * Site controller 
 */
class BookController extends Controller
{
			
	public function actionIndex()
	{
		$books = Book::find()
		-> orderBy (['name' => SORT_ASC, 'author' =>
		SORT_ASC,'publishing_house' => SORT_ASC]) 
		-> all();
		return $this->render('index', ['books'=>$books]);
	}

		
	public function actionAdd()
	{
		$book= new Book;
		$book->status=1;
		if (isset($_POST['Book'])){
			$book->attributes=$_POST['Book'];
			if ($book->save()){
				return $this -> redirect(['book/index']);
			}
		}	
		return $this -> render('add', ['book'=> $book]);	
	}
	
	public function actionEdit($id)
	{
		$book = Book::findOne($id);
		if (!$book) {
			throw new \yii\web\NotFoundHttpException('Книга не найдена');
		}
		if (isset($_POST['Book'])){
			$book->attributes=$_POST['Book'];
			if ($book->save()){
				return $this -> redirect(['book/index']);
			}
		}
		return $this -> render('edit', ['book'=> $book]);	
	}
	
	public function actionView($id)
	{
		$book = Book::findOne($id);
		if ($book) {
			return $this->render('view',
			['book' => $book]);
		} else {
			throw new \yii\web\NotFoundHttpException('Книга не найдена');
		}
	}
	
	public function actionDelete($id)
	{
		$book = Book::findOne($id);
		if (!$book) {
			return 'Книга не найдена';
		}
		$book->delete();
		return $this -> redirect(['book/index']);
	}
	
	public function actionIndex2()
	{
		$client = Client::find()
		-> having ('status=1')
		-> orderBy ([ 'first_name' =>
		SORT_ASC,'last_name' => SORT_ASC,'patronymic' => SORT_ASC,'address' => SORT_ASC]) 
		-> all();  
		return $this->render('index2', ['client'=>$client]);
	}	
	
	public function actionAdd2()
	{
		$client= new Client;
		if (isset($_POST['Client'])){
			$client->attributes=$_POST['Client'];
			if ($client->save()){
				return $this -> redirect(['book/add3']);
			}
		}
		return $this -> render('add2', ['client'=> $client]);	
	}
	
	public function actionEdit2($id)
	{
		$client= Client::findOne($id);
		if (!$client) {
			throw new \yii\web\NotFoundHttpException('Читатель не найден');
		}
		if (isset($_POST['Client'])){
			$client->attributes=$_POST['Client'];
			if ($client->save()){
				return $this -> redirect(['book/index2']);
			}
		}
		return $this -> render('edit2', ['client'=> $client]);	
	}
	
	public function actionDelete2($id)
	{
		$client = Client::findOne($id);
		if (!$client) {
			return 'Книга не найдена';
		}
		$client->delete();
		return $this -> redirect(['book/index2']);
	}
			
	public function actionIndex3()
	{
		$issuing_books = Issuing_books::find()
		-> orderBy (['id_client' => SORT_ASC, 'id_book' =>
		SORT_ASC,'date_issuing' => SORT_ASC,'return_date' => SORT_ASC,'the_actual_date_of_return' => SORT_ASC]) 
		-> all();
		return $this->render('index3', ['issuing_books'=>$issuing_books]);
	}	
	

	public function actionAdd3($book=null,$client=null)
	{
		$issuing_books= new Issuing_books;
		$issuing_books->id_book=$book;
		$issuing_books->id_client=$client;
		$book = Book::find()->having('status = 1')->all();
		$client = client::find()->having('status = 1')->all();
		if (isset($_POST['Issuing_books'])){
			$issuing_books->attributes=$_POST['Issuing_books'];
			if ($issuing_books->save()){
				$book=$issuing_books->getIdBook()->one();
				$book->status=0;
				$book->save();
				return $this -> redirect(['book/index3']);
			}
		}
		return $this -> render('add3', ['issuing_books'=>$issuing_books ,'book'=>$book,'client'=>$client]);	
	}
	
	
	public function actionEdit3($id)
	{
		$issuing_books = issuing_books::findOne($id);
		if (!$issuing_books) {
			throw new \yii\web\NotFoundHttpException('Выдача не найдена');
		}
		$client = Client::find()->all();
		$book = Book::find()->all();
		if (isset($_POST['Issuing_books'])){
			$issuing_books->attributes=$_POST['Issuing_books'];
			if ($issuing_books->save()){
				$book=$issuing_books->getIdBook()->one();
				$book->status=1;
				$book->save();
				return $this -> redirect(['book/index3']);
			}
		}
		return $this -> render('edit3', ['issuing_books'=> $issuing_books , 'book'=> $book,'client'=>$client]);	
	}
	
	
	public function actionEdit4($id)
	{
		$issuing_books = issuing_books::findOne($id);
		if (!$issuing_books) {
			throw new \yii\web\NotFoundHttpException('Выдача не найдена');
		}
		$client = Client::find()->all();
		$book = Book::find()->all();
		if (isset($_POST['Issuing_books'])){
			$issuing_books->attributes=$_POST['Issuing_books'];
			if ($issuing_books->save()){
				if($issuing_books->return_date){
					$book=$issuing_books->getIdBook()->one();
					$book->status=1;
					$book->save();
					return $this -> redirect(['book/index3']);
				}
			}
		}
		return $this -> render('edit4', ['issuing_books'=> $issuing_books , 'book'=> $book,'client'=>$client]);	
	}
	
	 public function behaviors()
     {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }	
	
}