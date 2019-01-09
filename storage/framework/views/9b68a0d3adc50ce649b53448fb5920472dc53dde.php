<?php $__env->startSection('content'); ?>
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Survey
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('surveys.update', $survey->id)); ?>" method="post">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul class="list-group">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item"><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($survey->name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="users">Select Users</label>
                                <select class="users form-control" name="users[]" multiple="multiple">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e((in_array($user->id,$survey->users()->pluck('id')->toArray())) ? 'selected' : ''); ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="put">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.users').select2();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>