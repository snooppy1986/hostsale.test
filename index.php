<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dataTables.min.css">
    <title>Реєстрація</title>

</head>
<body>
<div class="container">
    <h1 class="mt-3 mb-3 text-success">Реєстрація користувача</h1>
    <div class="w-50 ">
        <!--message block-->
        <div class="alert " role="alert">
            <h4 class="alert-heading"></h4>
            <p class="message"></p>
            <hr>
        </div>
        <!--form add user-->
        <form id="user_form">
            <div class="form-group mt-3">
                <label for="name">Ім'я</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Ваше ім'я">

            </div>
            <div class="form-group mt-3">
                <label for="surname">Прізвище</label>
                <input name="surname" type="text" class="form-control" id="surname" placeholder="Ваше прізвище">

            </div>
            <div class="form-group mt-3">
                <label for="email">Електронна пошта</label>
                <input name="email" type="text" class="form-control" id="email" placeholder="Ваша електронна пошта">

            </div>
            <div class="form-group mt-3">
                <label for="password">Пароль</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Пароль">
            </div>
            <div class="form-group mt-3">
                <label for="password_confirmation">Підтвердити пароль</label>
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Повторіть пароль">
            </div>

            <button type="submit" class="btn btn-primary send-form mt-3">Створити</button>
        </form>
        <!--table with all users-->
        <table id="users_table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ім'я</th>
                    <th>Email</th>
                </tr>
            </thead>

        </table>
    </div>

</div>

</body>
<script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous">

</script>
<script src="js/script.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/dataTables.min.js"></script>
</html>
