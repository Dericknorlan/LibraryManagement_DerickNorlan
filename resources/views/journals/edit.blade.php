<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Journal - SantriKoding.com</title>
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
                    <a href="{{ route('journals.index') }}" class="btn btn-md btn-secondary">
                        <i></i> Back to Journals
                    </a>
                </div>
                <div class="card border-0 shadow-sm rounded mt-3">
                    <div class="card-body">
                        <form action="{{ route('journals.update', $journal->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title', $journal->title) }}" placeholder="Enter Journal Title">

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
                                    value="{{ old('author', $journal->author) }}" placeholder="Enter Author's Name">

                                <!-- error message for author -->
                                @error('author')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Publisher -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PUBLISH DATE</label>
                                <input type="date" class="form-control @error('publish_date') is-invalid @enderror" name="publish_date"
                                    value="{{ old('publish_date', $journal->publish_date) }}">

                                <!-- error message for publisher -->
                                @error('publish_date')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Abstract -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">ABSTRACT</label>
                                <textarea class="form-control @error('abstract') is-invalid @enderror" name="abstract" rows="5"
                                    placeholder="Enter Journal Abstract">{{ old('abstract', $journal->abstract) }}</textarea>

                                <!-- error message for abstract -->
                                @error('abstract')
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
