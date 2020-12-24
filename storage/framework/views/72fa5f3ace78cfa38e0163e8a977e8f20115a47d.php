<?php $__env->startSection('nav'); ?>
    <li>
        <a class="btn logNav" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registar')); ?></a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container cont-log">
    <div class="row justify-content-center box-log">
        <div class="col-md-10">
            <div class="row" style="justify-content: center; text-align: center">
                <div class="text-header"><?php echo e(__('Bem vindo ao SCMed')); ?></div>
                <br>
                <br>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> formInput" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Endereço de Email" autofocus>

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
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> formInput" name="password" placeholder="Password" required autocomplete="current-password">

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

                        <div class="form-group row" style="align-items: center">
                            <div class="col-md-6" style="text-align: left">
                                <div class="form-check">
                                    <label class="form-check-label formLabel" for="remember">
                                        <?php echo e(__('Guardar Dados')); ?>

                                    </label>

                                    <input class="form-check-input checkbox-round" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                </div>
                            </div>

                            <div class="col-md-6" style="text-align: right">
                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link linkForm" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Esqueceu-se da sua password?')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn submitInput">
                                    <?php echo e(__('Entrar')); ?>

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

<?php echo $__env->make('layouts.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\spaghetti-code\resources\views/auth/login.blade.php ENDPATH**/ ?>