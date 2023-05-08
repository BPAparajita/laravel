<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="/css/style.css">
</head>
<body >
<div class="container form-group">
    <form action="{{route('user.checkuser')}}" method="post" class="formm">
        @if(Session::get('fail'))
         <div class="alert alert-danger">
            {{Session::get('fail')}}
         </div>
        @endif
        @if(Session::get('success'))
         <div class="alert alert-danger">
            {{Session::get('successs')}}
         </div>
        @endif
    @csrf
    <header class="hdr">login</header>
        <div class="input-group">
            <input type="email" placeholder="Enter your email" name="email">
        </div>
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
        <div class="input-group">
            <input type="password" placeholder="Enter your Password" name="password">
        </div>
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
        <div class="input-group button-field">
            <button type="submit">Log in</button>
        </div>
        <div class="input-group input-link">
            <span class="span">Don't have an account ? </span><a href="/user/register">Signup</a>
        </div>
    </form>
</div>
</body>
</html>