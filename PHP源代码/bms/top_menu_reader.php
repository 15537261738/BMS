<?php
	if(!$tag)exit();
	?>
<!DOCTYPE html>
<html>
  <head>
    <title>��ӭ��½ͼ�����ϵͳ</title>
    <link rel="shortcut icon" href="./img/ICON.png" />
    <meta charset="GB2312">
  
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/qianshou.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <style type="text/css">
	      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav >li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav >li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav >li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav >li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>
  </head>
  <body>
  <div class="container" style="position:relative">
   	<!--ͨ��ͷ������-->
    <div class="container top-one">
        <div class="span8 offset1 con">
        <h2>ͼ����Ϣ����ϵͳ��BMS��</h2>
        </div>
	</div>
    
    <!--�˵�ģ��-->   
    
    <div class="container menu">
        <div class="navbar">
          <div class="navbar-inner">
            <ul class="nav">
              <li class="active"><a href="index_reader.php">������Ϣ</a></li>
              <li><a href="reader_update.php?id=<?php echo $lend_id;?>">�޸ĸ�����Ϣ</a></li>
               <li><a href="reader_book_list">ͼ���б�</a></li>
              <li><a href="reader_book_search.php">ͼ���ѯ</a></li>
              <li><a href="reader_borrow_info.php">��ǰ����</a></li>
              <li><a href="fun.php?cmd=logout">ע���˻�</a></li>
            </ul>
          </div>
        </div>         
    </div>