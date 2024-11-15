<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Newspaper - SantriKoding.com</title>
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
                    <a href="{{ route('newspapers.index') }}" class="btn btn-md btn-secondary">
                        <i></i> Back to Newspapers
                    </a>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- Newspaper Title -->
                        <h3>{{ $newspaper->title }}</h3>
                        <hr />

                        <!-- Newspaper Publisher -->
                        <p><strong>Publisher:</strong> {{ $newspaper->publisher }}</p>

                        <!-- Publication Date -->
                        <p><strong>Publication Date:</strong> {{ $newspaper->publication_date }}</p>

                        <!-- Availability Status -->
                        <p><strong>Status:</strong> 
                            @if($newspaper->is_available)
                                <span class="text-success">Available</span>
                            @else
                                <span class="text-danger">Not Available</span>
                            @endif
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
