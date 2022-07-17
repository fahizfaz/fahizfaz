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
                <h3> Apply for {{ $job_detail->job_title}}</h3>
            </div> 
        </div>

        <form class="row g-3" action="{{url('apply-job')}}" method="POST" enctype="multipart/form-data">

            <input type="hidden" value="{{csrf_token() }}" name="_token">

            <input type="hidden" value="{{ $job_detail->id}}" name="job_id">

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label"> Name</label>
                <input type="text" class="form-control" name="name" required>
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
                <label for="inputPassword4" class="form-label">Upload Resume <small>(Accepts only document or pdf, Max size : 3mb)</small></label>
                <input type="file" class="form-control" accept="application/pdf, application/msword" name="resume" required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary"> Apply </button>
            </div>

            <div class="col-12">
                <a href="/view-jobs" class="btn btn-success"> Back to Jobs Page </a>
            </div>

        </form>

        

    </div> <br> <br>

</body>
</html>