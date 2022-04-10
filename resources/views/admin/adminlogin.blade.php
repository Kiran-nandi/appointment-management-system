<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
</head>

<body>
    <div class="container">
        <div class="custom-width">
            <h4>Admin Login In</h4>
            <form action="adminloginprocess" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" minlength="6" maxlength="10" placeholder="Enter password (6 - 10 length)" name="password" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>               
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>