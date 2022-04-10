@include('doctors/header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="form-group col-md-12">
                <h4>All Appointments List</h4>
                <br />
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr. no.</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $srno = 1; ?>
                        @foreach($list as $data)
                        <tr>
                            <td>{{$srno++}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->number}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->time}}</td>
                            <td>
                                <select class="form-control Ustatus" data-id="{{$data->id}}" >
                                    <option disabled>Update Status</option>
                                    <option value="waiting for approval" <?php if($data->status == 'waiting for approval') {echo 'selected';} ?>>Waiting for Approval</option>
                                    <option value="Approve" <?php if($data->status == 'Approve') {echo 'selected';} ?>>Approve</option>
                                    <option value="Discard" <?php if($data->status == 'Discard') {echo 'selected';} ?>>Discard</option>
                                    <option value="Fulfilled" <?php if($data->status == 'Fulfilled') {echo 'selected';} ?>>Fulfilled</option>
                                </select>
                            </td>
                            <td><a href="delete-doctor-appointment/{{$data->id}}" style="color: red;font-size: 20px;text-align: center;"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('.Ustatus').change(function() {
        var status = $(this).find(":selected").val();
        var id = $(this).attr('data-id');
        console.log(id);
        console.log(status);
        $.ajax({
            url: '{{route("upadatestatus")}}',
            type: 'post',
            dataType: 'json',
            data: {
                "_token": "{{csrf_token()}}",
                status: status,
                id: id
            },
            success: function(result) {
                if(result == 'success') {
                    window.location.reload();
                } else {
                    alert('something went wrong!! please try again');
                }
            },
            error: function(err) {
                console.log('Error >>', err);
            }
        });
    })
</script>
@include('doctors/footer')