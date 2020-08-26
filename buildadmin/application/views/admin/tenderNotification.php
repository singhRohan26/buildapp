<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">View All Notifications</a>
          </li>
          
        </ol>
<form method="post" action="<?php echo base_url('Notification/doAddTenderNotification') ?>" id="tenderNotification">
  <div class="row">
    
    <div class="col-sm-4">
        
        
        <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="text" name="title" class="form-control" required placeholder="Notification Title" value=""></span>
            <!--<span id="name"> Name</span>-->
        </div>
        
        
        
        
    </div>
   
   <div class="col-sm-4">
       
       <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="text" name="text" class="form-control" required placeholder="Notification Text" value=""></span>
            <!--<span id="name"> Name</span>-->
        </div>
   </div>
   
   
   
     
     <input type="submit" class="btn btn-primary center-block" value="Send">
</div>  
    
</form>
         <!-- DataTables Example -->
        <div class="card mb-3">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Title</th>
                    <th>Text</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Sno.</th>
                    <th>Title</th>
                    <th>Text</th>
                    
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                   
                   <?php  
                    $a=1;
                    foreach($getTenderNotifications as $noti )
                    {
                    ?> 
                    
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    <td><?php echo $noti['title']; ?></td>
                    <td><?php echo $noti['notification']; ?></td>
                    <td>
                        <a href="<?php echo base_url('Notification/delTenderNoti/'.$noti['id']) ?>" class="deletetenderNoti"><button class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                        
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