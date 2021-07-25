<?php
/**
 * @var $model \app\models\User
 */

use izi\forms\Form;

?>
    <h1>Login</h1>
<?php
$form = Form::begin('', 'post');
echo $form->field($model, 'email')->emailField();
echo $form->field($model, 'password')->passwordField();
?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php
Form::end();
?>