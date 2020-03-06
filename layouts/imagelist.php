<?php include 'head.php'?>

<style> <?php include '../web/css/fontello.css'?> </style>
<style> <?php include '../web/main.css'?> </style>

<section>
    <header>
        <span id="logo">WEABOO</span> Galeria Zdjęć <?php include 'logout.php'?>
    </header>

    <?php include 'nav.php'?>

    <article>
        <div class="pagination">
            <?php
            if(!isset($_GET['page'])){
                $_GET['page'] = 1;
            }
            $skip = (intval($_GET['page'])-1)*2;

            $total = DB::get()->images->count();
            $per_page = 2;
            foreach ($images as $image) {
                if ($skip == 0) {
                    echo "<li><a href='/imgs/watermark/" . $image->name ."'> <img alt='" . $image->title . "' src='/imgs/thumbnail/" . $image->name . "'/></a><br/>";
                    echo "Tytuł: " . $image->title . "<br/>   Autor: " . $image->author . "</li><br/>";
                ?>
                <?php
                $per_page--;
                if ($per_page == 0)break;
                } else {
                    $skip--;
                }
            }?>

            <?php if($_GET['page']>intval($total)*$per_page){?>
            <a <?php $page = $_GET['page']?> href="?page=<?php echo $page+1?>">Strona <?php echo $page+1;}?></a>
            <?php echo $_GET['page'];?>
            <a <?php $page = $_GET['page']?> href="?page=<?php if($page>1) {echo $page-1?>">Strona <?php echo $page-1;}?></a>




        </div>
    </article>

    <?php include'footer.php';?>
