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
                        <a class="nav-link" href="{{ route('register') }}">Add Librarian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cds.index') }}">CDs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('journals.index') }}">Journals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('newspapers.index') }}">Newspapers</a>
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
                        <a href="{{ route('cds.create') }}" class="btn btn-md btn-success mb-3">ADD CD</a>
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
                                @forelse ($cds as $cd)
                                <tr>
                                    <td>{{ $cd->title }}</td>
                                    <td>{{ $cd->artist }}</td>
                                    <td>${{ number_format($cd->price, 2) }}</td>
                                    <td>{{ $cd->stock }}</td>
                                    <td class="text-center">
                                        <form id="delete-form-{{ $cd->id }}" action="{{ route('cds.destroy', $cd->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="{{ route('cds.show', $cd->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('cds.edit', $cd->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        <button onclick="confirmDelete({{ $cd->id }})" class="btn btn-sm btn-danger">DELETE</button>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    No CD data available.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $cds->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Display SweetAlert message
        @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "SUCCESS",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "FAILED!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @endif

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

</html>