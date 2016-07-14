<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    //定义属性
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * 验证规则
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * 如果你不想用自动生成的标签， 可以覆盖 yii\base\Model::attributeLabels() 方法明确指定属性标签
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name'      =>'名字',
            'email'     =>'邮箱',
            'subject'   =>'项目',
            'body'      =>'内容',
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        } else {
            return false;
        }
    }
}
