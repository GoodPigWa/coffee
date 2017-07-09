<?php
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");

$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
$sql = "select * from user where user_id=$user_id";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$username = $row['username'];
$image = $row['image'];
setcookie("image",$row['image']);
setcookie("username",$username);
unset($sql);
$image = isset($_COOKIE['image'])?$_COOKIE['image']:"";
$username = isset($_COOKIE['username'])?$_COOKIE['username']:"";
include('head.php');

if(!empty($keywords)){
    $where=" where coffname like'%".$keywords."%' or produce like '%$keywords%'";
}
else{
    $where = '';
}
$sql = "select count(coff_id) from coffee $where ";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);



?>
<!DOCTYPE html>
<html>
<head>
    <title>咖啡网页</title>
    <link href="css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
    <link rel="stylesheet" href="css/style.css">
    <style>

    body{
        /*background: #5a544b;*/
    }
    #navbar-fixed-top{
        background: #222;
        font-size: 1.3em;
        padding:20px;
    }
    ul.notes li div #gou{
        position: relative;
    }
    #active{
       text-align: center;
    }
    #active img{
        width: 900px;
        margin:0 auto;
        height:550px;
    }
    #gray-bg{
        margin-top: 5px;
        background: #5a544b;
        /*border:1px solid red;*/
    }
    .notes{
        /*border: 1px solid red;*/
    }
        </style>

</head>
<body>
     <!-- 轮播 -->
<div id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <?php
            $sql = "select * from coffee limit 0,1";
            $result = mysql_query($sql);
            while($row = mysql_fetch_assoc($result)){
                  ?>
            <div class="item active" id="active">
                <img src="<?php echo $row['img']?>" alt="First slide">
                <div class="carousel-caption"><?php echo $row['coffname']?></div>
            </div>

            <?php
        }
         ?>
          <?php
            $sql = "select * from coffee limit 1,3";
            $result = mysql_query($sql);
            while($row = mysql_fetch_assoc($result)){
                  ?>
            <div class="item" id="active">
                <img src="<?php echo $row['img']?>" alt="First slide">
                <div class="carousel-caption"><?php echo $row['coffname']?></div>
            </div>

            <?php
        }
         ?>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" 
        data-slide="prev">&lsaquo;
    </a>
    <a class="carousel-control right" href="#myCarousel" 
        data-slide="next">&rsaquo;
    </a>
</div>
      <!-- 图片  -->
<div class="gray-bg" id="gray-bg">
    <div class="row">
        <div class="col-sm-12">
            <?php
            $sql = " select * from coffee $where";
            $result = mysql_query($sql);
            while($row = mysql_fetch_assoc($result)){
             ?>   
                <ul class="notes">
                    <li>
                        <a href=sole.php?id=<?php echo $row['coff_id']?>>

                            <div>
                                <h4><?php echo $row['coffname'];?></h4>
                                <p><img width="150" src="<?php echo $row['img'];?>" alt=""></p>
                                <!-- <a href=cart.php?&coffname="<?php echo $row['coffname'];?>" id="gou" class='btn-cart btn btn-primary'>加入购物车</a> -->
                            </div>
                        </a>
                    </li>
                </ul>

            <?php
            }
            ?>
        </div>
    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.5"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</div>
</body>

</html> 