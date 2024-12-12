<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Book - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Back button with X icon -->
                    <a href="{{ route('books.index') }}" class="btn btn-md btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Books
                    </a>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="POST">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="title" class="font-weight-bold">TITLE</label>
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Enter Book Title" required minlength="5" maxlength="255">

                                <!-- error message for title -->
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="author" class="font-weight-bold">AUTHOR</label>
                                <input type="text" id="author" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" placeholder="Enter Author Name" required minlength="3" maxlength="255">

                                <!-- error message for author -->
                                @error('author')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="publisher" class="font-weight-bold">PUBLISHER</label>
                                <input type="text" id="publisher" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher') }}" placeholder="Enter Publisher Name" required minlength="3" maxlength="255">

                                <!-- error message for publisher -->
                                @error('publisher')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="year" class="font-weight-bold">YEAR</label>
                                <input type="number" id="year" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" placeholder="Enter Year of Publication" required min="1000" max="{{ date('Y') }}">

                                <!-- error message for year -->
                                @error('year')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="type" class="font-weight-bold">TYPE</label>
                                <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>
                                    <option value="book" {{ old('type') === 'book' ? 'selected' : '' }}>Book</option>
                                    <option value="ebook" {{ old('type') === 'ebook' ? 'selected' : '' }}>Ebook</option>
                                </select>

                                <!-- error message for type -->
                                @error('type')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
