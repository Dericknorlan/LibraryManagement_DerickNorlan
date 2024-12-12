<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Book - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adding Font Awesome for the icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Back button with an icon -->
                    <a href="<?php echo e(route('books.index')); ?>" class="btn btn-md btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Books
                    </a>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- Book Title -->
                        <h3><?php echo e($book->title); ?></h3>
                        <hr />

                        <!-- Book Details -->
                        <p><strong>Author:</strong> <?php echo e($book->author); ?></p>
                        <p><strong>Publisher:</strong> <?php echo e($book->publisher); ?></p>
                        <p><strong>Year:</strong> <?php echo e($book->year); ?></p>
                        <p><strong>Type:</strong> <?php echo e(ucfirst($book->type)); ?></p> <!-- Capitalize the first letter -->

                        <!-- Additional Buttons -->
                        <div class="mt-4">
                            <a href="<?php echo e(route('books.edit', $book->id)); ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button onclick="confirmDelete(<?php echo e($book->id); ?>)" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            <form id="delete-form-<?php echo e($book->id); ?>" action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST" style="display: none;">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Function to confirm delete
        function confirmDelete(bookId) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data buku ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    document.getElementById('delete-form-' + bookId).submit();
                }
            });
        }
    </script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\LibraryManagement_DerickNorlan\LibraryManagement\resources\views/books/show.blade.php ENDPATH**/ ?>