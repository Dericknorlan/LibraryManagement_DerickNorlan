<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Journal - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adding Font Awesome for the icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Back button with X icon -->
                    <a href="<?php echo e(route('journals.index')); ?>" class="btn btn-md btn-secondary">
                        <i></i> Back to Journals
                    </a>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- Journal Title -->
                        <h3><?php echo e($journal->title); ?></h3>
                        <hr />

                        <!-- Journal Author -->
                        <p><strong>Author:</strong> <?php echo e($journal->author); ?></p>

                        <!-- Journal Publisher -->
                        <p><strong>Publish Date:</strong> <?php echo e($journal->publish_date); ?></p>

                        <!-- Journal Abstract -->
                        <p><strong>Abstract:</strong> <?php echo e($journal->abstract); ?></p>
                        <!-- Additional Buttons -->
                        <div class="mt-4">
                            <a href="<?php echo e(route('journals.edit', $journal->id)); ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button onclick="confirmDelete(<?php echo e($journal->id); ?>)" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            <form id="delete-form-<?php echo e($journal->id); ?>" action="<?php echo e(route('journals.destroy', $journal->id)); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH D:\xampp\htdocs\LibraryManagement_DerickNorlan\LibraryManagement\resources\views/journals/show.blade.php ENDPATH**/ ?>