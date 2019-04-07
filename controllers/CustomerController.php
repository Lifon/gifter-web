<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of CustomerController
 *
 * @author Numan
 */
use Yii;
use app\models\Customer;
use app\models\Users;
class CustomerController  extends \yii\rest\ActiveController{
    
    
    public $enableCsrfValidation = false;
    public $modelClass = 'app\models\Customer';
    
    public function actionGet_all_customer() {
        //echo 'oh no';die;
        
        //Yii::$app->response->format = yii\web\Response:: FORMAT_JSON;
        $allCustomers = Customer::find()->all();
        if(count($allCustomers)>0)
        {
            return array('status'=>true, 'data'=>$allCustomers);
        }
        else
        {
            return array('status'=>true, 'data'=>'no');
        }
    }
    
    public function actionCreate_customer() {
        Yii::$app->response->format = yii\web\Response:: FORMAT_JSON;
       // Yii::$app->request->
        $modelCustomer = new Customer();
        $modelUser = new Users();
        //print_r($_POST);die;
       //print_r(Yii::$app->request->post());die;
       // $data = Yii::$app->getRequest()->getBodyParams();
        // print_r($data);die;
        //$modelCustomer->gender = $data['gender'];
       $modelCustomer->load(Yii::$app->request->post(),'');
        //echo $modelCustomer->gender;die;
        $modelCustomer->save();
        return $modelCustomer;
        //print_r(Yii::$app->request->post());die;
        //if()
        
    }
    
}
