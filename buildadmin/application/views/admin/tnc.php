<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Terms and Conditions</a>
          </li>
          
        </ol>

         <form method="post" action="<?php echo base_url('Admin/doaddtnc/'.$gettnc['id']) ?>" id="tnc">
          <textarea id="summernote" name="editordata"><?php echo strip_tags($gettnc['text']); ?></textarea>
          <input type="submit" class="btn btn-info" value="Save">
        </form>

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>



  

