<?php
/**
 * @file frontned/controllers/SimpleController.php
 * 
 */
namespace frontend\controllers;
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
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
/**
 * Site controller 
 */
class BookController extends Controller
{
	
	public function actionRegulations()
	{
		return $this->render('regulations');
	}

	public function actionIndex()
	{
		$books = Book::find()
		-> orderBy (['name' => SORT_ASC, 'author' =>
		SORT_ASC,'publishing_house' => SORT_ASC]) 
		-> all();
		return $this->render('index', ['books'=>$books]);
	}

	
	public function actionView($id){
		$book = Book::findOne($id);
		if ($book) {
			return $this->render('view',
			['book' => $book]);
		} else {
			throw new \yii\web\NotFoundHttpException('Книга не найдена');
		}
	}
	
	

}
