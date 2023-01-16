 @props(['errors'])  
 <button type="button" class="btn btn-danger toastrDefaultError">
    Launch Error Toast
  </button>
 @if (count($errors) > 0)
     @foreach ($errors as $error)  
         <li>{{ $error }}</li>
       
     @endforeach
 @endif

