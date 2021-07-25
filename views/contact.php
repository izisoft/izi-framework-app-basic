<?php
/**
 * @var $this \izi\base\View
 * @var $model \app\models\ContactForm
 */

use izi\forms\Form;

$this->title = 'Contact';
?>
<h1>Contact</h1>
<?php $form = Form::begin('', 'post')?>
<?php echo $form->field($model, 'subject'); ?>
<?php echo $form->field($model, 'email')->emailField(); ?>
<?php echo $form->textarea($model, 'body')->label("Nội dung liên hệ"); ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end()?>