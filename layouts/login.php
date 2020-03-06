<?php include 'head.php';?>

<style> <?php include '../web/css/fontello.css'?> </style>
<style> <?php include '../web/main.css'?> </style>

<section>
    <header>
        <span id="logo">WEABOO</span> Logowanie <?php include 'logout.php'?>
    </header>

    <?php include 'nav.php'?>

    <article>
        <form action="/login" method="POST" enctype="multipart/form-data">
            <aside class="flash"><?php include 'flash.php' ?></aside>
            <?php if (!$_SESSION['user']) echo' 
            <table>
                <tr>
                    <td><label for="login">Login: </label></td>
                    <td><input type="text" name="login"></td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Login"></td>
                </tr>
            </table>
                '?>
        </form>
    </article>

    <?php include'footer.php';?>

