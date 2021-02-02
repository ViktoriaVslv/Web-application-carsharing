
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Каршеринг</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
    <body>
        <form action="index.php" method="post" name="factoriesForm">
                <button type="Submit" name="page1" value=""> Выйти</button><br><br>
        </form>
        <div align="center">
            <h1>Каршеринг</h1>
            {if $role == "noAuto"}
                <form action="index.php" method="post" name="modelsForm">
                    <button type="Submit" name="page" value="auto"> Автомобили </button><br><br>
                </form>
                <form action="" method="post" name="typeForm">
                    <button type="Submit" name="page" value="model1"> Марки автомобилей </button><br><br>
                </form>
            {/if}
           
            {if $role == "Auto"}
                <form action="index.php" method="post" name="modelsForm">
                    <button type="Submit" name="page" value="auto"> Автомобили </button><br><br>
                </form>
                <form action="" method="post" name="typeForm">
                    <button type="Submit" name="page" value="model1"> Марки автомобилей </button><br><br>
                </form>
                <form action="" method="post" name="ordersForm">
                    <button type="Submit" name="page" value="orders"> Заказы </button><br><br>
                </form>
            {/if}

            {if $role == "Admin"}
                 <form action="index.php" method="post" name="modelsForm">
                    <button type="Submit" name="page" value="auto"> Автомобили </button><br><br>
                </form>
                <form action="" method="post" name="typeForm">
                    <button type="Submit" name="page" value="model1"> Марки автомобилей </button><br><br>
                </form>
                   <form action="index.php" method="post" name="cityForm">
                <button type="Submit" name="page" value="city"> Города </button><br><br>
                </form>

                <form action="" method="post" name="workersForm">
                    <button type="Submit" name="page" value="workers"> Работники  </button><br><br>
                </form>

                <form action="" method="post" name="clientsForm">
                    <button type="Submit" name="page" value="clients"> Клиенты </button><br><br>
                </form>

                <form action="" method="post" name="ordersForm">
                    <button type="Submit" name="page" value="orders"> Заказы </button><br><br>
                </form>
                <form action="" method="post" name="ordersForm">
                <button type="Submit" name="page" value="users"> Пользователи </button><br><br>
                </form>
            {/if}
        
        </div>
    </body>
</html>