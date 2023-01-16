<x-app-layout>
 
        <section class="content">
          <div class="container-fluid">
          
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Edit Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
              
               @csrf
               @method('PUT')  
               <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="image" />
            </div>
                <div class="form-group">
                    <label>Product_Name</label>
                    <input class="form-control" value="{{ old('product_name',$product->product_name) }}" name="product_name"/>
                </div>
                
                {{-- product-type-id --}}
                <div class="form-group">
                    <label>product_type</label>
                    <select class="form-control" id="brand_id" name="product_type_id">
                      <option value="1" {{ old('product_type_id') == '1' ? 'selected':'' }}>Refurbished</option>
                      <option value="2"  {{ old('product_type_id') == '2' ? 'selected':'' }}>New</option>
                      <option value="3"  {{ old('product_type_id') == '3' ? 'selected':'' }}>Old</option>
                    </select>
                </div>
                {{-- Price --}}
               
            <div class="form-group">
                <label for="password">Manufacturer</label>

                <input id="price" class="form-control"
                                type="string"
                                name="manufacturer"
                                value="{{ $product->manufacturer }}"
                                 />

                               
                                 @if ($errors->has('manufacturer'))
                                <div class="alert alert-danger">{{ $errors->first('manufacturer') }}</div>
                            @endif
            </div>

        {{-- Description --}}
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description">{{ $product->description }}</textarea>
        </div>

        {{-- Price --}}
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" value="{{ $product->price }}" name="price" />
        </div> 

         {{-- Model_ID --}}
         <div class="form-group">
            <label>Model</label>
            <select class="form-control" id="model_id" name="model_id">
              @foreach ($models as $model)
              <option value="{{$model->id}}"  {{ old('model_id') == $model->id ? 'selected':'' }}>{{$model->model_name}}</option> 
              @endforeach
             
             
            </select>
            
        </div>
         {{-- Brand_ID--}}
         <div class="form-group">
            <label>Brand</label>
            <select class="form-control" id="brand_id" name="brand_id">
              @foreach ($brands as $brand)
              <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected':'' }}>{{$brand->brand_name}}</option> 
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
