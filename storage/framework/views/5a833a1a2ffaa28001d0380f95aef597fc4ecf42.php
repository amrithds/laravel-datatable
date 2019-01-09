<?php $__env->startSection('content'); ?>
    <table class="table table-bordered" id="users-table" width="100%">
        <thead>
        <tr>
            <th class="min-tablet">Id</th>
            <th class="all">Name</th>
            <th class="all">Email</th>
            <th class="min-desktop">Created At</th>
            <th class="desktop">Updated At</th>
        </tr>
        </thead>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(function() {
            var table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '<?php echo route('users.data'); ?>',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>