<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>news</title>
    <link rel="stylesheet" href="/public/wy/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/wy/css/swiper.min.css">
    <link rel="stylesheet" href="/public/wy/css/index.css">
    <link rel="stylesheet" href="/public/wy/css/news1.css">
    <script src="/public/wy/js/jquery-3.1.1.slim.min.js"></script>
    <script src="/public/wy/js/bootstrap.min.js"></script>

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
    <div id="banner" class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="JavaScript:;">
                    <img src="/public/wy/images/newsBanner1.jpg" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="javascript:;">
                    <img src="/public/wy/images/newsBanner2.jpg" alt="">
                </a>
            </div>
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="container">
        <div class="news_content">
            <div class="conLeft">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><div class="con_left">
                    <div class="_img">
                        <img src="<?php echo ($l["picurl"]); ?>" alt="">
                    </div>
                    <div class="con_txt">
                        <div class="top">
                            <p class="title"><?php echo ($l["title"]); ?></p>
                            <span class="time">2016-4-29</span>
                        </div>
                        <p class="middle">
                            <?php echo ($l["content"]); ?>
                        </p>
                        <a href="javascript:;" class="outlink">View></a>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
               
                <div class="pager">
                    <span class="active">1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                </div>
                <div class="detail">
                    <div class="top">
                        <p class="title">6 Tips for Keeping Your Home Safe This Holiday Season</p>
                        <span class="time">2016-4-29</span>
                    </div>
                    <div class="detail_txt">
                        <p>Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI, nearly 400,000 burglarie，Yes, burglaries. According to the FBI, nearly 400,000 burglarie</p>
                        <h6>aaaaaaaaaaa</h6>
                        <p>
                            Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,
                        </p>
                        <h6>bbbbbbbbbbbb</h6>
                        <p>
                            Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,
                        </p>
                        <h6>ccccccccccccc</h6>
                        <p>
                            Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,Yes, burglaries. According to the FBI, nearly 400,000 burglarie,Yes, burglaries. According to the FBI,
                        </p>
                    </div>
                    <div class="btn_back">
                        <a href="javascript:;">＜＜Back </a>
                    </div>
                </div>
            </div>

            <div class="con_right">
                <div class="btn-group btn_select">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="txt">New menu</span>
                        <!--<span class="caret"></span>-->
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="./index.php?m=index&a=news">ALL</a>
                        </li>
                        <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li>
                            <a href="./index.php?m=index&a=news&id=<?php echo ($c["id"]); ?>"><?php echo ($c["classname"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
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


    

    <script src="js/jquery-3.1.1.slim.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var mySwiper = new Swiper ('.swiper-container', {
                direction: 'horizontal',
                loop: true,
                // 如果需要分页器
                pagination: '.swiper-pagination',
                autoplay:3000,
                autoplayDisableOnInteraction:false

            })

            $(".pager span").click(function(){
                $(this).addClass("active").siblings().removeClass("active");
            });

            $(".outlink").click(function(){
                $(".con_left").hide();
                $(".pager").hide();
                $(".detail").show(1000);
            });
            $(".detail .btn_back").click(function(){
                $(".detail").hide();
                $(".con_left").show();
                $(".pager").show();

            });

            var $bannerHeight = 367 * (document.body.clientWidth / 1920)+"px";
            console.log($bannerHeight);
            $(".banner8").css({"height":$bannerHeight});

        })
    </script>
</body>
</html>