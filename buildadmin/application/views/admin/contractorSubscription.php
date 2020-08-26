<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Add Contractor Subscription Plans</a>
          </li>
          
        </ol>
<?php  if(!empty($contractorplanbyid['id'])) { ?>		
<form method="post" action="<?php  if(!empty($contractorplanbyid['id'])) { echo base_url('Admin/doeditcontractorsubscription/'.$contractorplanbyid['id']); } ?>" id="contractorSubscription">
  <div class="row">
    
    <div class="col-sm-4">
        
        
        <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="text" name="package" class="form-control" required placeholder="Package Name" value="<?php if(!empty($contractorplanbyid['package_type'])){echo $contractorplanbyid['package_type']; } ?>"></span>
            <!--<span id="name"> Name</span>-->
        </div>
        
        
        
        
    </div>
   
   <div class="col-sm-4">
       
       <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="text" name="price" class="form-control" required placeholder="Enter Price in R" value="<?php if(!empty($contractorplanbyid['price'])){echo $contractorplanbyid['price']; } ?>"></span>
            <!--<span id="name"> Name</span>-->
        </div>
   </div>
   
   <div class="col-sm-4">
       
       <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="text" name="bids" class="form-control" required placeholder="" value="<?php if(!empty($contractorplanbyid['bids'])){echo $contractorplanbyid['bids']; } ?>"></span>
            <!--<span id="name"> Name</span>-->
        </div>
   </div>
   
     
     <input type="submit" class="btn btn-primary center-block" value="Edit">
</div>  
    
</form>
<?php  } ?>
<!-- DataTables Example -->
        <div class="card mb-3">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Package Name</th>
                    <th>Price(In R)</th>
                    <th>Bids</th>
                    <th>Actions</th>
                    
                    <!--<th>Actions</th>-->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Sno.</th>
                    <th>Package Name</th>
                    <th>Price(In R)</th>
                    <th>Bids</th>
                    <th>Actions</th>
                    
                    <!--<th>Actions</th>-->
                  </tr>
                </tfoot>
                <tbody>
                    
                    <?php  
                    $a=1;
                    foreach($getcontractorSubscription as $contractorSubscription )
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    
                    <td><?php echo $contractorSubscription['package_type']; ?></td>
                    <td><?php echo $contractorSubscription['price']; ?></td>
                    <td><?php echo $contractorSubscription['bids']; ?></td>
                    <td><a href="<?php echo base_url('Admin/delcontractorplan/'.$contractorSubscription['id']) ?>" class="deletecontplan"><button class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
					<a href="<?php  echo base_url('Admin/editcontractorplan/'.$contractorSubscription['id']) ?>"><button class="btn btn-outline-info"><i class="fas fa-edit"></i></button></a>
					
					</td>
				
					
                   
                    <!--<td><button type="button" class="btn btn-outline-info">Edit</button><button type="button" class="btn btn-outline-danger">Delete</button></td>-->
                    
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
