<?php $this->title = 'Register'; ?>
<h1>REGISTER FORM</h1>
<?php $form =  App\Core\Form\Form::begin("", "post") ?>

<?php echo $form->field($model, 'name') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>

<div class="form-group mt-4">
    <button class="btn btn-primary" type="submit">Submit</button>
</div>

<?php App\Core\Form\Form::end() ?>