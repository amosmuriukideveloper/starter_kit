<x-app-layout>


   
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                <div class="card-header">
                    Manage your permissions here.
                    <a href="{{ route('permissions.create') }}" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#addPermissions"><i class="mdi mdi mdi-plus-circle-outline"></i>Add permissions</a>
                </div>

                <div class="modal fade" id="addPermissions" tabindex="-1" role="dialog" aria-labelledby="addPermissions" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-scrollable" >
                        <form method="POST" action="{{ route('permissions.store') }}">
                            @csrf
                            <div class="modal-content" style="min-width: 400px">
                                <div class="header-title p-2">
                                    <h5 class="modal-title mt-0" id="addPermissions">Add Permissions</h5>

                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input value="{{ old('name') }}"
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Name" required>

                                        @if ($errors->has('name'))
                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal"><i class="mdi mdi-close"></i>Close</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="mdi mdi-checkbox-marked-circle-outline"></i>Add Permission</button>
                                    </div>
                            </div><!-- /.modal-content -->
                    </form>
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            <div class="card-body">
                <table class="table table-striped table-bordered" >
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Guard</th>
                        <th scope="col"><i class="mdi mdi-view-sequential" style="font-size: 20px"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td><a href="{{ route('permissions.edit', $permission->id) }}" ><i class="mdi mdi-circle-edit-outline text-secondary" style="font-size: 20px"></i></a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            </div>
            </div>
        </div>
  
<script>
    $(document).ready(function() {
    //   var table2 = $('#dataTable').DataTable( {
    //        lengthChange: false,

    //        buttons: [ {
    //                extend:    'excel',
    //                text:      '<i class="fa fa-file-excel-o text-success" style="font-size:14px"></i> Download Excel',
    //                className: 'btn btn-flat btn-light'
    //                }]
    //        } );

    //        table2.buttons().container()
    //        .appendTo( '#dataTable_wrapper .col-md-6:eq(0)' );

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
