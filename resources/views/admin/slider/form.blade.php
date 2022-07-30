

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Url</label>
                        <input type="text" name="url" id="url"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Thumbnail</label>
                        <input type="file" name="thumb" class="form-control">
                        <input type="hidden" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Create</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
