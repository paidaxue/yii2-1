<?php
/**
 * Author: caiyangbo
 * Date:2016年7月14日
 * Time:上午11:15:09
 */

namespace app\controllers;
use yii\web\Controller;


class TestController extends Controller
{
    
    /**
     * http://yii2.com/index.php?r=test/index
     */
    public function actionIndex(){
        
        /**
         * 可以通过如下表达式访问在/config/web.php中注册的应用组件
         * \Yii::$app->componentID
         * 例如:\Yii::$app->components            \Yii::$app->db      
         * @var unknown
         */
        $db = \Yii::$app->components;
        print_r($db);
    }
    
}