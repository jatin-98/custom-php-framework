<?php $this->title = 'Register'; ?>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <?php $form =  App\Core\Form\Form::begin("", "post") ?>
        <div class="form-group mb-3">
            <?php echo $form->field($model, 'name') ?>
        </div>
        <div class="form-group mb-3">
            <?php echo $form->field($model, 'email') ?>
        </div>
        <div class="form-group mb-3">
            <?php echo $form->field($model, 'password')->passwordField() ?>
        </div>
        <div class="form-group mb-3">
            <?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>
        </div>
        <div class="form-group mt-4">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        <?php App\Core\Form\Form::end() ?>
        
        <p class="mb-0">
            <a href="/login" class="text-center">I already have a membership</a>
        </p>
    </div>
</div>