<meta charset="GB2312">
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
</div>    
<?php 	sqlsrv_close($conn);?>