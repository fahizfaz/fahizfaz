<!DOCTYPE html>
<html>
<head>
<title>Job Applications</title>

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

        <div class="card text-center">
            <div class="card-header">
                Job Details
            </div>
            <div class="card-body">
                <h3 class="card-title">{{ $job_detail->job_title }}</h3>
                <h5 class="card-title">{{ $job_detail->company_name }}</h5>
                <h5 class="card-title">{{ $job_detail->email }}</h5>
                <h5 class="card-title">{{ $job_detail->phone }}</h5>
                <h5 class="card-title">{{ $job_detail->location }}</h5>
                <p class="card-text"> {{ $job_detail->job_description }} </p>

                <h5 class="card-title">Total Applications : {{ $total_applications }}</h5>

            </div>
            <div class="card-footer text-muted">
              Posted At : {{ date('d-m-Y', strtotime($job_detail->created_at)) }}
            </div>
        </div>

    </div>

    <br><br>

    <div class="container">

        <div class="card">
            <div class="card-header">
                All Job Applications List
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Candidate Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Resume</th>
                            <th scope="col">Applied At</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($job_applications as $key=>$job)

                            <tr>
                                
                                <th scope="row">{{ ++$key }}</th>
                                <td> {{ $job->name }}</td>
                                <td> {{ $job->email }} </td>
                                <td> {{ $job->phone }} </td>
                                <td> <a href="/uploads/{{$job->resume}}" > {{ $job->resume }} </a> </td>
                                <td> {{ date('d-m-Y', strtotime($job->created_at)) }} </td>

                            </tr>

                        @endforeach

    
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    

</body>
</html>