<x-app-layout>
 
    <div class="row p-4">
        <div class="col-sm-4 col-xl-4">
            <div class="card" >
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Total Roles</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="mdi mdi-police-badge" style="font-size:20px"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center text-center"><span class="badge badge-warning">{{ $roles->count() }}</span> </h4>
                 </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-4">
            <div class="card" >
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Total Permissions</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="mdi mdi mdi-shield-lock" style="font-size:20px"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center text-center"><span class="badge badge-warning">{{ $permissions->count() }}</span> </h4>
                 </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">

        <div class="card-title">
            Manage your roles here.
            <a href="#" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#addRoles"><i class="mdi mdi mdi-plus-circle-outline"></i>Add role</a>


        </div>

        <div class="modal fade" id="addRoles" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                <div class="modal-content" style="min-width: 400px">
                    <div class="modal-header header-title">
                        <h5 class="modal-title mt-0" id="addRoles">Add Role</h5>

                    </div>
                    <div class="modal-body">
                       <div class="card">
                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input value="{{ old('name') }}"
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Name" required>
                        </div>

                        <label for="permissions" class="form-label">Assign Permissions</label>

                        <table class="table table-striped">
                            <thead>
                                <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                <th scope="col" width="20%">Name</th>
                                <th scope="col" width="1%">Guard</th>
                            </thead>

                            @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                        name="permission[{{ $permission->name }}]"
                                        value="{{ $permission->name }}"
                                        class='permission'>
                                    </td>
                                    <td class="modal-text">{{ $permission->name }}</td>
                                    <td class="modal-text">{{ $permission->guard_name }}</td>
                                </tr>
                            @endforeach
                        </table>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal"><i class="mdi mdi-close"></i>Close</button>
                        <button type="submit" class="btn btn-sm btn-outline-primary"><i class="mdi mdi-checkbox-marked-circle-outline"></i>Add Role</button>
                        </div>
                </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <table class="table table-striped" id="dataTable">
         <thead>

             <th width="1%">No</th>
             <th>Name</th>
             <th>Action</th>

         </thead>
         <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>

                    <a   href="{{ route('roles.edit', $role->id) }}"><i class="fa fa-edit text-secondary" style="font-size: 20px"></i></a>
                </td>

            </tr>
            @endforeach
         </tbody>
        </table>



    </div>
    </div>
</div>
      </div>
</section>
<script>
    $(document).ready(function() {
      var table2 = $('#dataTable').DataTable( {
           lengthChange: false,

           buttons: [ {
                   extend:    'excel',
                   text:      '<i class="fa fa-file-excel-o text-success" style="font-size:14px"></i> Download Excel',
                   className: 'btn btn-flat btn-light'
                   }]
           } );

           table2.buttons().container()
           .appendTo( '#dataTable_wrapper .col-md-6:eq(0)' );

            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>


</x-app-layout>
