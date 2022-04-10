@include('header')

<?php
$details = request()->session()->get('patient');
?>

<main class="page-content">
    <div class="container-fluid">
        <h4>Make an Appointment</h4>
        <hr>
        <div class="form-width mt-5">
            <div class="form-group col-md-12">
                <!-- <h4>Country list</h4> -->
                <form action="create-appointementprocess" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="email">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" value="{{$details->name}}" name="name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="{{$details->email}}" name="email" required disabled>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Number</label>
                        <input type="email" class="form-control" placeholder="Enter Number" value="{{$details->number}}" name="number" required>
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
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
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

@include('footer')