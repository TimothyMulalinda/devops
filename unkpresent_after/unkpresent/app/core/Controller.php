<?php
	// Create a class
	class Controller{
		// PHP Constructor
		public function __construct(){
			echo "Object is created.";
		}

		// display method and send any data
		public function display($view, $data=[]){

			require_once "../view".$view.".php";
			
		}

		// core logic model method
		public function logic($model){
			require_once "../model".$model.".php";
			$obj_model = new $model;
			return $obj_model;
		}

	}
?>