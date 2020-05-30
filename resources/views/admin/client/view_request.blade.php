@include('admin/partials/header')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h2>Request Rents</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Date Publish</th>
                            <th>Users Id</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($BookList as $b)
                        <tr>
                            <td>{{$b->bookName}}</td>
                            <td>{{$b->author}}</td>
                            <td>{{$b->publisher}}</td>
                            <td>{{$b->datePublish}}</td>
                            <td>{{$b->users_id}}</td>
                            <td>
                                <div class="row ml-1">
                                    <form action="/accept-rent/{{$b->id}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"> Accept</i></button>
                                    </form>
                                    <form action="/decline-rent/{{$b->id}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"> Reject</i></button>
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
<script>
    $('#dataTable').on('click', '.button-update', function() {
        let id = $(this).data('id')
        let bookname = $(this).data('bookname')
        let author = $(this).data('author')
        let publisher = $(this).data('publisher')
        let datepublish = $(this).data('datepublish')
        $('#edit-modal').modal('show');
        $('.id').val(id);
        $('.bookname').val(bookname);
        $('.author').val(author);
        $('.publisher').val(publisher);
        $('.datepublish').val(datepublish);
    })
</script>