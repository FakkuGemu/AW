<?php include 'head.php';?>

<style> <?php include '../web/css/fontello.css'?> </style>
<style> <?php include '../web/main.css'?> </style>

<section>
    <header>
        <span id="logo">WEABOO</span> Rejestracja <?php include 'logout.php'?>
    </header>

    <?php include 'nav.php'?>
    <?php ?>

    <article>
        <form action="/register/new" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="email">E-mail: </label></td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td><label for="login">Login: </label></td>
                    <td><input type="text" name="login"></td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><label for="rep_password">Repeat Password: </label></td>
                    <td><input type="password" name="rep_password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Register"></td>
                </tr>
            </table>
            <aside class="flash"><?php include 'flash.php' ?></aside>

        </form>
    </article>

    <?php include'footer.php';?>

