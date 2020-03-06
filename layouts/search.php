<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <title>Weaboo</title>
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>


<style> <?php include '../web/css/fontello.css'?> </style>
<style> <?php include '../web/main.css'?> </style>

<section>
    <header>
        <span id="logo">WEABOO</span> Wyszukiwarka <?php include 'logout.php'?>
    </header>

    <?php include 'nav.php'?>
    <?php ?>

    <article>
        <form>
            Fragment tytułu: <input type="text" onkeyup="showHint(this.value)">
        </form>
        <p><span id="txtHint"></span></p>
    </article>

    <?php include'footer.php';?>

