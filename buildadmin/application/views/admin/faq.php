<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Add FAQ'S</a>
            
          </li>
          
        </ol>


<form method="post" action="<?php echo base_url('Admin/doaddfaq') ?>" id="faq">
  <div class="row">
    
    
   
   <div class="col-sm-6">
       
       <div class="form-group">
            <!--<b><span><label for="name">Add Price :</label></span></b>-->
            <span><input type="text" name="faq" class="form-control" required placeholder="Add Frequently Asked Questions"></span>
            <!--<span id="name"> Name</span>-->
        </div>
       
       
       
       
       
   </div>
   
  
     
     <input type="submit" class="btn btn-primary center-block btn-sm">
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
                    <th>Faq's</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                   
                  <tr>
                    <th>Sno.</th>
                    <th>Faq's</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                     <?php
                     $a=1;
                    foreach($getFaq as $faq)
                    {
                    ?>
                  <tr>
                      
                    <td><?php echo $a; ?></td>
                    <td><?php echo $faq['faq']; ?></td>
                    <td>
                    <a href="#"><button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#myaddModal<?php echo $faq['faq_id'];?>"><i class="fas fa-plus"></i></button></a>
                    <a><button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $faq['faq_id'];?>"><i class="fas fa-eye"></i></button></a>
                    <a href="<?php echo base_url('Admin/deleteFaq/'.$faq['faq_id']) ?>" class="delfaq"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                    <!--<a href=""  data-toggle="modal" data-target="#myaddModalss"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-edit"></i></button></a>-->
                    </td>
                   </tr>
                   
 <!-- Modal -->
<div id="myModal<?php echo $faq['faq_id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title"><?php echo $faq['faq'];?></h4>
      </div>
      <div class="modal-body">
      <?php
      
      foreach($faqDesc as $faqdes){
          if($faqdes['faq_id'] == $faq['faq_id']){
      ?>
      <p><?php echo $faqdes['faq_desc'];?></p>
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
    
    
    <!-- Modal1 -->
<div id="myaddModal<?php echo $faq['faq_id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Add Faq's Answere</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url('admin/doAddFaqDescription/'.$faq['faq_id']);?>" method="post" id="faqdesc">
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                 <!--<input type="text" class="form-control" name="faq_desc" placeholder="Add Answeres" required>-->
                 <textarea id="summernote" name="faq_desc" rows="2"></textarea>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                 <input type="submit" class="btn btn-success" value="submit">
              </div>
            </div>
          </div>
      </form>
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



  <div id="myaddModalss" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Add Faq's Answere</h4>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="faqdesc">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                 <input type="text" class="form-control" name="faq_desc" placeholder="Add Answeres" required>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                 <texarea name="text"></texarea>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                 <input type="submit" class="btn btn-success" value="submit">
              </div>
            </div>
          </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 



  

 


