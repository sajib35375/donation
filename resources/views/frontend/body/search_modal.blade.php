<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header as-bgcolor">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                <h4>Search</h4>
            </div>
            <div class="modal-body">
                <form class="modal-search" method="POST" action="{{ route('search.index') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" placeholder="Enter any keyword and press enter" name="search" required>
                    <label> <input type="submit" value=""> </label>
                </form>
            </div>
        </div>
    </div>
</div>