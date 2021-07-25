<?php
/**
 * @var $model \app\models\User
 */

use izi\forms\Form;

?>
<h1>Register an account</h1>
<?php
$form = Form::begin('', 'post');
?>
<div class="row">
    <div class="col">
        <?php
        echo $form->field($model, 'firstname');
        ?>
    </div>
    <div class="col">
        <?php
        echo $form->field($model, 'lastname');
        ?>
    </div>
</div>
<?php
echo $form->field($model, 'email')->emailField();
echo $form->field($model, 'password')->passwordField();
echo $form->field($model, 'confirmPassword')->passwordField();
?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php
Form::end();
?>