<?php require_once(dirname(__FILE__).'/include/config.inc.php');
$cid = empty($cid) ? 8 : intval($cid);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>案例展示-奥昇信息科技有限公司</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/solution.css">
<link rel="stylesheet" href="css/case.css">
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
        $row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=21");
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
<div class="casebox">
  <div class="container">
    <div class="row">
<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=8 AND delstate='' AND checkinfo=true ORDER BY orderid ASC");
        while($row = $dosql->GetArray())
        {
          //获取链接地址
          if($row['linkurl']=='' and $cfg_isreurl!='Y')
            $gourl = 'caseshow.php?cid='.$row['classid'].'&id='.$row['id'];
          else if($cfg_isreurl=='Y')
            $gourl = 'caseshow-'.$row['classid'].'-'.$row['id'].'-1.html';
          else
            $gourl = $row['linkurl'];

          if($row['picurl']!='')
            $picurl = $row['picurl'];
          else
            $picurl = 'templates/default/images/nofoundpic.gif';
        ?>
      <div class="col-xs-4 col-md-4 col-lg-4">
      	<div class="caseboxS"><a href="<?php echo $gourl; ?>">
        <img src="<?php echo $row['picurl']; ?>">
        <p><?php echo $row['title']; ?></p>
        </div></a>
      </div>
      <?php
		}
		?>
    </div>
  </div>
</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>