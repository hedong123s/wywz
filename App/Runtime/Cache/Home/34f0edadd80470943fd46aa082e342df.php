<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/public/wy/css/index.css">
    <link rel="stylesheet" href="/public/wy/css/xiangqing.css">
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

    <div class="banner7">
        <img src="/public/wy/images/banner7.jpg" alt="">
    </div>
    <div class="container">
        <div class="pro_show">
            <div class="show1">
                <div class="showLeft">
                    <img src="<?php echo ($res["picurl"]); ?>" alt="">
                </div>
                <div class="showRight">
                    <p class="pro_title">Products Gallery</p>
                    <p class="pro_style">
                        <img src="<?php echo ($res["picurl"]); ?>" alt="">
                        <!--
                        <img src="/public/wy/images/xiangqing3.jpg" alt="">
                        <img src="/public/wy/images/xiangqing4.jpg" alt="">
                        <img src="/public/wy/images/xiangqing5.jpg" alt="">
                        <img src="/public/wy/images/xiangqing6.jpg" alt="">
                        <img src="/public/wy/images/xiangqing7.jpg" alt="">
                        -->
                    </p>
                    <p class="pro_name">
                        Champs Elysees型号或名称
                    </p>
                    <p class="pro_size">
                        SIZE : 600X600MM <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;800X800MM
                    </p>
                </div>
            </div>
            <div class="show2">
                <div class="showLeft">
                    <!--<img src="/public/wy/images/xiangqing9.jpg" alt="">-->
                </div>
                <div class="showRight">
                    <p class="pro_txt"><?php echo ($res["content"]); ?></p>
                </div>
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
  
    <script src="/public/wy/js/jquery-3.1.1.slim.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".pro_style img").click(function(){
                $(this).css({"border":"1px solid #066f39","margin-right":"23px","margin-bottom":"13px"})
                        .siblings().css({"margin-right":"25px","margin-bottom":"15px","border":"0"});
                $(".showLeft img").attr("src",$(this).attr("src"));
            })
        })
    </script>
</body>
</html>