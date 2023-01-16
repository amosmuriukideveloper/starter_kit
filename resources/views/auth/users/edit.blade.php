<x-app-layout>
    <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                 
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Users</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
           
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Edit Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="POST" action="{{ route('users.update', $user->id) }}">
               @csrf
               @method('PATCH')  
                <div class="form-group">
                    <label>user</label>
                    <input class="form-control" name="name" value="{{ $user->name }}"/>
                </div>
                @if ($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" value="{{ $user->email }}"/>
                </div>

                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif

                <div class="form-group">
                    <label>Role:</label>
                    <div class="select2-purple">
                        <select class="select2" name="roles[]" multiple="multiple" data-placeholder="Select Role" data-dropdown-css-class="select2-purple" style="width: 100%;">
    

                    
                        <optgroup label="Roles">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" <?php if(in_array($role, $userRoles->toArray())) { ?> selected="true" <?php } ?>>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </optgroup>
                    </select>
                    </div>
                </div>

                <!-- Password -->
            <div class="form-group">
                <div class="alert alert-info bg-white">Just In case you wish to change your password</div>
                <label for="password">Password</label>

                <input id="password" class="form-control"
                                type="password"
                                name="password"
                                 />

                                @if ($errors->has('password'))
                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                            @endif
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>

                <input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation"/>

                                @if ($errors->has('password_confirmation'))
                                <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                            @endif
            </div>


                <div class="form-group">
                <button type="submit" class="btn btn-outline-primary"><i class="mdi mdi-checkbox-marked-circle-outline" style="font-size: 16px"></i> Save changes</button>
                </div>
                 </form>
              </div>
    
            </div>
          </div>
        </section>
      
    </x-app-layout>