<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奥昇信息科技有限公司</title>
<link rel="stylesheet" href="templates/default/style/webstyle.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/index.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/default/js/slideplay.js"></script>
<script type="text/javascript" src="templates/default/js/srcollimg.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header-->
<!--nav-->
<div class="navBox">
  <div class="nav">
    <ul>
      <?php echo Getnav(); ?>
    </ul>
  </div>
</div>
<!--/nav-->
<!-- banner-->
<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>   
  <div class="carousel-inner">
    <div class="item active">
      <?php
      $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=13 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,1");
      while($row = $dosql->GetArray())
      {
        if($row['linkurl'] != '')$gourl = $row['linkurl'];
        else $gourl = 'javascript:;';
      ?>
      <img src="<?php echo $row['picurl']?>" alt="First slide">
      <?php
      }
      ?>
    </div>
    <div class="item">
      <?php
      $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=13 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 1,1");
      while($row = $dosql->GetArray())
      {
        if($row['linkurl'] != '')$gourl = $row['linkurl'];
        else $gourl = 'javascript:;';
      ?>
      <img src="<?php echo $row['picurl']?>" alt="First slide">
      <?php
      }
      ?>
    </div>
    <div class="item">
      <?php
      $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=13 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 2,1");
      while($row = $dosql->GetArray())
      {
        if($row['linkurl'] != '')$gourl = $row['linkurl'];
        else $gourl = 'javascript:;';
      ?>
      <img src="<?php echo $row['picurl']?>" alt="First slide">
      <?php
      }
      ?>
    </div>
  </div>
  <a class="carousel-control left" href="#myCarousel" 
     data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" 
     data-slide="next">&rsaquo;</a>
</div>
<!-- /banner-->
<div class="content" id="section2">
  <h2><a href="solution.php">解决方案 / Solutions More</a></h2>
  <hr>
  <div class="container">
    <div class="row">
				<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=14 AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
				while($row = $dosql->GetArray())
				{
					//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'solutionshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'solutionshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];

					if($row['picurl']!='')
						$picurl = $row['picurl'];
					else
						$picurl = 'templates/default/images/nofoundpic.gif';
				?>
      <div class="col-xs-4 col-md-4 col-lg-4">
        <div class="imgBox"><a href="<?php echo $gourl; ?>">
          <img src="<?php echo $row['picurl']; ?>" alt="">
          <p><?php echo $row['title']; ?></p></a>
        </div>
      </div>
      <?php
  	  }
  ?>
    </div>
  </div>
</div>
<div class="abox" id="section3">
  <h2><a href="about.php">关于我们 / About Us More</a></h2>
  <hr>
   <div class="container">
    <div class="row">
      <div class="imgAboutBox">
    <?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=2 ORDER BY orderid ASC,4");
    while($row = $dosql->GetArray())
    {
    //获取链接地址
    if($row['linkurl']=='' and $cfg_isreurl!='Y')
      $gourl = 'joinshow.php?cid='.$row['classid'].'&id='.$row['id'];
    else if($cfg_isreurl=='Y')
      $gourl = 'joinshow-'.$row['classid'].'-'.$row['id'].'-1.html';
    else
      $gourl = $row['linkurl'];
    ?>
        <div class="col-xs-3 col-md-3 col-lg-3"><a href="about.php">
          <div class="imgAbout">
            <img src="<?php echo $row['picurl']; ?>">
            <p><?php echo $row['title'];?></p>
          </div>
        </div></a>
      <?php
      }
      ?>
      </div>
    </div>
  </div>
</div>
<div class="about" id="section4">
  <h2><a href="news.php">新闻资讯/NEWS More</a></h2>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-md-6 col-lg-6">
        <?php
        $row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=17");
        if(isset($row['id']))
        {
          //获取链接地址
          if($row['linkurl'] =='' and $cfg_isreurl!='Y')
            $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
          else if($cfg_isreurl=='Y')
            $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
          else
            $gourl = $row['linkurl'];

          //获取缩略图地址
          if($row['picurl']!='')
            $picurl = $row['picurl'];
          else
            $picurl = 'templates/default/images/nofoundpic.gif';
        ?>
        <div class="liLeft"><a href="<?php echo $gourl; ?>"><img class="imgLi" src="<?php echo $row['picurl']; ?>"><br><?php echo ReStrLen($row['description'],150); ?></a>
        </div>
    <?php
    }
    ?>
      </div>
      <div class="col-xs-6 col-md-6 col-lg-6">
        <div class="liRight">
          <ul class="ul">
  <?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=17 AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,8");
    while($row = $dosql->GetArray())
    {
    //获取链接地址
    if($row['linkurl']=='' and $cfg_isreurl!='Y')
      $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
    else if($cfg_isreurl=='Y')
      $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
    else
      $gourl = $row['linkurl'];
    ?>
            <li><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a><span><?php echo $row['keywords']; ?></span></li>
    <?php
    }
    ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="navRight" id="myScrollspy">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="#section1">首页</a></li>
        <li><a href="#section2">解决方案</a></li>
        <li><a href="#section3">关于我们</a></li>
        <li><a href="#section4">新闻资讯</a></li>
      </ul>
</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>