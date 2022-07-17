<!DOCTYPE html>
<html>
<head>
<title>Post Jobs</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style>
    body {
        font-family: 'Nunito', sans-serif;
        margin-top: 100px;
    }
</style>
</head>

<body>

    <div class="container">

        <div class="card">
            <div class="card-header">
                Search Jobs
            </div>

            <div class="card-body">

                <div class="row">

                    <form action="/view-jobs" method="GET">

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="keywords" placeholder="keywords">
                        </div>

                        <div class="col-md-4">
                            <select id="inputState" class="form-select" name="job_type">
                                <option value="" @if($job_type == 'null') selected @endif>All</option>    
                                <option value="full_time" @if($job_type == 'full_time') selected @endif >Full Time</option>
                                <option value="part_time" @if($job_type == 'part_time') selected @endif>Part Time</option>
                                <option value="contract" @if($job_type == 'contract') selected @endif>Contract</option>
                                <option value="freelance" @if($job_type == 'freelance') selected @endif>Freelance </option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

        <br><br>

        <div class="card mb-3">

            <div class="card-header">
                <h3> All Jobs </h3>
            </div> <br>
      
            <div class="row">

                @foreach($all_jobs as $job)

                    <div class="col-sm-6">
                        <div class="card border-info mb-3">
                            <div class="card-header"> <h3>{{ $job->job_title }}</h3></div>
                            <div class="card-body">

                                <p class="card-title">Location : {{ $job->location }}</p>
                                <p class="card-title">Email : {{ $job->email }}</p>
                                <p class="card-title">Phone : {{ $job->phone }}</p>
                                <p class="card-title">Job Type : {{ ucfirst(str_replace("_", " ", $job->job_type)) }}</p>
                                <p class="card-text">Description : {{ $job->job_description }} </p>

                                <a href="apply-job/{{$job->id}}" class="btn btn-primary">Apply Job</a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

        </div>

    </div>

</body>

</html>