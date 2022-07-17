<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                margin-top: 100px;
            }
        </style>
    </head>
    <body class="antialiased">

        <div class="container">

            <div class="card-header" style="text-align:center;">
                <h1>Job Board</h1>
            </div>

            <div class="row">

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Admin</h5>
                        <p class="card-text">Here you can create jobs and view all jobs. Also know all the applications regarding to each job when click on job title in table</p>
                        <a href="/post-jobs" class="btn btn-primary" role="button">Post Jobs</a>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User </h5>
                        <p class="card-text">Here you can view all the jobs. Also you can filter the jobs using options. You can also apply to the respective jobs from here </p>
                        <a href="/view-jobs" class="btn btn-success" role="button">Apply Jobs</a>
                    </div>
                    </div>
                </div>

            </div>

        </div>

    </body>
</html>
