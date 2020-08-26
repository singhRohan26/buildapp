<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">View All Locations</a>
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
                    <th>Locations</th>
                    
                    <!--<th>Actions</th>-->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Sno.</th>
                    <th>Locations</th>
                    
                    <!--<th>Actions</th>-->
                  </tr>
                </tfoot>
                <tbody>
                    
                    <?php
                    $a=1;
                    foreach($locations as $location)
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    
                    <td><?php echo $location['location'];  ?></td>
                   
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



  



  

 


