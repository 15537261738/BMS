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
        <div class="span10 offset1">
        <form class="form-inline" method="post" action="" target="_self">
        ����������
            <select name="type">
              <option value="����">����</option>
              <option value="ISBN">ISBN</option>
              <option value="������">������</option>
              <option value="������">������</option>
            </select>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;�ؼ��֣�
            <input type="text" name="key_word" />
            <input type="hidden" name="search" value="sub" />
           &nbsp;&nbsp;  &nbsp;&nbsp;<button  type="submit" class="btn" id="search">��ѯ</button>
        </form>
        </div>
        </div>
        <div class="container">
        <div class="content-list">
<?php
	if($_POST['search'] == 'sub')
	{
		$serverName = "localhost";
		$uid = "sa";
		$pwd = "123456";
	 
		$connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"MBOOK");
	 
		$conn = sqlsrv_connect( $serverName,$connectionInfo);
		sqlsrv_query($conn, "set names GB2312");
		
		$type     = $_POST['type'];
		$type     = ($type == "")? "ISBN":$type;
		
		$key_word = $_POST['key_word'];
		
		$sql = "SELECT * FROM TBook WHERE $type like '%$key_word%'";
		$result = sqlsrv_query($conn ,$sql);
?>				
            <table class="table table-hover table-bordered">
                <thead>
                    <th>ISBN</th>
                    <th>����</th>
                    <th>������</th>
                    <th>�����</th>
                    <th>�鿴</th>
                    <th>�༭</th>
                    <th>ɾ��</th>
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
									echo "<td><a href=\"book_display.php?isbn=$isbn\">�鿴</a></td><td><a href=\"book_update.php?isbn=$isbn\">�༭</a></td><td><a href=\"fun.php?cmd=delete_book&isbn=".trim($isbn)."\">ɾ��</a></td>";
									echo "</tr>";

							}
?>
              </tbody>
            </table>
<?php
	}
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
    $("ul.nav li:contains('ͼ�����')").addClass("active").siblings().removeClass("active");
  </script>
</html>