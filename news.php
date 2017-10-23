<?php require_once(dirname(__FILE__).'/include/config.inc.php');
$cid = empty($cid) ? 15 : intval($cid);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻资讯-奥昇信息科技有限公司</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/solution.css">
<link rel="stylesheet" href="css/solutionshow.css">
<link rel="stylesheet" href="templates/default/style/webstyle.css" type="text/css" />
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/slideplay.js"></script>
<script type="text/javascript" src="templates/default/js/srcollimg.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
</head>
<body>
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
<div class="titleImg">
        <?php
        $row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=20");
        if(isset($row['id']))
        {
          //获取缩略图地址
          if($row['picurl']!='')
            $picurl = $row['picurl'];
          else
            $picurl = 'templates/default/images/nofoundpic.gif';
        ?>
  <img src="<?php echo $row['picurl']; ?>" alt="">
  <?php
  }
  ?>
</div>
<div class="solutionTitle">
  <p><?php echo GetCatName($cid); ?></p>
</div>
<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=17 AND delstate='' AND checkinfo=true ORDER BY orderid ASC limit 0,3");
        while($row = $dosql->GetArray())
        {
          //获取链接地址
          if($row['linkurl']=='' and $cfg_isreurl!='Y')
            $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
          else if($cfg_isreurl=='Y')
            $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
          else
            $gourl = $row['linkurl'];

          if($row['picurl']!='')
            $picurl = $row['picurl'];
          else
            $picurl = 'templates/default/images/nofoundpic.gif';
        ?>
<div class="solutionBox"><a href="<?php echo $gourl; ?>">
  <img src="<?php echo $row['picurl']; ?>" alt="">
  <div>
	<p class="solutionPone"><?php echo $row['title']; ?></p>
	<p class="solutionPtwo">时间:2017-03-28</p>
	<p class="solutionPthree"><?php echo $row['description']; ?></p>
  </div>
  </a>
</div>
<?php
}
?>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>