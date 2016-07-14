<?php
/**
 * Author: caiyangbo
 * Date:2016年7月14日
 * Time:上午11:15:09
 */

namespace app\controllers;
use yii\web\Controller;
use app\models\ContactForm;


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
    
    /**
     * 
     * http://yii2.com/index.php?r=test/test-model
     */
    public function actionTestModel(){
        
        $model = new \app\models\ContactForm;
        
        // 像访问数组单元项一样访问属性
        $model['name'] = 'example';
        //像访问一个对象属性一样访问模型的属性
        $model->email = '18216575@qq.com';
        
        echo $model['name'];
        echo $model['email'];
        
        // 迭代器遍历模型
        foreach ($model as $name => $value) {
            echo "$name: $value\n";
        }
        
        echo "\t\n<br>";
        
        //可以调用 yii\base\Model::getAttributeLabel() 获取属性的标签
        //如果你不想用自动生成的标签， 可以覆盖 yii\base\Model::attributeLabels() 方法明确指定属性标签
        //显示为"名字"  
        echo $model->getAttributeLabel('name');     
        
        
        //字段是模型通过调用yii\base\Model::toArray() 生成的数组的单元名
        echo "\t\n<br>";
        $array = $model->toArray();
        //print_r($array);
        /* Array
        (
            [name] => example
            [email] => 18216575@qq.com
            [subject] =>
            [body] =>
            [verifyCode] =>
        ) */
        
    }
    
}