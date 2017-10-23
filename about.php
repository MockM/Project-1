<?php require_once(dirname(__FILE__).'/include/config.inc.php');
$cid = empty($cid) ? 2 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于我们-奥昇信息科技有限公司</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/solution.css">
<link rel="stylesheet" href="css/case.css">
<link rel="stylesheet" href="css/about.css">
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
    $row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=22");
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
<div class="planbox">
  <div class="container">
    <div class="row">
      <div class=".col-xs-3 col-md-3 col-lg-3">
        <div class="AboutUsleft">
          <div class="AboutUslefttop">
            <img src="images/leftabout.png" alt="">
          </div>
          <div class="AboutUsleftbottom">
            <ul>
              <?php
                $dosql->Execute("SELECT * FROM `#@__info`,`#@__infoclass` WHERE `#@__info`.classid=`#@__infoclass`.id;");
                while($row = $dosql->GetArray())
                {
                if($row['linkurl']=='' and $cfg_isreurl!='Y')
                $gourl = 'about.php?cid='.$cid.'&tid='.$row['id'];
                else if($cfg_isreurl=='Y')
                $gourl = 'about-'.$cid.'-'.$row['id'].'-1.html';
              ?>
              <a href="<?php echo $gourl;?>" id="lista"><li id="list"><?php echo $row['classname'];?></li></a>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class=".col-xs-9 col-md-9 col-lg-9">
        <div class="AboutUsright">
        <?php
          if(empty($tid)) {
            $row=$dosql->GetOne("SELECT * FROM pmw_info WHERE classid=25");
          }
          else { 
            $row=$dosql->GetOne("SELECT * FROM pmw_info WHERE classid=$tid");
          }
        ?>
        <?php echo $row['content']; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>