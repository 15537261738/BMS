<?php 
	require_once("config.php");
	if(!check_reader())exit();
	$tag = 1;
	
	
	$lend_id = $_SESSION['reader_id'];
	
	//�������ݿ�ģ��
	$serverName = "localhost";
    $uid = "sa";
    $pwd = "123456";
 
    $connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"MBOOK");
 
    $conn = sqlsrv_connect( $serverName,$connectionInfo);
	sqlsrv_query($conn, "set names GB2312");
	
	$sql  = "SELECT * FROM TReader WHERE ����֤��='$lend_id'";
	
	$result        =  sqlsrv_query($conn ,$sql);
	$row           =  sqlsrv_fetch($result);
	$name          =  sqlsrv_get_field( $result,2);
	$sex           =  sqlsrv_get_field( $result,3);
	
	$sex    =   ($sex==1)? "��":"Ů"; 
	
	$birthdate     =  sqlsrv_get_field( $result,4,SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
	$major         =  sqlsrv_get_field( $result,5);
	$book_lend_num =  sqlsrv_get_field( $result,6);
	$photo         =  sqlsrv_get_field( $result,7);
	$comment       =  sqlsrv_get_field( $result,8);
	$contact       =  sqlsrv_get_field( $result,9,SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
	
	sqlsrv_close($conn);
?>
<?php require_once("top_menu_reader.php");?>
    <!--����ģ��-->
    <div class="container">
		<div class="content_display_user">
            <table class="table table-bordered">
                    <thead>
                        <th colspan="3"><p class="text-center">������Ϣ��</p></th>
                    </thead>
                    <tbody>
                    	<tr>
                        	<td class="span3"><strong>����֤��</strong></td>
                        	<td class="span3"><?php echo $lend_id?></td>
                            <td class="span6" rowspan="6" style="padding-left:20px"><img src="image.php?type=reader&id=<?php echo $lend_id;?>" width="300px" height="200px"></td>
                        </tr>
                    	<tr>
                        	<td><strong>����</strong></td>
                        	<td><?php echo $name;?></td>
                        </tr>
                    	<tr>
                        	<td><strong>�Ա�</strong></td>
                        	<td><?php echo $sex;?></td>
                        </tr>
                    	<tr>
                        	<td><strong>רҵ</strong></td>
                        	<td><?php echo $major;?></td>
                        </tr>
                    	<tr>
                        	<td><strong>��������</strong></td>
                        	<td><?php echo $birthdate;?></td>
                        </tr>
                    	<tr>
                        	<td><strong>������</strong></td>
                        	<td><?php echo $book_lend_num;?></td>
                        </tr>
                    	<tr>
                        	<td><strong>��ϵ��ʽ</strong></td>
                        	<td colspan="2"><?php echo nl2br(htmlspecialchars($contact));?></td>
                        </tr>
                        <tr>
                        	<td><strong>��ע</strong></td>
                        	<td colspan="2"><?php echo $comment;?></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    
        <!--Ҳҳ��ģ��-->
        
       <div class="container footer">
           <hr>
           <p class="text-center text-info">��Ȩ����<sup>&copy;</sup>  ɽ��ʦ����ѧ ��Ϣ��ѧ�빤��ѧԺ 2011�� ���� ����</p>
       </div>
   </div>
  </body>
</html>