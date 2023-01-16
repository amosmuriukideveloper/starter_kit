<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

            <div class="card-header">
                Manage your users here.
                <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-sm float-right" ><i class="mdi mdi mdi-plus-circle-outline"></i>Add User</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" >
                    <thead>
                    <tr>
                        
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Created On</th>
                        <th scope="col"><i class="mdi mdi-view-sequential" style="font-size: 20px"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach ($users as $user)
                <tr>
                    
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    
                    <td> @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $role)
                        <label class="badge badge-success">{{ $role }}</label>
                        @endforeach
                    @endif
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('users.edit', $user->id) }}" ><i class="mdi mdi-circle-edit-outline text-secondary" style="font-size: 20px"></i></a></td>
                </tr>
               
            @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>
    

</x-app-layout>