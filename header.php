<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .b{
      background: linear-gradient(356deg, #0dcaf0, transparent);
    }
    .a{
      font-weight: bolder;
     font-family: cursive;
     font-size: 30px;
     background: linear-gradient(297deg,#d50808,#47ed02,#49574a);
    background-clip: text;
    color: transparent;
    }
    .n{
      font-size: 22px;
    font-family: cursive;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg b">
  <div class="container-fluid">
    <a class=" a" href="#">PHP CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="nav justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="n">
          <a class="nav-link" aria-current="page" href="add.php">Add</a>
        </li>
        <li class="n">
          <a class="nav-link" href="show.php">Show</a>
        </li>
        <li class="n">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>