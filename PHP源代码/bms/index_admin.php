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
    <div class="content_admin">
        <table class="table table-bordered">
            <thead>
                <tr align="center">
                    <td colspan="2" align="center">
                        <h4><p class="text-center">��ӭ��½ͼ�����ϵͳ��BMS)</p></h4>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>����Ա�û�</strong>
                    </td>
                    <td>
                       <p class="text-info"> <?php echo $_SESSION['admin'];?> </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>��  ע</strong>
                    </td>
                    <td>
                      <p class="text-info"> <?php echo $_SESSION['comment'];?> </p>
                    </td>
                </tr>  
                <tr>
                    <td>
                        <strong>�����е�Ȩ��</strong>
                    </td>
                    <td>
                        <img src="img/admin_privilege.png"/>
                    </td>
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