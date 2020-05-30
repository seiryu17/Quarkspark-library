@include('admin/partials/header')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h2>View Books</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
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
                                <div class="row ml-1">
                                    <a href="/show-image/{{$b->id}}" class="btn btn-success btn-sm" type="button"><i class="fas fa-camera"></i> Image</a>
                                    @if( $b->users_id > 0)
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-ban"> This Book is Not Available</i></button>
                                    @else
                                    <form action="/request-books/{{$b->id}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-check"> Request</i></button>
                                    </form>
                                    @endif
                                   

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

@include('admin/partials/footer')
