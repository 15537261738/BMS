<meta charset="GB2312">
<?php
	if(!$tag)exit();
	$serverName = "localhost";
    $uid = "sa";
    $pwd = "123456";
 
    $connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"MBOOK");
 
    $conn = sqlsrv_connect( $serverName,$connectionInfo);
	sqlsrv_query($conn, "set names GB2312");
	
	$sql = "SELECT ����֤��,רҵ,����  FROM  TReader";
	$result = sqlsrv_query($conn ,$sql);
	
?>
<div class="content_list_user">
	<table class="table table-hover table-bordered">
		<thead>
        	<th>����֤��</th>
            <th>רҵ</th>
            <th>����</th>
            <th>�鿴</th>
            <th>�༭</th>
            <th>ɾ��</th>
        </thead>
        <tbody>
        	<?php
				while(($row=sqlsrv_fetch_array($result)))
				{
					$lend_id = $row['����֤��'];
					$major   = $row['רҵ'];
					$name    = $row['����'];
					echo "<tr>";
					echo "<td>".$lend_id."</td>"."<td>".$major."</td>"."<td>".$name."</td>";
					echo "<td><a href=\"user_display.php?id=$lend_id\">�鿴</a></td><td><a href=\"user_update.php?id=$lend_id\">�༭</a></td><td><a href=\"fun.php?cmd=delete_user&id=".trim($lend_id)."\" name=\"".trim($lend_id)."\" id=\"delete\">ɾ��</a></td>";
					echo "</tr>";
				}
			?>
        </tbody>
	</table>
</div>    
<?php 	sqlsrv_close($conn);?>