<x-app-layout>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permissions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
       
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Permission</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
           @csrf
           @method('PATCH')  
            <div class="form-group">
                <label>Permission</label>
                <input class="form-control" name="name" value="{{ $permission->name }}"/>
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
            <div class="form-group">
            <button type="submit" class="btn btn-outline-primary"><i class="mdi mdi-checkbox-marked-circle-outline" style="font-size: 16px"></i> Save changes</button>
            </div>
             </form>
          </div>

        </div>
      </div>
    </section>
  
</x-app-layout>