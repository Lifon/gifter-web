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

class CustomerController extends \yii\rest\ActiveController {

    public $enableCsrfValidation = false;
    public $modelClass = 'app\models\Customer';

    public function actionGet_all_customer() {
        //echo 'oh no';die;
        //Yii::$app->response->format = yii\web\Response:: FORMAT_JSON;
        $allCustomers = Customer::find()->all();
        if (count($allCustomers) > 0) {
            return array('status' => true, 'data' => $allCustomers);
        } else {
            return array('status' => true, 'data' => 'no');
        }
    }

    public function actionCreate_customer() {
        Yii::$app->response->format = yii\web\Response:: FORMAT_JSON;

        $modelCustomer = new Customer();
        $modelUser = new Users();
        //print_r(Yii::$app->request->post());die;
        //echo Yii::$app->request->post()['password']; die;
        
        
        $modelUser->password = Yii::$app->request->post()['password'];
        $modelUser->username = Yii::$app->request->post()['username'];
        
        if($modelUser->validate())
        {
            $modelUser->save();
        }
        else
        {
            return array('response'=>false, 'message'=>'no user details');
        }
        $modelCustomer->user = $modelUser->id;
        $modelCustomer->load(Yii::$app->request->post(), '');
        //print_r($modelCustomer->attributes);die;
        return $modelCustomer;

        $modelCustomer->save();
        return $modelCustomer;
    }

}
