<x-app-layout>
    <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                 
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Products</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
           
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Create Product</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
               @csrf
               @method('POST')  
               <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="image" />
            </div>
                <div class="form-group">
                    <label>Product_Name</label>
                    <input class="form-control" name="product_name"/>
                </div>
                
                {{-- product-type-id --}}
                <div class="form-group">
                    <label>product_type</label>
                    <select class="form-control" id="brand_id" name="product_type_id">
                      <option value="1">Refurbished</option>
                      <option value="2">New</option>
                      <option value="3">Old</option>
                    </select>
                </div>
                {{-- Price --}}
               
            <div class="form-group">
                <label for="password">Manufacturer</label>

                <input id="price" class="form-control"
                                type="string"
                                name="manufacturer"
                                 />

                               
                                 @if ($errors->has('manufacturer'))
                                <div class="alert alert-danger">{{ $errors->first('manufacturer') }}</div>
                            @endif
            </div>

        {{-- Description --}}
        <div class="form-group">
            <label>Description</label>
            <input class="form-control" name="description" />
        </div>

        {{-- Price --}}
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="price" />
        </div> 

         {{-- Model_ID --}}
         <div class="form-group">
            <label>Model</label>
            <select class="form-control" id="model_id" name="model_id">
              @foreach ($models as $model)
              <option value="{{$model->id}}">{{$model->model_name}}</option> 
              @endforeach
             
            </select>
            
        </div>
         {{-- Brand_ID--}}
         <div class="form-group">
            <label>Brand</label>
            <select class="form-control" id="brand_id" name="brand_id">
              @foreach ($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->brand_name}}</option> 
              @endforeach
             
           </select>
          
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