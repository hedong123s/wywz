<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>products</title>
    <link rel="stylesheet" href="/public/wy/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/wy/css/index.css">
    <link rel="stylesheet" href="/public/wy/css/products.css">
    <script src="/public/wy/js/jquery-3.1.1.slim.min.js"></script>
    <script src="/public/wy/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var $bannerHeight = 442 * (document.body.clientWidth / 1920)+"px";
            console.log($bannerHeight);
            $(".banner5").css({"height":$bannerHeight});
        })
    </script>
</head>
<body>
    
	<div  id="header">
        <h1>
            <a href="javascript:;"><img src="/public/wy/images/logo.png" alt=""></a>
        </h1>
        <div class="headerRight">
            <div class="links">
                <a href="index.php">HOME</a>
                <a href="index.php?m=index&a=catalog">CATALOG</a>
                <a href="index.php?m=index&a=products">PRODUCTS</a>
                <a href="index.php?m=index&a=news">NEWS</a>
                <a href="index.php?m=index&a=company">COMPANY</a>
            </div>
            <div class="down">
                <div class="downLeft">
                    <a class="txt1" href="index.php?m=product&a=ceramics">Ceramics</a>
                    <a class="txt2" href="index.php?m=product&a=sanitary"> Sanitary ware</a>
                </div>
                <div class="downRight">
                    <input type="text" placeholder="Search">
                    <button type="button"></button>
                </div>
            </div>
        </div>

</div>    

    <div class="conta">
        <div class="banner5">
            <img src="/public/wy/images/banner5.jpg" alt="">
        </div>
    </div>

    <div class="conta">
        <div class="middle">
            <h3>Ceramics</h3>
            <p class="txt1">he popular ceramics industry expanded towards the middle of the 19 century.</p>
            <p class="txt2">he popular ceramics industry expanded towards </p>
        </div>
    </div>
    <div class="conta">
        <div class="main">
            <div class="select">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="txt">Ceramics</span>
                        <b>∨</b>
                        <!--<span class="caret"></span>-->
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li class="last">
                            <a href="#">Ceramics</a>
                        </li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="txt">Ceramics</span>
                        <b>∨</b>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li class="last">
                            <a href="#">Ceramics</a>
                        </li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="txt">Ceramics</span>
                        <b>∨</b>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li>
                            <a href="#">Ceramics</a>
                        </li>
                        <li class="last">
                            <a href="#">Ceramics</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="_imgp">
                <a href="javascript:;">
                    <img src="/public/wy/images/products1.jpg" alt="">
                    <u>Rustic Tiles</u>
                </a>
                <a class="a_middle" href="javascript:;">
                    <img src="/public/wy/images/products2.jpg" alt="">
                    <u>Wood Like Tiles</u>
                </a>
                <a href="javascript:;">
                    <img src="/public/wy/images/products3.jpg" alt="">
                    <u>Marble Tiles </u>
                </a>
                <a href="javascript:;">
                    <img src="/public/wy/images/products4.jpg" alt="">
                    <u>MicroTiles</u>
                </a>
                <a class="a_middle"  href="javascript:;">
                    <img src="/public/wy/images/products5.jpg" alt="">
                    <u>Crystal Mosaic</u>
                </a>
            </div>
        </div>
    </div>

    	<div class="container">
        <div   id="Footer">
            <div class="top">
                <p>Dear visitors,Our staff will be glad to help you,with courtesy and competence <br> If you have any questions sugestions or comments? <br> U.S Phone: 1-（904）6669345</p>
                <p class="commit">
                    <a class="link1" href="javascript:;"><?php echo C('cfg_email');?></a>
                    <a class="link2" href="javascript:;"><?php echo C('cfg_scape');?></a>
                </p>
            </div>
            <div class="links">
                <p class="title">
                    <span>Ceramics</span>
                    <span>Sanitary ware</span>
                    <span>Company</span>
                </p>
                <ul class="list1">
                    <li><a href="javascript:;">Rustic Tiles</a></li>
                    <li><a href="javascript:;">Wood Like Tiles</a></li>
                    <li><a href="javascript:;">Marble Tiles</a></li>
                    <li><a href="javascript:;">Micro Crystal</a></li>
                    <li><a href="javascript:;">Mosaic</a></li>
                </ul>
                <ul class="list2">
                    <li><a href="javascript:;">Bathroom Cabinet</a></li>
                    <li><a href="javascript:;">Toilet</a></li>
                    <li><a href="javascript:;">Basin</a></li>
                    <li><a href="javascript:;">Shower Room</a></li>
                    <li><a href="javascript:;">Bathtu</a></li>
                    <li><a href="javascript:;">Faucet</a></li>
                    <li><a href="javascript:;">Sink</a></li>
                    <li><a href="javascript:;">Accessories</a></li>
                </ul>
                <ul class="list3">
                    <li><a href="javascript:;">Company Profile</a></li>
                    <li><a href="javascript:;">Brand</a></li>
                    <li><a href="javascript:;">History</a></li>
                    <li><a href="javascript:;">What’s New</a></li>
                    <li><a href="javascript:;">Online Catal</a></li>
                </ul>
                <div class="_img">
                    <img src="/public/wy/images/logo2.png" alt="">
                </div>
            </div>
            <div class="footer_down">
                <p class="txt"><?php echo C('cfg_copyright');?></p>
                <p class="outlink">
                    <span>Follow Us</span>
                    <a class="link1" href="javascript:;"></a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>