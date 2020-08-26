<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">View All Labours</a>
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
                    foreach($allLabours as $labour)
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    <td>
                      <?php
                    if(!empty($labour['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/labour/<?php echo $labour['image']; ?>" height = 100 width = 100  >
                    <?php
                    }else{
                     ?>
                    <img src="<?php echo base_url() ?>/public/user.png" height = 100 width = 100  >
                    <?php
                    }
                    ?>  
                        
                    </td>
                    <td><?php echo $labour['name'];  ?></td>
                    <td><?php echo $labour['email'];  ?></td>
                    <td><?php echo $labour['plan_type'];  ?></td>
                    <td><a href="<?php echo base_url('Admin/labourDetails/'.$labour['market_user_id']) ?>"><button type="button" class="btn btn-outline-info">View</button></a>
                    <a href="<?php echo base_url('Admin/dellabour/'.$labour['market_user_id']) ?>" class="deletelabour"><button class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
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



  



  

 


