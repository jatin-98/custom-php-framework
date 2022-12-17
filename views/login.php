<?php $this->title = 'Login'; ?>
<h1>LOGIN FORM</h1>
<?php $form =  App\Core\Form\Form::begin("", "post") ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>

<div class="form-group mt-4">
    <button class="btn btn-primary" type="submit">Submit</button>
</div>

<?php App\Core\Form\Form::end() ?>