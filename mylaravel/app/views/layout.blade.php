<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Company website</title>
</head>
<body>
  <ul>
    <li><a href="./">Home</a></li>
    <li><a href="./services">Services</a></li>
    <li><a href="./contact">Contact</a></li>
  </ul>

  @yield('content')							
  
  Company, {{ date('Y') }}						
</body>
</html>