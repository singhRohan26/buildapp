<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">View All Tenders</a>
          </li>
          
        </ol>

         <!-- DataTables Example -->
        <div class="card mb-3">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Image</th>
                    <th>Name</th>
                    
                    <th>Phone</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Sno.</th>
                    <th>Image</th>
                    <th>Name</th>
                    
                    <th>Phone</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                    
                    <?php
                    $a=1;
                    foreach($tenderlist as $tender)
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    <td>
                    <?php
                    if(!empty($tender['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/tenderuser/<?php echo $tender['image']; ?>" height = 100 width = 100  >
                    <?php
                    }else{
                     ?>
                    <img src="<?php echo base_url() ?>/public/user.png" height = 100 width = 100  >
                    <?php
                    }
                    ?>
                    </td>
                    <td><?php echo $tender['name'];  ?></td>
                    
                    <td><?php echo $tender['phone'];  ?></td>
                    <td><a href="<?php echo base_url('Admin/tenderDetails/'.$tender['user_id']); ?>"><button type="button" class="btn btn-outline-info">View Details</button></a>
                    <a href="<?php echo base_url('Admin/deltender/'.$tender['user_id']) ?>" class="deletetender"><button class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                    </td>
                    
                  </tr>
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



  



  

 


