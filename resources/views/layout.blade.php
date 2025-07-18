<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page: @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <div class="container-fluid">
                        <a class="navbar-brand h1" href={{ route('posts.index') }}>Posts CRUD Viewer</a>
                        <div class="justify-end ">
                                <div class="col ">
                                        <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>Add Post</a>
                                </div>
                        </div>
                </div>
        </nav>

        <div class="container">
                @yield('content')
        </div>
</body>

</html>