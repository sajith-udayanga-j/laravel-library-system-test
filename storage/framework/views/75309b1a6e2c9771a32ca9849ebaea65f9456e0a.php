

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Books
            <a href="<?php echo e(route('books.create')); ?>" class="btn btn-success btn-sm float-end">Add New</a>
        </div>

        <?php if(Session::has('success')): ?>
        <span class="alert alert-success p-2"><?php echo e(Session::get('success')); ?></span>
        <?php endif; ?>

        <?php if(Session::has('fail')): ?>
        <span class="alert alert-danger p-2"><?php echo e(Session::get('fail')); ?></span>
        <?php endif; ?>

        <div class="card-body">

        <form action="<?php echo e(route('books.index')); ?>" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="author_id" class="form-select" aria-label="Filter by Author">
                            <option value="">Select Author</option>
                            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($author->id); ?>" <?php echo e(request('author_id') == $author->id ? 'selected' : ''); ?>>
                                <?php echo e($author->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
            
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Registration Date</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($book->title); ?></td>
                        <td><?php echo e($book->author->name); ?></td>
                        <td><?php echo e($book->created_at->format('d-m-Y')); ?></td>
                        <td><?php echo e($book->updated_at->format('d-m-Y')); ?></td>
                        <td>
                            <a href="<?php echo e(route('books.edit', $book->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <form action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6">No Books Found</td>
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
        return confirm("Are you sure you want to delete this book?");
    }
</script>

<?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Documents\Laravel\library app\resources\views/books/index.blade.php ENDPATH**/ ?>