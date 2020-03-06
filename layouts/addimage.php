<?php include 'head.php';?>

<style> <?php include '../web/css/fontello.css'?> </style>
<style> <?php include '../web/main.css'?> </style>

<section>
    <header>
        <span id="logo">WEABOO</span> Dodaj Zdjęcie <?php include 'logout.php'?>
    </header>

    <?php include 'nav.php'?>

    <article>
        <form action="/image" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="title">Title: </label></td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td><label for="watermark">Watermark: </label></td>
                    <td><input type="text" name="watermark"></td>
                </tr>
                <tr>
                    <td><label for="author">Author: </label></td>
                    <td><input type="text" name="author"></td>
                </tr>
                <tr>
                    <td><label for="image">Image: </label></td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add image"></td>
                </tr>
            </table>
            <aside class="flash"><?php include 'flash.php' ?></aside>
        </form>
    </article>

<?php include'footer.php';?>

