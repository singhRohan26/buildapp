<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#"><?php echo $labourDetails['name']; ?></a>
          </li>
          
        </ol>

<div class="row">
    <div class="col-sm-4">
        <?php
                    if(!empty($labourDetails['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/labour/<?php echo $labourDetails['image']; ?>" style="height: 250px; width: 100%;"  >
                    <?php
                    }else{
                     ?>
                    <img src="<?php echo base_url() ?>/public/user.png" style="height: 250px; width: 100%;">
                    <?php
                    }
                    ?>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <b><label for="name">Full Name :</label></b>
            <?php echo $labourDetails['name']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Email Id :</label></b>
            <?php echo $labourDetails['email']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Phone No. :</label></b>
            <?php echo $labourDetails['phone']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Registered on :</label></b>
            <?php echo $labourDetails['time']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        <div class="form-group">
            <b><label for="name">Wages:</label></b>
            <?php echo $labourDetails['wages']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Job Status:</label></b>
            <?php echo $labourDetails['job_status']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
    </div>
   
   
   
</div>
       

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>
