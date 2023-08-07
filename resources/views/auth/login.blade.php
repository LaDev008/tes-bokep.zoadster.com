<!doctype html>
<html lang="id">

<head>
    <title>LOGIN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0%;
            padding: 0%;
            box-sizing: border-box;
        }

        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #1f1f1f;
        }
    </style>
</head>

<body class="container-fluid g-0 p-0">

    <div class="row g-0 px-1 w-100">

        <form action="{{ route('login') }}"
            class="col-12 col-lg-6 p-4 p-lg-5 bg-light d-flex justify-content-center align-items-center flex-column gap-4 rounded-3 g-0 mx-auto"
            method="post">
            @csrf
            <h1>LOGIN ADMIN</h1>
            <div class="input-group">
                <label for="username" class="input-group-text col-lg-3">USERNAME</label>
                <input type="text" class="form-control" id="username" name="username" required autofocus>
            </div>
            @error('username')
                <x-error-message :message="$message" />
            @enderror

            <div class="input-group">
                <label for="password" class="input-group-text col-lg-3">PASSWORD</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            @error('password')
                <x-error-message :message="$message" />
            @enderror

            <div class="col-12 text-center">
                <button class="btn btn-primary col-lg-3 col-6" type="submit">SUBMIT</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
