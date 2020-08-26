<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">View All Sub_Contractors</a>
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
                    <th>Email</th>
                    <th>Plan Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Sno.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Plan Type</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                    
                    <?php
                    $a=1;
                    foreach($allsub_cont as $sub_cont)
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    <td>
                       <?php
                    if(!empty($sub_cont['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/subcontractorDetails/<?php echo $sub_cont['image']; ?>" height = 100 width = 100  >
                    <?php
                    }else{
                     ?>
                    <img src="<?php echo base_url() ?>/public/user.png" height = 100 width = 100  >
                    <?php
                    }
                    ?> 
                        
                    </td>
                    <td><?php echo $sub_cont['name'];  ?></td>
                    <td><?php echo $sub_cont['email'];  ?></td>
                    <td><?php echo $sub_cont['plan_type'];  ?></td>
                    <td><a href="<?php echo base_url('Admin/subcontDetails/'.$sub_cont['market_user_id']) ?>"><button type="button" class="btn btn-outline-info">View</button></a>
                    <a href="<?php echo base_url('Admin/delsubcontractor/'.$sub_cont['market_user_id']) ?>" class="deletesubcontractor"><button class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
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



  



  

 


