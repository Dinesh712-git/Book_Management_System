<div class="card card-default color-palette-box">
    @if (isPermissions('create-book-category'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#add-category">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="book-category-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    
                  
                        <th>Action</th>
        
                </tr>
            </thead>
            <tbody>
                @foreach ($bookCategory as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                       
                        @if (isPermissions('edit-book-category'))
                            <td>
                                <a data-book-category = "{{ json_encode($item) }}" onclick = "editBookCategory(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add-category" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Book Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-book-category" method="post" id="create-book-category-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Book Category</label>
                                <input type="text" class="form-control" id="name"
                                    name="name" placeholder="Book Category">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="create_country_btn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-book-category" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Book Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-book-category" method="post" id="edit-book-category-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" id="id" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Book Category</label>
                                <input type="text" class="form-control" id="name"
                                    name="name" placeholder="Book Category">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                           
                        </div>
                    </div>

                    <div class="form-group" data-select2-id="3">
                      
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="update_country_btn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
