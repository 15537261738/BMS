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
		<div class="container">
        <div class="borrow_form span10 offset1">
        <form class="form-inline" method="post" name="borrow" action="fun.php?cmd=borrow">
        ISBN��<input type="text" name="isbn" class="input-medium" required />
        &nbsp;&nbsp; &nbsp;&nbsp;
        ͼ��ID��<input type="text" name="book_id" class="input-small" required />
        &nbsp;&nbsp; &nbsp;&nbsp;
        ����֤�ţ�<input type="text" name="lend_id" class="input-small" required />
        &nbsp;&nbsp; &nbsp;&nbsp;
            <input type="hidden" name="search" value="sub" />
        <input  type="submit" class="btn" id="search" value="����ͼ��">
        </form>
        </div>
        </div>
        <div class="container">
        <div class="content-list">
<?php
		$serverName = "localhost";
		$uid = "sa";
		$pwd = "123456";
	 
		$connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"MBOOK");
	 
		$conn = sqlsrv_connect( $serverName,$connectionInfo);
		sqlsrv_query($conn, "set names GB2312");

		
		$sql = "SELECT * FROM TLend ORDER BY ����ʱ�� DESC";
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
									$lend_id     = sqlsrv_get_field( $result,0);
									$isbn        = sqlsrv_get_field( $result,1);
									$book_id     = sqlsrv_get_field( $result,2);
									$borrow_time = sqlsrv_get_field( $result,3,SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
									$return_time = sqlsrv_get_field( $result,4,SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
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
</div> 
        <!--Ҳҳ��ģ��-->
        
       <div class="container footer">
           <hr>
           <p class="text-center text-info">��Ȩ����<sup>&copy;</sup>  ɽ��ʦ����ѧ ��Ϣ��ѧ�빤��ѧԺ 2011�� ���� ����</p>
       </div>
   </div>
  </body>
  <script>
    $("ul.nav li:contains('����ͼ��')").addClass("active").siblings().removeClass("active");
	
	/*$("button#search").click(function(){
		if($("form[name=borrow] :input[name=isbn]").val()=="")
		{
			alert('ISBN����Ϊ��');
			return false;
		}
		if($("form[name=borrow] :input[name=book_id]").val()=="")
		{
			alert('ͼ��ID����Ϊ��');
			return false;
		}
		if($("form[name=borrow] :input[name=lend_id]").val()=="")
		{
			alert('����֤�Ų���Ϊ��');
			return false;
		}
	});
	*/
	
  </script>
</html>