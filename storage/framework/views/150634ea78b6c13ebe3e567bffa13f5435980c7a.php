

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Authors
            <a href="<?php echo e(route('authors.create')); ?>" class="btn btn-success btn-sm float-end">Add New</a>
        </div>

        <?php if(Session::has('fail')): ?>
        <div class="alert alert-danger p-2"><?php echo e(Session::get('fail')); ?></div>
        <?php endif; ?>

        <?php if(Session::has('success')): ?>
        <div class="alert alert-success p-2"><?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Registration Date</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($author->name); ?></td>
                        <td><?php echo e($author->created_at->format('d-m-Y')); ?></td>
                        <td><?php echo e($author->updated_at->format('d-m-Y')); ?></td>
                        <td>
                            <a href="<?php echo e(route('authors.edit', $author->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <form action="<?php echo e(route('authors.destroy', $author->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5">No Authors Found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to remove this author?");
    }
</script>
<?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Documents\Laravel\library app\resources\views/authors/index.blade.php ENDPATH**/ ?>