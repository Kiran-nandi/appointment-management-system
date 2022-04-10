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
            <h4>Doctor Registration</h4>
            <form action="doctorregistrationprocess" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Full Name</label>
                    <input type="text" class="form-control" placeholder="Your Full Name" name="name" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="Speciality">Speciality In</label>
                    <input type="text" class="form-control" placeholder="Your Speciality.." name="speciality" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Your Email Address" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="email">Contact Number</label>
                    <input type="text" class="form-control" minlength="10" maxlength="10" onkeypress='validate(event)' placeholder="Your Contact Number" name="number" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" minlength="1" maxlength="2" onkeypress='validate(event)' placeholder="Your Age" name="age" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="sel1">Gender</label>
                    <select class="form-control" id="sel1" name="gender" required>
                        <option disabled>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Transgender</option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="email">Address</label>
                    <textarea name="address" rows="5" placeholder="Your Current Address" class="form-control" required></textarea>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" minlength="6" maxlength="10" placeholder="Enter password (6 - 10 length)" name="password" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="password">Re-enter Password</label>
                    <input type="password" class="form-control" minlength="6" maxlength="10" placeholder="Re-enter password (6 - 10 length)" name="repassword" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <a href="doctor-signin">Already Registered Sign In</a>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>