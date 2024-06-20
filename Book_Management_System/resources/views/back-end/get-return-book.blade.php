<div class="card card-default color-palette-box">
    @if (isPermissions('getReturn'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#register-book-details">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="get-return-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>No Of Book</th>
                    <th>Date</th>
                    <th>Contact No</th>
                    <th>Member</th>
                    <th>Return Status</th>
                    @if (isPermissions('create-get-return-book'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($getReturn as $item)
                    <tr>
                        <td>{{ $item->BookDetails->title }}</td>
                        <td>{{ $item->BookDetails->author }}</td>
                        <td>{{ $item->no_of_book }}</td>
                        <td>{{ $item->get_date }}</td>
                        <td>{{ $item->contact_no }}</td>
                        <td>{{ $item->member }}</td>

                        @if ($item->return_status == 0)
                            <td><span class="badge badge-danger">No</span></td>
                        @else
                            <td><span class="badge badge-success">Yes</span></td>
                        @endif
                     
                        @if (isPermissions('create-get-return-book'))
                            <td>
                                <a data-getreturn = "{{ json_encode($item) }}" onclick = "updateGetReturn(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="register-book-details" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Member Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-get-return-book" method="post" id="get-return-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                        <div class="form-group" data-select2-id="22">
                                <label for="book_title">Book</label>
                                <select class="form-control select2 " name="book_title" style="width: 100%;"
                                    data-select2-id="22" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($bookDetails as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }} - {{$item->author}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                   
                        <div class="col-12">
                            <div class="form-group">
                                <label for="no_of_book">No Of Book</label>
                                <input type="number" class="form-control" id="no_of_book" name="no_of_book"
                                    placeholder="no_of_book">
                               
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="get_date">Get Date</label>
                                <input type="date" class="form-control" id="get_date" name="get_date"
                                    placeholder="get_date">
                               
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="contact_no">Contact No</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no"
                                    placeholder="contact_no">
                               
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="member">Member</label>
                                <input type="text" class="form-control" id="member" name="member"
                                    placeholder="member">
                               
                            </div>
                        </div>

                     
                        
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-getreturn" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Menber</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-get-return-book" method="post" id="edit-getreturn-register-form"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="book_title">Book Title</label>
                                <select class="form-control select2 " name="book_title" style="width: 100%;"
                                    data-select2-id="22" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($bookDetails as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }} - {{$item->author}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-12">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="no_of_book">No Of Book</label>
                                <input type="number" class="form-control" id="no_of_book"
                                    name="no_of_book" placeholder="no_of_book">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="get_date">Date</label>
                                <input type="date" class="form-control" id="get_date"
                                    name="get_date" placeholder="get_date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="contact_no">Contact No</label>
                                <input type="text" class="form-control" id="contact_no"
                                    name="contact_no" placeholder="contact_no">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="member">Member</label>
                                <input type="text" class="form-control" id="member"
                                    name="member" placeholder="member">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="return_status">Return Status</label>
                            <select class="form-control select2 " name="return_status" style="width: 100%;"
                            data-select2-id="3" tabindex="-1" aria-hidden="true">
                            <option value="">No Select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
