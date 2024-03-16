<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickNote</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <style>
      body{
        background-color: #eee2dc;
        font-family: sans-serif
      }
    </style>
</head>
<body>

 {{-- aouth starts here --}}
   @auth
       

   {{-- nav stats here --}}
   <div  class="container-fluid ">
    <div  class="row">
      <div class="col ">
        <h4 class="mt-3 "><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-journal-plus abc" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
          <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
          <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
        </svg> QuickNote</h4>
      </div>
      <div class="col d-flex justify-content-end">
        <form action="/logout" method="POST">
          @csrf
        <button class="btn mt-3 btn-outline-dark"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
          <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
        </svg> Logout
        </button>
      </form>
      </div>
    </div>
   </div>
   {{-- navbar ends here --}}

     
       
   
       <div class="container-fluid">
        <h4 class="text-center mt-4">Create Notes</h4>
        <form action="/create-post" method="POST">
        @csrf
        <div class="form-group">
          <h4><label class="mx-3 " for="Title">Title:</label></h4>
        <input id="Title" class="form-control m-3" style="width: 80%;" type="text" name="title" placeholder="title..." value="{{ old('title')}}">
        @error('title')
         <small class=" m-3 form-text">{{$message}}</small>
        @enderror
        </div>
         
        <div class="form-group">
          <h4 class="mx-3 " for="Body">Description:</h4>
        <textarea id="Body" cols="5" rows="5" class="form-control mx-3" style="width: 80%" name="body" placeholder="Content..." value="{{ old('body') }}" ></textarea>
        @error('body')
        <small class=" m-3 form-text">{{$message}}</small>
         @enderror
        </div>
        <button class="btn btn-outline-dark m-3">Save Note</button>
    </form>
    </div>


    <div class="container-fluid">
      <h4 class="text-center mt-3">All Notes</h4>
        @foreach($posts as $post)
         <div class="mb-3" style="background-color:white; border-radius:10px; padding:10px; margin:10px;">
        <h3>{{$post['title']}}</h3>
         <h5 class="text-secondary"> {{$post['body']}}</h5>
        <p><a class="btn btn-outline-dark" href="/edit-post/{{$post->id}}">Edit <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
        </svg></a>
        <form action="/delete-post/{{$post->id}}" method="POST">
          @csrf
          @method('DELETE')
         <button class="btn btn-outline-dark">Delete <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
        </svg></button>
        </form>
        <p>
        </div>
        @endforeach
    </div>

{{-- else stats here --}}
   @else
   {{-- to show error --}}
   {{-- @if($errors->any())
   @foreach($errors->all() as $error)
   <div class="alert alert-danger" role="alert">
    {{$error}}
  </div>
   @endforeach
   @endif --}}

   {{-- navbar stats here --}}
   <nav style="background-color: #eee2dc" class="navbar navbar-expand-lg b-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-journal-plus abc" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
      </svg>  QuickNote
        
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Link</a>
          </li>
         
        </ul>
           <button style="background-color: #" class="btn btn-dark  mx-3">Sign in</button>
           <a class="btn btn-outline-dark" href="/register-user">Sign up</a>

      </div>
    </div>
  </nav>
   {{-- navbar ends here --}}




  <div  class="container-fluid d-flex justify-content-center align-items-center" style="margin-top: 125px; margin-bottom:70px;">
    <div class="row" style="width: 90%; background-color:#eee2dc" >
      <div class="col-lg-12">
    <div class="card shadow-lg p-3 mb-5 g-body rounded"  style="background-color: #eee2dc;";>
    <div class="card-body">
      <h2 class="card-title text-center">Login</h2>
    <form action="/login" method="POST">
      @csrf
      <div class="form-group">
        <label for="login">Name:</label>
      <input id="login" class="form-control mb-3" name="login_name" type="text" placeholder="name" value="{{ old('login_name') }}">
      @error('login_name')
      <small  class="form-text">{{$message}} </small>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="password">Password:</label>
      <input id="password" class="form-control mb-3" name="login_password" type="password" placeholder="Enter password" value="{{ old('login_password') }}">
      @error('login_password')
        <small class="form-text">{{$message}}</small>
        @enderror
      </div>
     <button class="btn btn-outline-dark">Login <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
      <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
    </svg></button>
     <div class="text-center mt-3"><span>No Account? </span><a href="/register-user">Sign up</a></div>
    </form>
    </div>
  </div>
</div>
</div>
  </div>
   
   @endauth
{{-- auth ends here --}}


   <script src="/bootstrap/js/bootstrap.js"></script>
   <footer>
    <hr class="">
    <p class="text-center">Created By<a href="https://Ganesh-Ghadi.github.io" target="_blank"> Ganesh</a> |
    <a class="text-dark" href="https://github.com/Ganesh-Ghadi"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
      <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
    </svg></a>
  </p>
   </footer>
</body>
</html>
