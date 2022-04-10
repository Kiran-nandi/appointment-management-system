@include('admin/header')


<main class="page-content">
    <div class="container-fluid">
        <h4>Make an Appointment</h4>
        <hr>
        <div class="form-width mt-5">
            <div class="form-group col-md-12">
                <!-- <h4>Country list</h4> -->
                <form action="admincreate-appointementprocess" method="post" class="needs-validation" novalidate>
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
    </div>
</main>
<style>
    .form-width {
        width: 50%;
    }
</style>

<script src="{{asset('assets/js/custom.js')}}"></script>

@include('admin/footer')