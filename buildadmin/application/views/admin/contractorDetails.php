<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#"><?php echo $contractorDetails['name']; ?></a>
          </li>
          
        </ol>

<div class="row">
    <div class="col-sm-4">
        <?php
                    if(!empty($contractorDetails['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/contractorDetails/<?php echo $contractorDetails['image']; ?>" style="height: 250px; width: 100%;"  >
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
            <?php echo $contractorDetails['name']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Email Id :</label></b>
            <?php echo $contractorDetails['email']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Phone No. :</label></b>
            <?php echo $contractorDetails['phone']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Registered on :</label></b>
            <?php echo $contractorDetails['time']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        <div class="form-group">
            <b><label for="name">Company Name:</label></b>
            <?php echo $contractorDetails['company_name']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Capablities:</label></b>
            <?php echo $contractorDetails['capablity']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
    </div>
   
   <div class="col-sm-4">
       
       <div class="form-group">
            <b><label for="name">Total Bids Left:</label></b>
            <?php echo $contractorDetails['bids']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
       
       <div class="form-group">
            <b><label for="name">Work Experience:</label></b>
            <?php echo $contractorDetails['work_exp']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        <div class="form-group">
            <b><label for="name">Cost Range:</label></b>
            <?php echo $contractorDetails['cost_range']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Links:</label></b>
            <?php echo $contractorDetails['link']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
       
   </div>
   
</div>

<div class="row">
    <div class="col-sm-3">
    <div class="form-group">
            <b><label for="name">Statutory:</label></b>
            <img src="<?php echo base_url() ?>/uploads/contractorDetails/<?php echo $contractorDetails['statutory']; ?>" style="height: 200px; width: 100%;"  >
            <!--<span id="name"> Name</span>-->
        </div>
    
    </div>
    
</div>
       

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>
