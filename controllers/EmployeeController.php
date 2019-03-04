<?php

namespace app\controllers;

class EmployeeController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCreateEmployee() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $employee = new \app\models\Employee();
        $employee->scenario = \app\models\Employee::SCENARIO_CREATE;
        $employee->attributes = \Yii::$app->request->post();
        //print_r($_POST);die;

        if ($employee->validate()) {
            $employee->save();
            return array('status' => true, 'data' => 'Employee record is successfully updated');
        } else {
            return array('status' => false, 'data' => $employee->getErrors());
        }
    }
    
    public function actionGetEmployee() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $employee = \app\models\Employee::find()->all();
        return array('status' => true, 'data' => $employee);
        
    }

}
