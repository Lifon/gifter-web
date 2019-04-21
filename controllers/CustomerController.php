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

    private function createUser($pass, $user) {
        $modelUser = new Users();
        $modelUser->password = $pass;
        Yii::$app->request->post()['password'];
        $modelUser->username = $user;
        ;
        $modelUser->privilege = 0;

        if ($modelUser->validate()) {
            $modelUser->save();
            return $modelUser->id;
        } else {
            return false;
        }
    }

    public function actionLogin($user, $pass) {
        $user = Users::findOne("username = " . $user . " and password = " . $pass);
        if (isset($user)) {
            return array('response' => TRUE, 'message' => 'Right User name and pass');
        } else {
            return array('response' => FALSE, 'message' => 'Wrong User name and pass');

        }
    }

    public function actionCreate_customer() {
        Yii::$app->response->format = yii\web\Response:: FORMAT_JSON;

        $modelCustomer = new Customer();

        //print_r(Yii::$app->request->post());die;
        //echo Yii::$app->request->post()['password']; die;
        $user_id = $this->createUser(Yii::$app->request->post()['password'], Yii::$app->request->post()['username']);
        if ($user_id) {
            $modelCustomer->user_id = $user_id;
            $modelCustomer->load(Yii::$app->request->post(), '');
            if ($modelCustomer->validate()) {
                $modelCustomer->save();

                return $modelCustomer;
            } else {
                return array('response' => false, 'message' => 'Wrong account info');
            }
        } else {
            return array('response' => false, 'message' => 'no user details');
        }
    }

}
