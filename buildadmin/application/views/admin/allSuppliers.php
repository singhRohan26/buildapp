<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">View All Suppliers</a>
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
                    foreach($allSuppliers as $supplier)
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    <td>
                        <?php
                    if(!empty($supplier['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/supplier/<?php echo $supplier['image']; ?>" height = 100 width = 100  >
                    <?php
                    }else{
                     ?>
                    <img src="<?php echo base_url() ?>/public/user.png" height = 100 width = 100  >
                    <?php
                    }
                    ?>
                        
                    </td>
                    <td><?php echo $supplier['name'];  ?></td>
                    <td><?php echo $supplier['email'];  ?></td>
                    <td><?php echo $supplier['plan_type'];  ?></td>
                    <td><a href="<?php echo base_url('Admin/supplierDetails/'.$supplier['market_user_id']) ?>"><button type="button" class="btn btn-outline-info">View</button></a>
                    <a href="<?php echo base_url('Admin/delsupplier/'.$supplier['market_user_id']) ?>" class="deletesupplier"><button class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
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



  



  

 


