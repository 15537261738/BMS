<meta charset="GB2312">
<?php
	if(!$tag)exit();
	?>
<div class="content_add_user span10 offset1">
    <form class="form-horizontal" name="add_reader" method="post" enctype="multipart/form-data" action="fun.php?cmd=add_book">
      <div class="control-group">
        <label class="control-label" for="isbn">ͼ��ISBN</label>
        <div class="controls">
          <input type="text" id="isbn"  name="isbn">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="type_num">�����</label>
        <div class="controls">
             <input type="text" name="type_num" id="type_num"/>
        </div>
      </div>    

      <div class="control-group">
        <label class="control-label" for="bookname">�� ��</label>
        <div class="controls">
          <input type="text" id="bookname"  name="bookname">
        </div>
      </div>
      
       <div class="control-group">
        <label class="control-label" for="author">������</label>
        <div class="controls">
            <input type="text" name="author" id="author"/>
        </div>
      </div>
      
      
       <div class="control-group">
        <label class="control-label" for="publisher">������</label>
        <div class="controls">
            <input type="text" name="publisher" id="publisher"/>
        </div>
      </div>
           
      <div class="control-group">
        <label class="control-label" for="publish_date">��������</label>
        <div class="controls input-append date form_date" style="margin-left:20px" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input size="16" type="text" value="" readonly name="publish_date">
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
        </div>
        <input type="hidden" id="dtp_input2" value="" /><br/>
      </div>
      
       <div class="control-group">
        <label class="control-label" for="photo">ͼ�����</label>
        <div class="controls">
            <input type="file" name="photo" id="photo"accept="image/jpeg" />
        </div>
      </div>
      
       <div class="control-group">
        <label class="control-label" for="price">�۸�</label>
        <div class="controls">
             <input type="text" name="price" id="price"/>
        </div>
      </div>    
      
       <div class="control-group">
        <label class="control-label" for="content_view">������Ҫ</label>
        <div class="controls">
            <textarea rows="6" cols="20" name="content_view" id="content_view"  maxlength="100"></textarea><span class="help-inline" style="color:red;">100������</span>
        </div>
      </div>     
     
      <div class="control-group">
        <label class="control-label" for="fuben_num">������</label>
        <div class="controls">
             <input type="text" name="fuben_num" id="fuben_num"/>
        </div>
      </div>      
     
      
      <div class="control-group">
        <label class="control-label" for="store_num">�����</label>
        <div class="controls">
             <input type="text" name="store_num" id="store_num"/>
        </div>
      </div>   
      
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn">���</button>
        </div>
      </div>
      
    </form>
</div>    