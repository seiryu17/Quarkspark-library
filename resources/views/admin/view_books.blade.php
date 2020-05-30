@include('admin/partials/header')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h2>Manage Books</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal">
                <i class="fas fa-plus"></i>
            </button>
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
                            <td>
                                <form action="/delete-book/{{$b->id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="javascript:void()" class="btn btn-warning btn-circle btn-sm button-update" type="button" data-id="{{$b->id}}" data-bookname="{{$b->bookName}}" data-author="{{$b->author}}" data-publisher="{{$b->publisher}}" data-datepublish="{{$b->datePublish}}"><i class="fas fa-edit"></i></a>
                                    <a href="/show-image/{{$b->id}}" class="btn btn-success btn-circle btn-sm" type="button"><i class="fas fa-camera"></i></a>
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
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