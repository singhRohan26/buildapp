<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Privacy Policy</a>
          </li>
          
        </ol>

         <form method="post" action="<?php echo base_url('Admin/doaddprivacy/'.$privacy['id']) ?>" id="privacy">
          <textarea id="summernote" name="editordata"><?php echo strip_tags($privacy['text']); ?></textarea>
          <input type="submit" class="btn btn-info" value="Privacy">
        </form>

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>



  

