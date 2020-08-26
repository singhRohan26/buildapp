<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">About Us</a>
          </li>
          
        </ol>
         <form method="post" action="<?php echo base_url('Admin/doaddaboutus/'.$getaboutus['id']) ?>" id="aboutus">
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <textarea id="summernote" name="editordata" rows="10"><?php echo strip_tags($getaboutus['text']); ?></textarea>
                </div>    
            </div>
            
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <center><button type="submit" class="btn btn-info center-block">Save</button></center>
                </div>
            </div>
        </div>
        
          
          
        </form>

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>



  

