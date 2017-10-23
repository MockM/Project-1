<?php require_once(dirname(__FILE__).'/include/config.inc.php');
$cid = empty($cid) ? 16 : intval($cid);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加入我们-奥昇信息科技有限公司</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/solution.css">
<link rel="stylesheet" href="css/case.css">
<link rel="stylesheet" href="css/about.css">
<link rel="stylesheet" href="css/join.css">
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
        $row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=23");
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
<div class="joinbox">
    <div class="jointop">
      <h2>前言</h2>
      <p>湖南奥昇信息技术有限公司专注于教育、医疗卫生等领域的软硬件开发、生产、销售、运营服务及相关大数据开发应用，为客户提供“软件+硬件+运营服务+资金”的专业综合性解决方案。 目前，公司已拥有几十项相关软件著作权，现又与多所高校及企事业单位形成产、学、研深度合作模式，助力创新研发生产、实践创新运营服务，旨在为教育、医疗卫生等领域提供一流的产品和服务</p>
      <h3>请输入职位<input type="text"><input type="submit" value="搜索"></h3>
    </div>
	<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=16 AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
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
    <div class="join">
      <h2><?php echo $row['title']; ?></h2>
      <h5><?php echo $row['description']; ?></h5>
      <p><?php echo $row['content']; ?></p>
      <p><span class="joinspan1">发布时间:</span><span class="joinspan2">2015-09-15</span> 有效时间:<span class="joinspan3">不限</span></p>
    </div>
    <?php
  	}
    ?>
</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>