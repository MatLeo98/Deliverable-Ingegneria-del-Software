<?php $__env->startSection('content'); ?>
<html>
<body onload="offerente()">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Register')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

<input type="radio" onclick="offerente()" name="flag" value="0"checked> Offerer<br>
<input type="radio" onclick="richiedente()" name="flag" value="1"> Job seeker<br>

<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cognome" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Surname')); ?></label>
                            <div class="col-md-6">
                                <input id="cognome" type="text" class="form-control" name="cognome" value="<?php echo e(old('cognome')); ?>" required autocomplete="cognome" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eta" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Age')); ?></label>
                            <div class="col-md-6">
                                <input id="eta" type="text" class="form-control" name="eta" value="<?php echo e(old('eta')); ?>" required autocomplete="eta" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="indirizzo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Address')); ?></label>
                            <div class="col-md-6">
                                <input id="indirizzo" type="text" class="form-control" name="indirizzo" value="<?php echo e(old('indirizzo')); ?>" required autocomplete="indirizzo" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recapito" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Phone')); ?></label>
                            <div class="col-md-6">
                                <input id="recapito" type="text" class="form-control" name="recapito" value="<?php echo e(old('recapito')); ?>" required autocomplete="recapito" autofocus>
                            </div>
                        </div>
                        <div id="DIV">
                        <div class="form-group row">
                            <label for="ragionesociale" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Business name')); ?></label>
                            <div class="col-md-6">
                                <input id="ragionesociale" type="text" class="form-control" name="ragionesociale" value="<?php echo e(old('ragionesociale')); ?>"  autocomplete="ragionesociale" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sede" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Sede')); ?></label>
                            <div class="col-md-6">
                                <input id="sede" type="text" class="form-control" name="sede" value="<?php echo e(old('sede')); ?>"  autocomplete="sede" autofocus>
                            </div>
                        </div>
                        </div>
                        <div id="myDIV">
                        <div class="form-group row">
                            <label for="titolodistudio" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Educational qualification')); ?></label>
                            <div class="col-md-6">
                                <input id="titolodistudio" type="text" class="form-control" name="titolodistudio" value="<?php echo e(old('titolodistudio')); ?>"  autocomplete="titolodistudio" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="corsodistudi" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Study course')); ?></label>
                            <div class="col-md-6">
                                <input id="corsodistudi" type="text" class="form-control" name="corsodistudi" value="<?php echo e(old('corsodistudi')); ?>"  autocomplete="corsodistudi" autofocus>
                            </div>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<script>
function offerente() {
  var x = document.getElementById("myDIV");
  var y = document.getElementById("DIV");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";

  }
}

function richiedente() {
  var x = document.getElementById("DIV");
  var y = document.getElementById("myDIV");

  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";

  }
}
</script>
</body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prova\resources\views/auth/register.blade.php ENDPATH**/ ?>