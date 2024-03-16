<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuickNote- Register</title>
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


{{-- navbar stats here --}}
<nav style="background-color: #eee2dc;" class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-journal-plus abc" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
      <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
      <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
    </svg>  QuickNote</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
       
      </ul>
      <a class="btn btn-outline-dark mx-3" href="/">Sign in</a>
         <button class="btn btn-dark">Sign up</button>

    </div>
  </div>
</nav>
 {{-- navbar ends here --}}






    <div class="container-fluid d-flex justify-content-center align-items-center" style="margin-top: 104px; margin-bottom:px; " >
      <div class="row" style="width: 90%; ">
        <div class="col-lg-12">
          <div class="card shadow-lg p-3 mb-5  rounded" style="background-color:#eee2dc;" >
            <div class="card-body">
        <h2 class="card-title text-center">Sign up</h2>
        <form action="/register" method="POST">
          @csrf
          <div class="form-group">
            <label for="Name">Name:</label>
          <input id="Name" class="form-control mb-3" name="name" type="text" placeholder="name" value="{{ old('name') }}">
        @error('name')
            <small class="text-center form-text ">{{$message}}</small>
        @enderror
          </div>
        
          <div class="form-group">
            <label for="Email">Email:</label>
          <input id="Email" class="form-control mb-3"  name="email" type="text" placeholder="email" value="{{ old('email') }}">
        @error('email')
           <small class=" form-text">{{$message}}</small>
        @enderror
          </div>

          <div class="form-group">
            <label for="Password">Password:</label>
          <input id="Password"  class="form-control mb-3"  name="password" type="password" placeholder="pasword" value="{{ old('password') }}">
          @error('password')
            <small class=" form-text">{{$message}}</small>
            @enderror
          </div>
       
         <button class="btn btn-outline-dark">Sign Up <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
          <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
        </svg></button>
         <div class="text-center mt-3"><span>Already a User? <a  href="/">Sign in</a></span></div>
         
        </form>
      </div>
      </div>
      </div>
      </div>
    </div>

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