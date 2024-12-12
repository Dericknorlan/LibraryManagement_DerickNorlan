<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Collection - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SantriKoding</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Add Librarian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('books.index')); ?>">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cds.index')); ?>">CDs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('journals.index')); ?>">Journals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('newspapers.index')); ?>">Newspapers</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">CD Collection</h3>
                    <h5 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="<?php echo e(route('cds.create')); ?>" class="btn btn-md btn-success mb-3">ADD CD</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">ARTIST</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $cds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($cd->title); ?></td>
                                    <td><?php echo e($cd->artist); ?></td>
                                    <td>$<?php echo e(number_format($cd->price, 2)); ?></td>
                                    <td><?php echo e($cd->stock); ?></td>
                                    <td class="text-center">
                                        <form id="delete-form-<?php echo e($cd->id); ?>" action="<?php echo e(route('cds.destroy', $cd->id)); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                        <a href="<?php echo e(route('cds.show', $cd->id)); ?>" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="<?php echo e(route('cds.edit', $cd->id)); ?>" class="btn btn-sm btn-primary">EDIT</a>
                                        <button onclick="confirmDelete(<?php echo e($cd->id); ?>)" class="btn btn-sm btn-danger">DELETE</button>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="alert alert-danger">
                                    No CD data available.
                                </div>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo e($cds->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Display SweetAlert message
        <?php if(session('success')): ?>
        Swal.fire({
            icon: "success",
            title: "SUCCESS",
            text: "<?php echo e(session('success')); ?>",
            showConfirmButton: false,
            timer: 2000
        });
        <?php elseif(session('error')): ?>
        Swal.fire({
            icon: "error",
            title: "FAILED!",
            text: "<?php echo e(session('error')); ?>",
            showConfirmButton: false,
            timer: 2000
        });
        <?php endif; ?>

        // Function to confirm delete
        function confirmDelete(cdId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This CD will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    document.getElementById('delete-form-' + cdId).submit();
                }
            });
        }
    </script>
</body>

</html><?php /**PATH D:\xampp\htdocs\LibraryManagement_DerickNorlan\LibraryManagement\resources\views/cds/index.blade.php ENDPATH**/ ?>