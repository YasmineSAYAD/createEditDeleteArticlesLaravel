<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Articles</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    
       
    </head>
    <body class="antialiased">
            @if (session('success'))
             <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

           @if (session('error'))
           <div class="alert alert-danger">
              {{ session('error') }}
           </div>
           @endif
           
             
                      <form  action="{{ route('editarticle',$article->id)}}"  method="POST" >
                      @csrf
                        <div class="container">
                            <br>
                           <div class="row">
                             <div class="col-md-6">
                                 <h2><b>edit article</b></h2>
                             </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                  <label for="name">Name</label>
                                  <input  class="form-control" type="text"  id="name" name="name" value="{{$article->name}}" required>
                                </div>
                             </div> 
                             <div class="row">  
                                <div class="col-md-6">
                                  <label for="price">Price</label>
                                  <input class="form-control" type=number step=0.01  id="price" name="price" value="{{$article->price}}" required>
                                </div>
                             </div>
                             <br>
                             <button class="btn btn-primary  btn-lg"  onclick="if(window.confirm('Do you really want to save?')){return true;}else{return false;}">
                               Edit
                             </button>
                          </div>
                     </form>
                     
          
     
      
    </body>
</html>
