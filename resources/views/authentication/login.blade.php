<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset("ui/backend/assets/css/style.css") }}">
    </head>

    <body>
        <div class="container p-5">

            <form action="{{ route("login.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input placeholder="Enter your email" type="email" class="form-control" id="email" name="email" required>
                            @if ($errors->has("email"))
                                <p class="text-danger">{{ $errors->first("email") }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input placeholder="Enter your password" type="password" class="form-control" id="password" name="password" required>
                            @if ($errors->has("password"))
                                <p class="text-danger">{{ $errors->first("password") }}</p>
                            @endif
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                    <i class="fa-solid fa-floppy-disk"></i> Save
                </button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

</html>
