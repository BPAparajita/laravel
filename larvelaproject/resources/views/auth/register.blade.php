<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container form-group">
    <form action="{{ route('user.createuser') }}" method="post" class="formm">
        @csrf
    <header class="hdr">Signup</header>
        <div class="input-group">
            <input type="text" placeholder="Enter your First name" name="name">
        </div>
        <div class="input-group">
            <input type="email" placeholder="Enter your email" name="email">
        </div>
        @if($errors->has('email'))  
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        <div class="input-group">
            <input type="password" name="password" placeholder="Create password" >   
        </div>
        @if ($errors->has('password'))
                 <span class="text-danger">{{ $errors->first('password') }}</span>
             @endif
        <div class="input-group">
            <input type="password" name="cnfmpwd" placeholder="Confirm password">
        </div>
        <div class="input-group button-field">
            <button type="submit">Sign up</button>

        </div>
        <div class="input-group input-link">
            <span>Allready have an account. </span><a href="/login">Login</a>
        </div>
    </form>
</div>
</body>
</html>