<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adding Font Awesome for the icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Back button with X icon -->
                    <a href="{{ route('books.index') }}" class="btn btn-md btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Books
                    </a>
                </div>
                <div class="card border-0 shadow-sm rounded mt-3">
                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title', $book->title) }}" placeholder="Enter Book Title">

                                <!-- error message for title -->
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Author -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">AUTHOR</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                                    value="{{ old('author', $book->author) }}" placeholder="Enter Author's Name">

                                <!-- error message for author -->
                                @error('author')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Publisher -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PUBLISHER</label>
                                <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher"
                                    value="{{ old('publisher', $book->publisher) }}" placeholder="Enter Publisher Name">

                                <!-- error message for publisher -->
                                @error('publisher')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Year -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">YEAR</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror" name="year"
                                    value="{{ old('year', $book->year) }}" placeholder="Enter Year of Publication">

                                <!-- error message for year -->
                                @error('year')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Type -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TYPE</label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type">
                                    <option value="book" {{ old('type', $book->type) === 'book' ? 'selected' : '' }}>Book</option>
                                    <option value="ebook" {{ old('type', $book->type) === 'ebook' ? 'selected' : '' }}>E-Book</option>
                                </select>

                                <!-- error message for type -->
                                @error('type')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Submit and Reset Buttons -->
                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
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
