<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/tasks.css') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header-container">
            <x-header />
        </div>
        <div class="row">
            <div class="col-md-4">
                <x-add-task-card />
            </div>
            <div class="col-md-8">
                <x-task-list :tasks="$tasks" />
            </div>
        </div>
    </div>
    <div class="text-center">
        <x-footer />
    </div>

    @if(session('message'))
        <x-success-flash-message />
    @endif
</body>
</html>
