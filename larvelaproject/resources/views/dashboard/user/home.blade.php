
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">
            	<a href="#">Home</a>
            </li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
	          <li>
	          	<a href="{{('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#logoutModal">logout</a>
              <form action="/logout" method="post" class="d-none" id="logout-form">
                @csrf

              </form>
	          </li>
          </ul>
        </div>
    </div>
</body>
</html>