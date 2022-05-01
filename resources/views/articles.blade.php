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
           
             
                      <form  action="{{ route('createarticle')}}" method="POST" >
                      @csrf
                        <div class="container">
                            <br>
                           <div class="row">
                             <div class="col-md-6">
                                 <h2><b>Add a new article</b></h2>
                             </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                  <label for="name">Name</label>
                                  <input  class="form-control" type="text"  id="name" name="name" required>
                                </div>
                             </div> 
                             <div class="row">  
                                <div class="col-md-6">
                                  <label for="price">Price</label>
                                  <input class="form-control" type=number step=0.01  id="price" name="price" required>
                                </div>
                             </div>
                             <br>
                             <button class="btn btn-primary  btn-lg"  onclick="if(window.confirm('Do you really want to save?')){return true;}else{return false;}">
                               Add an article
                             </button>
                          </div>
                     </form>
                     
            <br> 
             <!-- table begin-->
             <div class="container">
              <div class="row">
               <div class="col-md-6">  
                <h2><b>Articles</b></h2>
                <table class="table">
                 <thead>
                     <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th> Action </th>
                     </tr>
                  </thead>
                  <tbody >
                  @foreach($articles as $article) 
                    <tr>
                      <td id="id" name="id">{{ $article->id}}</td>
                      <td id="name" name="name">{{ $article->name}}</td>
                      <td id="price" name="price">{{ $article->price}}</td>
                      <td> 
                          <!--delete button-->
                          <form  action="{{ route('deletearticle',$article->id)}}" method="POST" > 
                           @csrf
                           <button class="btn btn-outline-danger"  onclick="if(window.confirm('Do you really want to delete the article?')){return true;}else{return false;}">
                           delete
                          </button>
                           </form>
                           <!--edit button-->
                           <a href="{{ route('article',$article->id) }}">
                            <button class="btn btn-outline-info">update  </button>
                           </a>
                        </td>
                     </tr>
                      @endforeach
                  
                 </tbody>
                </table>
              </div>
             </div>
            </div>
     
      
    </body>
</html>
