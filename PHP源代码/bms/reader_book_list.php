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
        
        $sql = "SELECT ISBN,����,������,�����  FROM  TBook";
        $result = sqlsrv_query($conn ,$sql);
        
    ?>
    <div class="content_list_user">
        <table class="table table-hover table-bordered">
            <thead>
                <th>ISBN</th>
                <th>����</th>
                <th>������</th>
                <th>�����</th>
                <th>�鿴</th>
            </thead>
            <tbody>
                <?php
                    while(($row=sqlsrv_fetch_array($result)))
                    {
                        $isbn      = $row['ISBN'];
                        $bookname  = $row['����'];
                        $author    = $row['������'];
                        $store_num = $row['�����'];
                        echo "<tr>";
                        echo "<td>".$isbn."</td>"."<td>��".$bookname."��</td>"."<td>".$author."</td>"."<td>".$store_num."</td>";
                        echo "<td><a href=\"reader_book_display.php?isbn=$isbn\">�鿴</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
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
    $("ul.nav li:contains('ͼ���б�')").addClass("active").siblings().removeClass("active");
  </script>
</html>