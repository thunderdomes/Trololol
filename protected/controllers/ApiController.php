<?php

class ApiController extends Controller
{
	public function actionIndex()
	{
		header('Content-Type: application/json');
		
		$criteria = new CDbCriteria();
		
		$count=Post::model()->count($criteria);
		$pages=new CPagination($count);

		// results per page
		$curentPage = @$_GET['page'];
		if($curentPage=='' or $curentPage < 1){
			$curentPage = 0;
		}
		else{
			$curentPage --;
		}
		
		$pages->currentPage=$curentPage ;
		$pages->pageSize=10;
		$pages->applyLimit($criteria);
		$models=Post::model()->findAll($criteria);
		
		echo CJSON::encode($models);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}