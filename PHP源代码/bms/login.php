<!DOCTYPE html>
<html>
  <head>
    <title>��ӭ��½ͼ�����ϵͳ</title>
    <link rel="shortcut icon" href="./img/ICON.png" />
    <meta charset="GB2312">
  
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/qianshou.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container">
   	<!--ͨ��ͷ������-->
    <div class="container top-one">
        <div class="span8 offset1 con">
        <h2>ͼ����Ϣ����ϵͳ��BMS��</h2>
        </div>
	</div>
    <div class="alert fade in">
        <button class="close" data-dismiss="alert" type="button">��</button>
        <strong style="margin-right:300px;">���Զ����û�:201102&nbsp;&nbsp;&nbsp;&nbsp;���룺12345</strong>
       <strong>���Թ���Ա�û���qianshou&nbsp;&nbsp;&nbsp;&nbsp;���룺123456</strong>
    </div>
    <!--��½��-->   
    
    <div class="container login">
        <div class="span8 offset1 tabbable tabs-left"> 
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">���ߵ�½</a></li>
            <li><a href="#tab2" data-toggle="tab">����Ա��½</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
             <form class="form-horizontal" action="fun.php?cmd=login&from=reader" method="post" name="reader">
              <div class="control-group">
                <label class="control-label" for="lend_num">����֤��</label>
                <div class="controls">
                  <input type="text" id="lend_num" placeholder="����֤��" name="lend_num">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">��������</label>
                <div class="controls">
                  <input type="password" id="inputPassword" placeholder="����" name="password">
                </div>
              </div>
              <input type="hidden" name="reader" value="login" />
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn" name="reader">��&nbsp;&nbsp;&nbsp;&nbsp;½</button>
                </div>
              </div>
            </form>    
            </div>
            <div class="tab-pane" id="tab2">
             <form class="form-horizontal" action="fun.php?cmd=login&from=admin" method="post" name="admin">
              <div class="control-group">
                <label class="control-label" for="username">�����û���</label>
                <div class="controls">
                  <input type="text" id="username" placeholder="�û���" name="username">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">����Ա����</label>
                <div class="controls">
                  <input type="password" id="inputPassword" placeholder="����" name="password">
                </div>
              </div>
              <input type="hidden" name="admin" value="login" />
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn btn-primary" name="admin">��&nbsp;&nbsp;&nbsp;&nbsp;½</button>
                </div>
              </div>
            </form>    
            </div>
          </div>
        </div>    
    </div>
    
    <!--Ҳҳ��ģ��-->
    
   <div class="container footer">
   <hr>
   <p class="text-center text-info">��Ȩ����<sup>&copy;</sup>  ɽ��ʦ����ѧ ��Ϣ��ѧ�빤��ѧԺ 2011�� ���� ����</p>
   </div>
   
   </div>
   <script>
   $("button[name=admin]").click(function(){
	   if($("form[name=admin] :input[name=username]").val()=="")
	   {
	        alert("�û���������Ϊ��");
			return false;
	   }
	   if($("form[name=admin] :input[name=password]").val()=="")
	   {
		    alert("���벻����Ϊ��");
			return false;   
	   }
   });
   $("button[name=reader]").click(function(){
	   if($("form[name=reader] :input[name=lend_num]").val()=="")
	   {
		    alert("����֤�Ų�����Ϊ��");
			return false;   
	   }
	   if($("form[name=reader] :input[name=password]").val()=="")
	   {
			alert("���벻����Ϊ��");   
			return false;
	   }
   });
   </script>
  </body>
</html>