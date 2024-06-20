<div class="card card-default color-palette-box">
    @if (isPermissions('register-member'))
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#register-book-details">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    @endif
    <div class="card-body">
        <table id="member-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Nic</th>
                    <th>Register Date</th>
                    <th>Contact No</th>
                    @if (isPermissions('edit-member-register'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($member as $item)
                    <tr>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->nic }}</td>
                        <td>{{ $item->register_date }}</td>
                        <td>{{ $item->contact_no }}</td>
                     
                        @if (isPermissions('edit-member-register'))
                            <td>
                                <a data-member = "{{ json_encode($item) }}" onclick = "updateMember(this)"><i
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
            <form action="/add-member" method="post" id="register-agent-form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                    placeholder="full_name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nic">Nic</label>
                                <input type="text" class="form-control" id="nic" name="nic"
                                    placeholder="nic">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="register_date">Register Date</label>
                                <input type="date" class="form-control" id="register_date" name="register_date"
                                    placeholder="register_date">
                               
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="contact_no">Contact No</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no"
                                    placeholder="contact_no">
                               
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

<div class="modal fade" id="edit-member" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Menber</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-member" method="post" id="edit-member-register-form"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                    placeholder="full_name">
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nic">Nic</label>
                                <input type="text" class="form-control" id="nic"
                                    name="nic" placeholder="nic">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="register_date">Register Date</label>
                                <input type="date" class="form-control" id="register_date"
                                    name="register_date" placeholder="register_date">
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
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
