<?php 	session_start();?>
<meta charset="GB2312">
<?php 
	//�������ݿ�ģ��
	$serverName = "localhost";
    $uid = "sa";
    $pwd = "123456";
 
    $connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"MBOOK");
 
    $conn = sqlsrv_connect( $serverName,$connectionInfo);
	sqlsrv_query($conn, "set names GB2312");
	
	
	//ע���û�ģ��
	if($_GET['cmd'] == "logout")
	{
		session_destroy();
		echo "<script>window.location='login.php';</script>";
		exit();
	}
	
	//�黹ͼ��ģ��
	if($_GET['cmd'] == "return")
	{
		
		 $book_id  =  htmlspecialchars(trim($_POST['book_id']));
		
		 $sql = "DELETE FROM TLend WHERE ͼ��ID=$book_id";
		 $result = sqlsrv_query($conn , $sql);
		 $errors = sqlsrv_errors();
		 
 		 if($errors)
		 {
			 echo "<script>alert('����ʧ��');window.history.back(-1)</script>";
		 }
		 else	//�������ݳɹ�
		 {
			 echo "<script>alert('����ɹ�');window.location='book_return.php';</script>";
		 }
	}
	
	
	//����ͼ��ģ��
	if($_GET['cmd'] == "borrow")
	{
		
		 $isbn     =  htmlspecialchars(trim($_POST['isbn']));
		 $book_id  =  htmlspecialchars(trim($_POST['book_id']));
		 $lend_id  =  htmlspecialchars(trim($_POST['lend_id']));
		
		 $sql = "DECLARE @out_str char(30) DECLARE @con int EXEC @con = Book_Borrow '$lend_id','$isbn',$book_id,@out_str OUTPUT SELECT @con AS ����ֵ ,@out_str AS ������";
		 $result = sqlsrv_query($conn , $sql);
		 $row    = sqlsrv_fetch_array($result);
		 
		 $return_value = $row['����ֵ'];
		 $output       = $row['������'];
		  
		 if($outpur)
		 {
			 echo "<script>alert(\"����ͼ��ʧ�ܣ�ԭ���ǣ�$output\");</script>";
			 echo "<script>window.history.go(-1);</script>";
		 }
		 else	//�������ݳɹ�
		 {
			echo "<script>alert(\"����ͼ��ɹ�\");</script>";
			echo "<script>window.location='book_borrow.php';</script>";
		 }
	}
	
	//�������ݿ�ģ��
	if($_GET['cmd'] == "backup_database")
	{
		
		 $sql = "EXEC DB_backup 'C:\AppServ\www\bms\backup\backup.bak'";
		 $result = sqlsrv_query($conn , $sql);
		 $errors = sqlsrv_errors();
		 if( $errors[0][0] != '01000')
		 {
			 echo "<script>alert('fail to back up database');window.history.back(-1)</script>";
		 }
		 else	//�������ݳɹ�
		 {
			echo "<script>alert('succeed in backing up database');window.location='book_manage.php?cmd=list';</script>";
		 }
	}
	
	//ɾ��ͼ��ģ��
	if($_GET['cmd'] == "delete_book")
	{
		 $isbn    =  htmlspecialchars(trim($_GET['isbn']));
		
		 $sql = "DELETE FROM  TBook  WHERE ISBN = '$isbn'";
		 $result = sqlsrv_query($conn , stripslashes($sql));
		 
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "delete data error";
			 exit();	//��������ʧ��
		 }
		 else	//�������ݳɹ�
		 {
			echo "<script>window.location='book_manage.php?cmd=list';</script>";
		 }
	}
	
	//�޸�ͼ����Ϣģ��
	if($_GET['cmd'] == "update_book")
	{
		$isbn         =  htmlspecialchars(trim($_POST['isbn']));
		$type_num     =  htmlspecialchars(trim($_POST['type_num']));
		$bookname     =  htmlspecialchars(trim($_POST['bookname']));
		$author       =  htmlspecialchars(trim($_POST['author']));
		$publisher    =  htmlspecialchars(trim($_POST['publisher']));
		$publish_date =  htmlspecialchars(trim($_POST['publish_date']));
		$price        =  htmlspecialchars(trim($_POST['price']));
		$fuben_num    =  htmlspecialchars(trim($_POST['fuben_num']));
		$store_num    =  htmlspecialchars(trim($_POST['store_num']));
		$content_view =  htmlspecialchars(trim($_POST['content_view']));
		
		$photo_path =  htmlspecialchars(trim($_FILES['photo']['tmp_name']));
		
		 $sql = "UPDATE TBook SET ISBN = '$isbn',����� = '$type_num',���� = '$bookname',������ = '$author' ,������ = '$publisher' ,�������� = '$publish_date' ,�۸� = $price ,������ = $fuben_num,����� = $store_num ,������Ҫ='$content_view' WHERE ISBN = '$isbn'";
		 $result = sqlsrv_query($conn , stripslashes($sql));
		 if($_FILES['photo']['tmp_name'] != "")
		 { 
			 $sql = "UPDATE TBook SET  ������Ƭ =  (SELECT * FROM OPENROWSET(BULK '$photo_path',SINGLE_BLOB) AS note) WHERE ISBN = '$isbn'";
			 $result = sqlsrv_query($conn , $sql);
		 }
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "update book data error";
			 exit();	//��������ʧ��
		 }
		 else	//�������ݳɹ�
		 {
			echo "<script>window.location='book_manage.php?cmd=list';</script>";
		 }
	}	
	
    //����ͼ����Ϣģ��
	if($_GET['cmd'] == "add_book")
	{
		$isbn         =  htmlspecialchars(trim($_POST['isbn']));
		$type_num     =  htmlspecialchars(trim($_POST['type_num']));
		$bookname     =  htmlspecialchars(trim($_POST['bookname']));
		$author       =  htmlspecialchars(trim($_POST['author']));
		$publisher    =  htmlspecialchars(trim($_POST['publisher']));
		$publish_date =  htmlspecialchars(trim($_POST['publish_date']));
		$price        =  htmlspecialchars(trim($_POST['price']));
		$fuben_num    =  htmlspecialchars(trim($_POST['fuben_num']));
		$store_num    =  htmlspecialchars(trim($_POST['store_num']));
		$content_view =  htmlspecialchars(trim($_POST['content_view']));
		
		$photo_path =  htmlspecialchars(trim($_FILES['photo']['tmp_name']));
		
		
		$sql = "INSERT INTO TBook(ISBN,����,������,������,��������,�۸�,������,�����,�����,������Ҫ) VALUES('$isbn','$bookname','$author','$publisher','$publish_date',$price,$fuben_num,$store_num,'$type_num','$content_view')";
		$result = sqlsrv_query($conn , stripslashes($sql));
		
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "insert book info error<br/>";
			 echo $sql;
			 exit();	//��������ʧ��
		 }
		 
		 $sql = "EXEC Book_Generate '$isbn',$fuben_num";
		 $result = sqlsrv_query($conn , stripslashes($sql));
		
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "insert book_lend info error";
			 exit();	//��������ʧ��
		 }
		 
		 $sql = "UPDATE TBook SET  ������Ƭ =  (SELECT * FROM OPENROWSET(BULK '$photo_path',SINGLE_BLOB) AS note) WHERE ISBN = $isbn";
		 $result = sqlsrv_query($conn , $sql);
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "insert photo error";
			 exit();	//��������ʧ��
		 }
		 else	//�������ݳɹ�
		 {
			echo "<script>window.location='book_manage.php?cmd=list';</script>";
		 }
	}
		
	//ɾ���û�ģ��
	if($_GET['cmd'] == "delete_user")
	{
		$len_num    =  htmlspecialchars(trim($_GET['id']));
		
		if($len_num == "")exit();	//�������˱���
		
		 $sql = "DELETE FROM  TReader  WHERE ����֤�� = $len_num";
		 $result = sqlsrv_query($conn , stripslashes($sql));
		 
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "delete data error";
			 exit();	//��������ʧ��
		 }
		 else	//�������ݳɹ�
		 {
			 echo "<script>window.location='user_manage.php?cmd=list';</script>";
		 }
	}
	
	
	//�޸��û���Ϣģ��
	if($_GET['cmd'] == "update_user")
	{
		$len_num    =  htmlspecialchars(trim($_POST['len_num']));
		$name       =  htmlspecialchars(trim($_POST['name']));
		$password   =  htmlspecialchars(trim($_POST['password']));
		$major      =  htmlspecialchars(trim($_POST['major']));
		$sex        =  htmlspecialchars(trim($_POST['sex']));
		$sex        =  ($sex=="��")? 1:0;
		$birth_date =  htmlspecialchars(trim($_POST['birth_date']));
		$contact    =  trim($_POST['contact']);
		$comment    =  htmlspecialchars(trim($_POST['comment']));	
		$photo_path =  htmlspecialchars(trim($_FILES['photo']['tmp_name']));
		
		if($len_num == "")exit();	//�������˱���
		
		$sql = "UPDATE TReader SET ���� = '$name',���� = '$password',רҵ = '$major',�Ա� = $sex ,�������� = '$birth_date' ,��ע = '$comment' ,��ϵ��ʽ = '$contact' WHERE ����֤�� = '$len_num'";
		 $result = sqlsrv_query($conn , stripslashes($sql));
		 if($_FILES['photo']['tmp_name'] != "")
		 { 	
			 $sql = "UPDATE TReader SET  ��Ƭ =  (SELECT * FROM OPENROWSET(BULK '$photo_path',SINGLE_BLOB) AS note) WHERE ����֤�� = '$len_num'";
			 $result = sqlsrv_query($conn , $sql);
		 }
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "update data error";
			 exit();	//��������ʧ��
		 }
		 else	//�������ݳɹ�
		 {
			if($_GET['type']=="admin")
			{
				echo "<script>window.location='user_manage.php?cmd=list';</script>";
			}
			else if($_GET['type']=="reader")
			{
				echo "<script>window.location='index_reader.php';</script>";
			}
		 }
	}
	
	//�����û���Ϣģ��
	if($_GET['cmd'] == "add_user")
	{
		$len_num    =  htmlspecialchars(trim($_POST['len_num']));
		$name       =  htmlspecialchars(trim($_POST['name']));
		$password   =  htmlspecialchars(trim($_POST['password']));
		$major      =  htmlspecialchars(trim($_POST['major']));
		$sex        =  htmlspecialchars(trim($_POST['sex']));
		$sex        =  ($sex=="��")? 1:0;
		$birth_date =  htmlspecialchars(trim($_POST['birth_date']));
		$contact    =  $_POST['contact'];
		$comment    =  htmlspecialchars(trim($_POST['comment']));	
		$photo_path =  htmlspecialchars(trim($_FILES['photo']['tmp_name']));
		
		if($len_num == "")exit();	//�������˱���
		
		$sql = "INSERT INTO TReader(����֤��,����,����,רҵ,������,�Ա�,��������,��ϵ��ʽ,��ע) VALUES('$len_num','$name','$password','$major',0,$sex,'$birth_date','$contact','$comment')";
		$result = sqlsrv_query($conn , stripslashes($sql));
		
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "insert info error";
			 exit();	//��������ʧ��
		 }
		 $sql = "UPDATE TReader SET  ��Ƭ =  (SELECT * FROM OPENROWSET(BULK '$photo_path',SINGLE_BLOB) AS note) WHERE ����֤�� = $len_num";
		 $result = sqlsrv_query($conn , $sql);
		 if( ($errors = sqlsrv_errors() ) != null)
		 {
			 echo "insert photo error";
			 exit();	//��������ʧ��
		 }
		 else	//�������ݳɹ�
		 {
			echo "<script>window.location='user_manage.php?cmd=list';</script>";
		 }
	}
	
	//��֤�û���¼����ģ��
	if($_GET['cmd'] == "login")
	{
		if($_GET['from'] == "reader")			//���ߵ�½ģ��
		{
			$lend_num = htmlspecialchars(trim($_POST['lend_num']));
			$password = htmlspecialchars(trim($_POST['password']));
			
			$sql = "SELECT * FROM dbo.TReader WHERE ����֤��='".$lend_num."'";
	        $result = sqlsrv_query($conn , $sql);
	
			$row = sqlsrv_fetch_array($result);
			if($row['����'] == $password)
			{
				$_SESSION['reader_id'] = $row['����֤��'];
				$_SESSION['key']      = md5("bms".md5($row['����']));
				echo "<script>window.location='index_reader.php'</script>";
			}
			else
			{
				echo "�û������������,<a href=\"login.php\">���µ�¼</a>��";
			}
		}
		else if($_GET['from'] == "admin")		//����Ա��½ģ��
		{
			$username = htmlspecialchars(trim($_POST['username']));
			$password = htmlspecialchars(trim($_POST['password']));
			
			$sql = "SELECT * FROM dbo.Administrator WHERE �û���='".$username."'";
	        $result = sqlsrv_query($conn , $sql);
	
			$row = sqlsrv_fetch_array($result);
			if($row['����'] == $password)
			{
				$_SESSION['admin']     = $row['�û���'];
				$_SESSION['admin_key'] = md5("bms".md5($row['����']));
				$_SESSION['comment']   = $row['��ע'];
				echo "<script>window.location='index_admin.php'</script>";
			}
			else
			{
				echo "�û������������,<a href=\"login.php\">���µ�¼</a>��";
			}
					
		}
	}
sqlsrv_close($conn);