<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">View All Area Of Industries</a>
          </li>
          <?php
          if(!empty($this->session->flashdata('sub_category')))
          {
          ?>
          <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong><?php echo $this->session->flashdata('sub_category'); ?>
</div>
<?php
}
?>
        </ol>

         <!-- DataTables Example -->
        <div class="card mb-3">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Area of Industry</th>
                    
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Sno.</th>
                    <th>Area of Industry</th>
                    
                    <th>Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                    
                    <?php
                    $a=1;
                    foreach($allaoi as $aoi)
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    
                    <td><?php echo $aoi['aoi'];  ?></td>
                   
                    <td>
                        <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $aoi['aoi_id'];?>">View Sub-Category</a>
                   <!--<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#myModal">Add Sub-Category</button>-->
                    <!--<a href="<?php echo base_url('Admin/aoiList/') ?>" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="View Sub-Category"><i class="fa fa-eye" aria-hidden="true"></i></a>-->
                    <!--<a><button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></a>-->
                    
                    </td>
                    
                  </tr>
    <!-- Modal -->
<div id="myModal<?php echo $aoi['aoi_id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title"><?php echo $aoi['aoi'];  ?></h4>
      </div>
      <div class="modal-body">
      <?php
      foreach($aoi_desc as $aoi_descs){
          if($aoi_descs['aoi_id'] == $aoi['aoi_id']){
      ?>
      <p><?php echo $aoi_descs['aoi_desc'];?></p>
      <?php
          }
      }
      ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                  <?php
                  $a++;
                    }
                  ?>
                  
                 
                </tbody>
              </table>
            </div>
          </div>
         
        </div>

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>






  

 


