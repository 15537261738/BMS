<?php 
	require_once("config.php");
	if(!check_reader())
	{
		echo "<script>window.location.href='login.php';</script>";
		exit();
	}
	$tag = 1;
	
	$lend_id = $_GET['id'];
	if($lend_id != $_SESSION['reader_id'])
	{
		echo "<script>window.location.href='index_reader.php'</script>";
		exit();
	}
	
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
	
	$password      =  sqlsrv_get_field( $result,1);
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
        <div class="content_update_user span10 offset1">
            <form class="form-horizontal" name="update_reader" method="post" enctype="multipart/form-data" action="fun.php?type=reader&cmd=update_user">
              <div class="control-group">
                <label class="control-label" for="len_num">����֤��</label>
                <div class="controls">
                  <input  class="uneditable-input" readonly type="text" id="len_num"  name="len_num" value="<?php echo $lend_id;?>">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label" for="name">�� ��</label>
                <div class="controls">
                  <input type="text" id="name"  name="name" value="<?php echo $name;?>">
                </div>
              </div>
              
               <div class="control-group">
                <label class="control-label" for="password">�� ��</label>
                <div class="controls">
                    <input type="text" name="password" id="password" value="<?php echo $password;?>"/>
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label" for="major">רҵ��</label>
                <div class="controls">
                <select name="major" id="major">
                  <option value="�����">�����</option>
                  <option value="ͨ�Ź���">ͨ�Ź���</option>
                  <option value="����ѧ">����ѧ</option>
                  <option value="��������">��������</option>
                  <option value="�㲥���ӱർ">�㲥���ӱർ</option>
                </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label" for="sex">�� ��</label>
                <div class="controls">
                    <input class="span1" type="radio" name="sex" id="sex" value="��">��
                    <input  class="span1 offset3" type="radio" name="sex" id="sex" value="Ů">Ů
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label" for="birth_date">��������</label>
                 <div class="controls input-append date form_date_update" style="margin-left:20px" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input" data-link-format="yyyy-mm-dd">
                    <input size="16" type="text" value="<?php echo $birthdate;?>" readonly name="birth_date">
                    <span class="add-on"><i class="icon-remove"></i></span>
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
                <input type="hidden" id="dtp_input" value="" /><br/>
              </div>
              
               <div class="control-group">
                <label class="control-label" for="photo">�� Ƭ</label>
                <div class="controls">
                    <input type="file" name="photo" id="photo"accept="image/jpeg" />
                </div>
              </div>
              
               <div class="control-group">
                <label class="control-label" for="contact">��ϵ��ʽ</label>
                <div class="controls">
                    <textarea rows="6" cols="20" name="contact" id="contact"><?php echo $contact;?></textarea>
                </div>
              </div>
              
               <div class="control-group">
                <label class="control-label" for="comment">�� ע</label>
                <div class="controls">
                    <textarea rows="3" cols="20" name="comment" id="comment"><?php echo $comment;?></textarea>
                </div>
              </div>              
              
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn">��&nbsp;&nbsp;��</button>
                </div>
              </div>
            </form>
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
$("ul.nav li:contains('�޸ĸ�����Ϣ')").addClass("active").siblings().removeClass("active");

$('.form_date_update').datetimepicker({
		//language:  'fr',
		weekStart: 1,
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});

$("select[name=major]").val(["<?php echo trim($major);?>"]);;
$(":radio[name=sex]").val(["<?php echo $sex;?>"]);


</script>
</html>