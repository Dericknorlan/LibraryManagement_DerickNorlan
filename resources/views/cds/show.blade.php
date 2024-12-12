<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show CD - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adding Font Awesome for the icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Back button with X icon -->
                    <a href="{{ route('cds.index') }}" class="btn btn-md btn-secondary">
                        <i></i> Back to CD
                    </a>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- CD Title -->
                        <h3 class=" mb-4">{{ $cd->title }}</h3>
                        <hr />

                        <!-- CD Artist -->
                        <p><strong>Artist:</strong> {{ $cd->artist }}</p>

                        <!-- CD Price -->
                        <p><strong>Price:</strong> ${{ number_format($cd->price, 2) }}</p>

                        <!-- CD Stock -->
                        <p><strong>Stock Available:</strong> {{ $cd->stock }}</p>
                        <!-- Additional Buttons -->
                        <div class="mt-4">
                            <a href="{{ route('cds.edit', $cd->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button onclick="confirmDelete({{ $cd->id }})" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            <form id="delete-form-{{ $cd->id }}" action="{{ route('cds.destroy', $cd->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>