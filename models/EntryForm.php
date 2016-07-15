<?php
/**
 * Author: caiyangbo
 * Date: 2016/7/11
 * Time: 17:48
 */

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model{

    public $name;
    public $email;

    public function rules(){

        return [
            [['name','email'],'required'],
            ['email','email'],

        ];

    }

}