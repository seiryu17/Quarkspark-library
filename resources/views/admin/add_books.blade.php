<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <form action="/add-book" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Book Name (Title)</label>
                        <input type="text" class="form-control" id="bookname" name="bookname" placeholder="Book Name" required>
                        <label for="name">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Author" required>
                        <label for="name">Publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher" required>
                        <label for="name">Date Publish</label>
                        <input type="date" class="form-control" id="datepublish" name="datepublish" placeholder="Date Publish" required>
                        <label for="name">Image</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>