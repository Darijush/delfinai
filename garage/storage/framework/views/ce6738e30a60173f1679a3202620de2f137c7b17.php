    <div class="container text-center" id="breakdown">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Register new breakdown</h2>
                    </div>
                    <div class="card-body">
                        <select data-create class="form-select mb-3" name="mechanic_id">
                            <option value="0">Choose mechanic</option>
                            <?php $__currentLoopData = $mechanics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mechanic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($mechanic->id); ?>">
                                    <?php echo e($mechanic->name); ?> <?php echo e($mechanic->surname); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="trucks-list"></div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Title</span>
                                <input data-create class="form-control" name="title">
                            </div>
                            <select data-create class="form-select mb-3" name="status">
                                <option value="0">Status</option>
                                <option value="1">Created</option>
                                <option value="2">In progress</option>
                                <option value="3">Completed nicely!!!</option>
                            </select>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Notes</span>
                                <textarea data-create class="form-control" name="notes"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Price</span>
                                <input data-create class="form-control" name="price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Discount</span>
                                <input data-create class="form-control" name="discount">
                            </div>



                        <button data-submit type="button" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\delfinai\garage\resources\views/breakdown/create.blade.php ENDPATH**/ ?>