<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">operate</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

       @auth()
       <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts">posts</a>
        </li>


       <li class="nav-item">
          <a class="nav-link" href="/logout">logout</a>
        </li>





        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         {{auth()->user()->name}}
          </a>
          <ul class="dropdown-menu">

            <li><a class="dropdown-item" href="#">{{auth()->user()->email}}</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/profile">profile</a></li>
          </ul>
        </li>











      @else
      <li class="nav-item">
          <a class="nav-link" href="/login">login</a>
        </li>


 @endauth
        <!-- drop down -->


      </ul>

    </div>
  </div>
</nav>
</body>
</html>
