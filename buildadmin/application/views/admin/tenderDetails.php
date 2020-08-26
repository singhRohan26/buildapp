<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#"><?php echo $tenderDetails['name']; ?></a>
          </li>
          
        </ol>

<div class="row">
    <div class="col-sm-4">
        <?php
                    if(!empty($tenderDetails['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/tenderuser/<?php echo $tenderDetails['image']; ?>" style="height: 250px; width: 100%;"  >
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
            <?php echo $tenderDetails['name']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Email Id :</label></b>
            <?php echo $tenderDetails['email']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Phone No. :</label></b>
            <?php echo $tenderDetails['phone']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Registered on :</label></b>
            <?php echo $tenderDetails['time']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Status :</label></b>
            <?php 
            if($tenderDetails['status'] == '1')
            {
                echo 'Active';
            }else{
                echo 'Inactive';
            }
            ?>
            <!--<span id="name"> Name</span>-->
        </div>
    </div>
    <!--<div class="col-sm-4">-->
    <!--    <div class="form-group">-->
    <!--        <label> Name :</label>-->
    <!--        Rohan-->
    <!--    </div>-->
    <!--</div>-->
</div>
       

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>



  



  

 


