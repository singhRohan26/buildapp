<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Change Your Password</a>
          </li>
          
        </ol>
		
<form method="post" action="<?php echo base_url('Admin/dochangepass') ?>" id="changepass">
    <div class="error_msg"></div>
  <div class="row">
    
    <div class="col-sm-4">
        
        <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="password" name="op" id="op" class="form-control"  placeholder="Enter Old Password" value="<?php if(!empty($subcontplanbyid['package_type'])){echo $subcontplanbyid['package_type']; } ?>"></span>
            <!--<span id="name"> Name</span>-->
        </div>
        
        
        
        
        
        
    </div>
   
   <div class="col-sm-4">
       
       <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="password" name="np" id="np" class="form-control"  placeholder="Enter New Password" value=""></span>
            <!--<span id="name"> Name</span>-->
        </div>
       
       
       
       
   </div>
   
   <div class="col-sm-4">
       
       <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="password" name="cp" id="cp" class="form-control"  placeholder="Enter Confirm Password" value=""></span>
            <!--<span id="name"> Name</span>-->
        </div>
       
       
       
       
   </div>
   
    <input type="submit" class="btn btn-primary center-block" value="Change">
</div>  
    
</form>
		

       

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>
