<?php 
	require_once("config.php");
	if(!check_user())
	{
		echo "<script>window.location.href='login.php';</script>";
		exit();
	}
	$tag = 1;
?>
<?php require_once("top_menu.php");?>
    <!--����ģ��-->
    <div class="container">
	<?php
		if($_GET['cmd'] == "add")
		{
			require_once("book_add.php");
		}
		if($_GET['cmd'] == "list" || $_GET['cmd']=="")
		{
			require_once("book_list.php");
		}
	?>
    </div>
    
        <!--Ҳҳ��ģ��-->
        
       <div class="container footer">
           <hr>
           <p class="text-center text-info">��Ȩ����<sup>&copy;</sup>  ɽ��ʦ����ѧ ��Ϣ��ѧ�빤��ѧԺ 2011�� ���� ����</p>
       </div>
   </div>
  </body>
  <script>
    $("ul.nav li:contains('ͼ�����')").addClass("active").siblings().removeClass("active");
    
	$('.form_date').datetimepicker({
			//language:  'fr',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
  </script>
</html>