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
		<div class="content_list_user ">
        <div class="container">
        <div class="span6 offset3">
        <form class="form-inline" method="post" action="fun.php?cmd=return"  name="borrow">
        ͼ��ID�� &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="book_id" class="input-medium" required />
            <input type="hidden" name="search" value="sub" />
            &nbsp;&nbsp;&nbsp;&nbsp;
        <button  type="submit" class="btn" id="search">�黹ͼ��</button>
        </form>
        </div>
        </div>
        <div class="container content-list">
<?php
		$serverName = "localhost";
		$uid = "sa";
		$pwd = "123456";
	 
		$connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"MBOOK");
	 
		$conn = sqlsrv_connect( $serverName,$connectionInfo);
		sqlsrv_query($conn, "set names GB2312");

		
		$sql = "SELECT * FROM HLend ORDER BY ����ʱ�� DESC";
		$result = sqlsrv_query($conn ,$sql);
?>				
            <table class="table table-hover table-bordered">
                <thead>
                    <th>ͼ��ISBN</th>
                    <th>ͼ��ID</th>
                    <th>����֤��</th>                    
                    <th>����ʱ��</th>
                    <th>Ӧ��ʱ��</th>
                </thead>
                <tbody>
<?php
						while(($row = sqlsrv_fetch($result)))
							{
									$lend_id     = sqlsrv_get_field( $result,1);
									$isbn        = sqlsrv_get_field( $result,2);
									$book_id     = sqlsrv_get_field( $result,3);
									$borrow_time = sqlsrv_get_field( $result,4,SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
									$return_time = sqlsrv_get_field( $result,5,SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
									echo "<tr>";
									echo "<td>".$isbn."</td>"."<td>".$book_id."</td>"."<td>".$lend_id."</td>"."<td>".$borrow_time."</td>"."<td class=\" text-info\">".$return_time."</td>";
									echo "</tr>";

							}
?>
              </tbody>
            </table>
<?php

?>
        </div>
    </div>
    
        <!--Ҳҳ��ģ��-->
        
       <div class="container footer">
           <hr>
           <p class="text-center text-info">��Ȩ����<sup>&copy;</sup>  ɽ��ʦ����ѧ ��Ϣ��ѧ�빤��ѧԺ 2011�� ���� ����</p>
       </div>
   </div>
  </body>
  <script>
    $("ul.nav li:contains('�黹ͼ��')").addClass("active").siblings().removeClass("active");
	
	$("button#search").click(function(){

		if($("form[name=borrow] :input[name=book_id]").val()=="")
		{
			alert('ͼ��ID����Ϊ��');
			return false;
		}
	});
	
  </script>
</html>