<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Newspaper - SantriKoding.com</title>
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
                    <a href="{{ route('newspapers.index') }}" class="btn btn-md btn-secondary">
                        <i></i> Back to Newspapers
                    </a>
                </div>
                <div class="card border-0 shadow-sm rounded mt-3">
                    <div class="card-body">
                        <form action="{{ route('newspapers.update', $newspaper->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title', $newspaper->title) }}" placeholder="Enter Newspaper Title">

                                <!-- error message for title -->
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Publisher -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PUBLISHER</label>
                                <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher"
                                    value="{{ old('publisher', $newspaper->publisher) }}" placeholder="Enter Publisher's Name">

                                <!-- error message for publisher -->
                                @error('publisher')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Publication Date -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PUBLICATION DATE</label>
                                <input type="date" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date"
                                    value="{{ old('publication_date', $newspaper->publication_date) }}">

                                <!-- error message for publication_date -->
                                @error('publication_date')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Is Available -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">CHECK IS AVAILABLE</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input @error('is_available') is-invalid @enderror" name="is_available" value="1"
                                        {{ old('is_available', $newspaper->is_available) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_available">Is Available?</label>
                                </div>

                                <!-- error message for is_available -->
                                @error('is_available')
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
