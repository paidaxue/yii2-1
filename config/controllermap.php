<?php
/**
 * Author: caiyangbo
 * Date:2016年7月14日
 * Time:上午11:55:18
 */

return [

        // 用类名申明 "account" 控制器
        'account' => 'app\controllers\UserController',

        // 用配置数组申明 "article" 控制器
        'article' => [
            'class' => 'app\controllers\PostController',
            'enableCsrfValidation' => false,
        ],

];