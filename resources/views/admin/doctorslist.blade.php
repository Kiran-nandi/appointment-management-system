@include('admin/header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="form-group col-md-12">
                <h4>All Patients List</h4>
                <br />
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr. no.</th>
                            <th>Name</th>
                            <th>Speciality</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Address</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $srno = 1; ?>
                        @foreach($doctors as $data)
                        <tr>
                            <td>{{$srno++}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->speciality}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->number}}</td>
                            <td>{{$data->address}}</td>
                            <td><a href="admin-deletedoctor/{{$data->id}}" style="color: red;font-size: 20px;text-align: center;"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@include('admin/footer')