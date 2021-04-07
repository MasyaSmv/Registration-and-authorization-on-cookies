<!DOCTYPE html>
<html lang="ru">
<link>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MasyaSm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"></link> <!-- Подключение BootStrap -->
  <link rel="stylesheet" href="css/style.css"> <!-- Подключение файла стилей -->
  <script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</head>
<body>
<h1>By MasyaSm)</h1>
  <div class="container mt-4"> <!-- Первый контейнер с формами -->
  <?php
    if(!isset($_COOKIE['user']) ):
  ?>
    <div class="row"> <!-- Контейнер с формами авторизации -->
      <div class="col"> <!-- //Контейнер регистрации -->
      <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Регистрация</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">Авторизация</button>
      </div><br>
      <div id="London" class="tabcontent">
      <form action="validation/chek.php" method="post">
      <input type="type=text" class="form-control" name="login" id="login" placeholder="Ввеите логин"><br>
      <input type="type=password" class="form-control" name="pass" id="pass" placeholder="Ввеите пароль"><br>
      <input type="type=password" class="form-control" name="pass-2" id="pass-2" placeholder="Повторите пароль"><br>
      <input type="type=text" class="form-control" name="name" id="name" placeholder="Ввеите имя"><br>
      <input type="type=text" class="form-control" name="mail" id="mail" placeholder="Ввеите почту"><br>
      <button class="btn btn-success" type="submit">Зарегистрироваться</button>
      </form>
      </div>
      </div>
      <div id="Paris" class="tabcontent">
      <div class="col"> <!-- Контейнер авторизациии -->
      <form action="validation/auth.php" method="post">
      <input type="type=text" class="form-control" name="login" id="login" placeholder="Ввеите логин"><br>
      <input type="type=password" class="form-control" name="pass" id="pass" placeholder="Ввеите пароль"><br>
      <button class="btn btn-success" type="submit">Войти</button>
      </form>
      </div>
      </div>
    </div>
  <?php else:

  echo $_COOKIE['user'];
  //header('Location: http://localhost/MasyaSm/validation/congratulations.html')
  ?>
  <a href="http://localhost/MasyaSm/outh.php">Exit</a>
  <?php endif; ?>
  </div>

</body>
</html>
