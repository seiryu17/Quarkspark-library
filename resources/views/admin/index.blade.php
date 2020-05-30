@include('admin/partials/header')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Welcome to Dashboard</h1>
          </div>

          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <h2>Hi, {{Auth::user()->name}}</h2>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Here is your statistic. </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        @if(auth()->user()->is_admin == 1)
                        Books
                        @else
                        Books Rented
                        @endif
                      </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      @if(auth()->user()->is_admin == 1)
                      {{$BookCount}}
                      @else
                      {{$Clientrentcount}}
                      @endif
                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        @if(auth()->user()->is_admin == 1)
                        Pending Requests
                        @else
                        Request Rent on Progress
                        @endif
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @if(auth()->user()->is_admin == 1)
                        {{$BookReqCount}}
                        @else
                        {{$Clientrentonprogresscount}}
                        @endif
                       
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if(auth()->user()->is_admin == 0)
          <div class="row">
            <div class="container-fluid">
              <h2>View Rented Books</h2>
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
              <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              
              @foreach($Clientrent as $b)
              <tr>
              <td>{{$b->bookName}}</td>
              <td>{{$b->author}}</td>
              <td>{{$b->publisher}}</td>
              <td>{{$b->datePublish}}</td>
              <td>
              <div class="row ml-1">
              <form action="/return-books/{{$b->id}}" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"> Return</i></button>
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
          </div>
          @else
          <div class="row">
            <div class="container-fluid">
              <h2>View All Rented Books</h2>
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
              </tr>
              </thead>
              <tbody>
              
              @foreach($allrented as $b)
              <tr>
              <td>{{$b->bookName}}</td>
              <td>{{$b->author}}</td>
              <td>{{$b->publisher}}</td>
              <td>{{$b->datePublish}}</td>
              <td>{{$b->users_id}}</td>
              </tr>
              @endforeach
              </tbody>
              </table>
              </div>
              </div>
              </div>
              
              </div>
          </div>
          @endif
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      @include('admin/partials/footer')