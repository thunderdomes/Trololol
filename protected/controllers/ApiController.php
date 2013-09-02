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
		
		$ret = array();
		foreach($models as $key=>$model){

			$ret[$key] = (array)$model->attributes;
			$ret[$key]['image_url'] = 'a';
		}
		echo CJSON::encode($ret);
	}

	public function actionNew(){
	//	header('Content-Type: application/json');

		if(isset($_POST) and !empty($_POST)){	
			
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$image = new ImageUpload;
				$image->uploaded = CUploadedFile::getInstanceByName('uploaded');
				if(!$image->validate()){
					throw new CException("File Yang Anda Upload Tidak valid");
				}
				

				$post = new Post();
				$post->attributes = @$_POST;
				if(!$post->save()){		
					throw new CException("Parameter Post Tidak Valid");
				}

				$model = Yii::app()->image->save($image->uploaded);
				if(!$model){
					throw new CException("Post Tidak Valid");
				}
				$post->image_id = $model->id;
				$post->save();

				$transaction->commit();
				echo CJSON::encode(array('status'=>1));
				
			}
		}
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