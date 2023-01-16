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
                <h3 class="card-title">Create User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="POST" action="{{ route('users.store') }}">
               @csrf
               @method('POST')  
                <div class="form-group">
                    <label>User</label>
                    <input class="form-control" name="name"/>
                </div>
                @if ($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" />
                </div>

                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
                <!-- Password -->
                <div class="form-group">
                    {{-- <label>Role:</label>

                          <select name="roles[]" multiple data-role="tagsinput" multiple="multiple" data-placeholder="Select a Role" style="width: 100%;"> --}}
                            <div class="select2-purple">
                                <select class="select2" name="roles[]" multiple="multiple" data-placeholder="Select Role" data-dropdown-css-class="select2-purple" style="width: 100%;">
              
                            @foreach ($roles as $role)
                                  <option value="{{ $role }}" @selected(old('roles') == $role)>
                                      {{ $role }}
                                  </option>
                              @endforeach
                                </select>
                            </div>
                            
                </div>
            <div class="form-group">
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
               
            @endforeach
            </ul>
        </div>
    @endif
    </x-app-layout>