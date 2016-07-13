<?php
/**
 * Author: caiyangbo
 * Date: 2016/7/11
 * Time: 18:08
 */

use yii\helpers\Html;
?>

<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>