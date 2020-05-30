@include('admin/partials/header')
 <!-- Begin Page Content -->
 <div class="container-fluid">

  <!-- DataTales Example -->
<div class="tab-pane fade show active" id="show-image" role="tabpanel" aria-labelledby=="home-tab">
    <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4 mt-2">
                    <div class="card-body">
                    <img src="/{{$BookList->imageBook}}" alt="image" style="width: 100%; display: block;">
                    </div>
                </div>
            </div>
    </div>
</diV>

</div>
@include('admin/partials/footer')
