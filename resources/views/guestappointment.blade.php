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
            <h4>Book Appoinment as Guest</h4>
            <form action="guest-appointementprocess" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="email">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter Patient Name"  name="name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Patient Email" required >
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Number</label>
                        <input type="text" class="form-control" minlength="10" maxlength="10" onkeypress='validate(event)' placeholder="Enter Patient Number" name="number" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Select Doctor</label>
                        <select class="form-control" name="doctor" required>
                            <option disabled >Select Doctor</option>
                            @foreach($doctor as $data)
                            <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach                          
                         </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Date & Time</label>
                        <div class='input-group date' >
                            <input class="form-control" type="datetime-local" min="<?php echo date('Y-m-d').'T16:00'; ?>" name="time" required />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="email">Message (optional)</label>
                    <textarea name="message" rows="5" placeholder="Message" class="form-control" ></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
        </div>
    </div>

    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>