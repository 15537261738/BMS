<?php 
	require_once("config.php");
	if(!check_reader())
	{
		echo "<script>window.location.href='login.php';</script>";
		exit();
	}
	$tag = 1;
?>
<?php require_once("top_menu_reader.php");?>
    <!--����ģ��-->
    <div class="container">
	<?php
        if(!$tag)exit();
        $serverName = "localhost";
        $uid = "sa";
        $pwd = "123456";
     
        $connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"MBOOK");
     
        $conn = sqlsrv_connect( $serverName,$connectionInfo);
        sqlsrv_query($conn, "set names GB2312");
		
		$reader_id = $_SESSION['reader_id'];
		
		$sql    = "SELECT * FROM TReader WHERE ����֤��='$reader_id'";
		$result = sqlsrv_query($conn ,$sql);
		$row    = sqlsrv_fetch_array($result);
		
        $sql = "SELECT *  FROM  RBL WHERE ����֤��='$reader_id'";
        $result = sqlsrv_query($conn ,$sql);
        
    ?>
    <div class="content_current_borrow">
    	<p>���ߣ�<?php echo $row['����'];?>���ã�</p>
        <p class="text-info">��һ������ͼ�飺<?php echo $row['������'];?>����</p>
        <?php if($row['������']>0)
		{
		?>
        <p style="margin-bottom:30px;">���Ľ�����Ϣ���£�</p>
        <table class="table table-hover table-bordered">
            <thead>
                <th>ISBN</th>
                <th>����</th>
                <th>ͼ��ID</th>
                <th>����ʱ��</th>
                <th>����ʱ��</th>
                <th>�鿴</th>
            </thead>
            <tbody>
                <?php
                   while(($row = sqlsrv_fetch($result)))
				   {
						$isbn        = sqlsrv_get_field( $result,3);
						$book_name   = sqlsrv_get_field( $result,4);
						$publisher   = sqlsrv_get_field( $result,5);
						$price       = sqlsrv_get_field( $result,6);
						$book_id     = sqlsrv_get_field( $result,7);
						$borrow_time = sqlsrv_get_field( $result,8,SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
						$return_time = sqlsrv_get_field( $result,9,SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
                        echo "<tr>";
                        echo "<td>".$isbn."</td>"."<td>��".$book_name."��</td>"."<td>".$book_id."</td>"."<td>".$borrow_time."</td>"."<td>".$return_time."</td>";
                        echo "<td><a href=\"reader_book_display.php?isbn=$isbn\">�鿴</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
       <?
		}
		?>
    </div>    
    <?php 	sqlsrv_close($conn);?>
    </div>
    
        <!--Ҳҳ��ģ��-->
        
       <div class="container footer">
           <hr>
           <p class="text-center text-info">��Ȩ����<sup>&copy;</sup>  ɽ��ʦ����ѧ ��Ϣ��ѧ�빤��ѧԺ 2011�� ���� ����</p>
       </div>
   </div>
  </body>
  <script>
    $("ul.nav li:contains('��ǰ����')").addClass("active").siblings().removeClass("active");
  </script>
</html>