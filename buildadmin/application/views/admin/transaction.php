<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">View All Transactions</a>
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
                    <th>User Name</th>
                    <th>Plan type</th>
                    <th>Price</th>
                    <th>User Type</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Sno.</th>
                    <th>User Name</th>
                    <th>Plan type</th>
                    <th>Price</th>
                    <th>User Type</th>
                   
                  </tr>
                </tfoot>
                <tbody>
                    
                    <?php
                    $a=1;
                    foreach($transaction as $labour)
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    <td><?php echo $labour['name'];  ?></td>
                    <td><?php echo $labour['plan_type'];  ?></td>
                    <td><?php echo $labour['price'];  ?></td>
                    <td><?php echo $labour['user_type'];  ?></td>
                   
                    
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