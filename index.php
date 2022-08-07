<?php
define('USERNAME','root');
define('PASS','mysql');
define('DNS','mysql:host=localhost;dbname=fontyab;charset=utf8');

$conn = new PDO(DNS, USERNAME, PASS);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-rtl.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header class="row">
            <?php 
            $query="SELECT * FROM menu";
            $results=$conn->query($query);
            $rows = $results->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                ?>
            <a href="project-2.php?id=<?php echo $row['id'];?>" class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                <?php echo $row['title']; ?>
            </a>
            <?php
            }
            ?>
            <img src="index.png" class="col-lg-2 col-md-2 col-sm-2 col-xs-3 pull-left">
        </header>

        <div class="row" id="intro">
            فونت یاب، مرجع دانلود فونت فارسی
        </div>

        <form class="row">
            <input type="text" class="col-lg-10 col-md-10 col-sm-10 col-xs-10" name="searchtext" placeholder="برای جستجوی فونت مورد نظر خود کلیک کنید">
            <button type="submit" class="col-lg-2 col-md-2 col-sm-2 col-xs-2" name="searchbutton"> کلیک کنید </button>
        </form>
        <?php

if(isset($_GET['searchbutton'])){
    $font = $_GET['searchtext'];
    $sql = 'SELECT * FROM fonts WHERE title LIKE :font';
    $query = $conn -> prepare($sql);
    $param = [':font' => "%$font%"];
    // $query -> bindParam(':font' , "%$font%" , PDO::PARAM_STR);
    $query -> execute($param);
    $results = $query -> fetchAll();
    if($query-> rowCount()> 0){

        foreach($results as $result){?>
            <ul class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <li> <?php echo $result['title'] ?></li>
        </ul>
        <?php
}
}
else{
    echo "فونت مورد نظر پیدا نشد";
}
// echo "<script> window.location.href='project-2.php'; </script>";
}

?>
        <div class="row" id="main">
            <div class="row">

                <h1 class="col-lg-4 col-md-4 col-sm-6 col-xs-9">
                    30 فونت فارسی برتر
                </h1>
            </div>

            <div class="row">
                <?php
                $query = "SELECT * FROM fonts";
                $results = $conn -> query($query);
                $rows = $results->fetchAll();
                foreach($rows as $row){?>

                <ul class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <li> <a href="fonts.php?id=<?php echo $row['id'];?>"> <?php echo $row['title'];?> </a> </li>
                </ul>
<?php }?>
            </div>
            <div class="row">
                <h1 class="col-lg-4 col-md-4 col-sm-6 col-xs-9">
                    جدیدترین فونتهای فارسی </h1>
            </div>

            <div class="row">
            <?php
                $query = "SELECT * FROM fonts ORDER BY id DESC";
                $results = $conn -> query($query);
                $rows = $results->fetchAll();
                foreach($rows as $row){?>

                <ul class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <li> <a href="fonts.php?id=<?php echo $row['id'];?>"> <?php echo $row['title'];?> </a> </li>
                </ul>
         <?php } ?>
            </div>
        </div>
        <div class="row" id="about">

            <b>          درباره فونت یاب: </b>

            <br/> سلام دوست من، خیلی خلاصه و مختصر میخوام که فونت یاب رو به شما معرفی کنم. فونت یاب یک مرجع سریع و کامل برای دانلود فونت فارسی هست. استفاده از فونت یاب و دانلود فونت از اون رایگان هست و هیچ هزینه‌ای برای شما نداره. شما به سادگی میتونین
            از قسمت جستجو، اسم فونت فارسی مد نظرتون رو یا مخفف انگلیسی اون رو مثل B Nazanin جستجو کنین تا خیلی سریع اون فونت برای شما نمایش داده بشه. همچنین اگر نیاز به تشخیص فونت فارسی از روی یک عکس داشتین میتونین به قسمت همه فونت‌ها مراجعه کنید و پیش
            نمایش کلیه فونت‌های موجود در سایت رو، با تصویر نوشته خودتون مقایسه کنین تا فونت مورد نظرتون رو پیدا کنین. فونت یاب از سال 1391 داره فعالیت میکنه و به لطف حمایت شما علاقه مندان به قلم فارسی تا به امروز راهش رو ادامه داده. اگر یک زمانی نیاز
            به فونتی داشتین که اسم اون رو نمیدونستین کافیه تصویر فونت را به اکانت تلگرام ما به آی دی @tarhan_admin ارسال کنین تا اگر تونستیم شما رو توی پیدا کردن اون فونت کمک کنیم.

        </div>
        <footer class="row">
            <a href="6" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-md-offset-1">
            ابزارها

        </a>
            <a href="6" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-md-offset-1">
            تبلیغات

        </a>
            <a href="6" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-md-offset-1">
            آمار و ارقام

        </a>
            <a href="6" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-md-offset-1">
            حامیان ما

        </a>
            <a href="6" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            حمایت از ما

        </a>
        </footer>
    </div>
</body>

</html>