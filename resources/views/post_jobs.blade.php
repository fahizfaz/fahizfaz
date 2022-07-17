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

    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <ul class="list-unstyled">
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
        @endif
    </div>

        <div class="card">
            <div class="card-header">
                <h3> Create Job </h3>
            </div> 
        </div>

        <form class="row g-3" action="{{url('create-job')}}" method="POST" enctype="multipart/form-data">

            <input type="hidden" value="{{csrf_token() }}" name="_token">

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Company Name</label>
                <input type="text" class="form-control" name="company_name" required>
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Eg : john@gmail.com" required>
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Phone <small>(Please enter number with 10 digits only)</small></label>
                <input type="number" class="form-control" name="phone" placeholder="12345-67890" required>
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Location</label>
                <input type="text" class="form-control" name="location" required>
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Title</label>
                <input type="text" class="form-control" name="job_title" required>
            </div>

            <div class="col-md-6">
                <label for="inputState" class="form-label">Job Type</label>
                <select id="inputState" class="form-select" name="job_type" required>
                    <option value="full_time" selected>Full Time</option>
                    <option value="part_time">Part Time</option>
                    <option value="contract">Contract</option>
                    <option value="freelance">Freelance </option>
                </select>
            </div>

            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Description</label>
                <textarea class="form-control" name="job_description"  required></textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Post Job</button>
            </div>

        </form>

    </div> <br> <br>


    <div class="container">

        <div class="card">
            <div class="card-header">
                Posted Jobs
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Location</th>
                        <th scope="col">Job Type</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_jobs as $key=>$job)

                            <tr>
                                
                                <th scope="row">{{ ++$key }}</th>
                                <td> <a href="/job-applications/{{ $job->id }}"> {{ $job->job_title }} </a> </td>
                                <td> {{ $job->company_name }} </td>
                                <td> {{ $job->email }} </td>
                                <td> {{ $job->phone }} </td>
                                <td> {{ $job->location }} </td>
                                <td> {{ ucfirst(str_replace("_", " ", $job->job_type)) }} </td>

                            </tr>

                        @endforeach
 
    
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>

</html>