<?php

class RabbitsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','work','other','archive','create','update','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'data'=>$this->loadModel($id),
            'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Rabbits;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rabbits']))
		{
			$model->attributes=$_POST['Rabbits'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idr));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rabbits']))
		{
			$model->attributes=$_POST['Rabbits'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idr));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$this->actionWork();
/*		$dataProvider=new CActiveDataProvider('Rabbits');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
*/	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rabbits('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rabbits']))
			$model->attributes=$_GET['Rabbits'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionWork()
    {
        $model=new Rabbits('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Rabbits']))
            $model->attributes=$_GET['Rabbits'];
        $dataProvider=Rabbits::model()->findAll('ids=:ids AND ida<:ida', array(
                ':ids'=>3,
                ':ida'=>0
            )
        );
        $this->render('work',array(
            'dataProvider'=>$dataProvider,
            'model'=>$model,
        ));


    }

    public function actionOther()
    {
        $model=new Rabbits('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Rabbits']))
            $model->attributes=$_GET['Rabbits'];
        $dataProvider=Rabbits::model()->findAll('ids<>:ids1 AND ids<>:ids2 AND ida<:ida', array(
                ':ids1'=>2,
                ':ids2'=>3,
                ':ida'=>1
            )
        );
        $this->render('other',array(
            'dataProvider'=>$dataProvider,
            'model'=>$model,
        ));


    }

    public function actionArchive()
    {
        $model=new Rabbits('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Rabbits']))
            $model->attributes=$_GET['Rabbits'];
        $dataProvider=Rabbits::model()->findAll('ida>:ida', array(
                ':ida'=>0
            )
        );
        $this->render('archive',array(
            'dataProvider'=>$dataProvider,
            'model'=>$model,
        ));


    }


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rabbits the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rabbits::model()->findByPk($id);
        $date1 = new DateTime();
        $date2 = new DateTime($model->date_r);
        $date3= $date1->diff($date2);
        if ($date3->y > 0) {
            $model->vozrast = $date3->y . ' г ' . $date3->m . ' м ' . $date3->d  . ' д ';
        } else {
            $model->vozrast = $date3->m . ' м ' . $date3->d  . ' д ';
        }
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}



	/**
	 * Performs the AJAX validation.
	 * @param Rabbits $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rabbits-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
