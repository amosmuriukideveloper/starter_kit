<x-app-layout>
  <div class="row">
      <div class="col-md-12">
          <div class="card">

          <div class="card-header">
              Manage your Products here.
              <a href="{{ route('products.create') }}" class="btn btn-outline-primary btn-sm float-right" ><i class="mdi mdi mdi-plus-circle-outline"></i>Add Product</a>
          </div>
          <div class="card-body">
              <table class="table table-striped table-bordered" >
                  <thead>
                  <tr>
                      
                      <th scope="col">Image</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Product Type </th>
                      <th scope="col">Manufacturer</th>
                      <th scope="col">Description</th>
                      <th scope="col">Price</th>
                      <th scope="col">Model</th>
                      <th scope="col">Brand</th>

                      
                      <th scope="col"><i class="mdi mdi-view-sequential" style="font-size: 20px"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                    
              @foreach ($products as $product)
              <tr>
            
                  <td> <img class=" rounded-square bg-lighter d-flex" width="86px" height="72px"  src="{{ URL::asset('uploads/products/'.$product->image) }}" alt="product_image"></td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->product_type_id }}</td>
                  <td>{{ $product->manufacturer }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->model_type->model_name }}</td>
                  <td>{{ $product->brand->brand_name }}</td>

                 
                 
                  <td><a href="{{ route('products.edit', $product->id) }}" ><i class="mdi mdi-circle-edit-outline text-secondary" style="font-size: 20px"></i></a></td>
              </tr>
             
          @endforeach
                  </tbody>
              </table>
          </div>
      </div>

      </div>
  </div>
  

</x-app-layout>