@include('admin/partials/header')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h2>View User</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($User as $b)
                        <tr>
                            <td>{{$b->id}}</td>
                            <td>{{$b->name}}</td>
                            <td>{{$b->email}}</td>
                            <td>{{$b->status}}</td> 
                            <td>
                                <div class="row ml-1">
                                    <form action="/activate-user/{{$b->id}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"> Activate</i></button>
                                    </form>
                                    <form action="/deactivate-user/{{$b->id}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"> Deactivate</i></button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@include('admin/add_books')
@include('admin/edit_books')
@include('admin/partials/footer')
