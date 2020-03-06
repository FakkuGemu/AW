<?php
if ($_SESSION['user']){
    echo '<form action="/logout" method="POST" enctype="multipart/form-data">
            <input class="logout" type="submit" name="submit" value="Logout"></td>
            </form>';
}