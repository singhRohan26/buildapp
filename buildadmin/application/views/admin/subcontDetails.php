<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#"><?php echo $subcontDetails['name']; ?></a>
          </li>
          
        </ol>

<div class="row">
    <div class="col-sm-4">
        <?php
                    if(!empty($subcontDetails['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/subcontractorDetails/<?php echo $subcontDetails['image']; ?>" style="height: 250px; width: 100%;"  >
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
            <?php echo $subcontDetails['name']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Email Id :</label></b>
            <?php echo $subcontDetails['email']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Phone No. :</label></b>
            <?php echo $subcontDetails['phone']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Registered on :</label></b>
            <?php echo $subcontDetails['time']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        <div class="form-group">
            <b><label for="name">Company Name:</label></b>
            <?php echo $subcontDetails['company_name']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Cost Range:</label></b>
            <?php echo $subcontDetails['cost_range']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
    </div>
   
   <div class="col-sm-4">
       
       <div class="form-group">
            <b><label for="name">Monetory Value:</label></b>
            <?php echo $subcontDetails['monetory_value']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
       
       <div class="form-group">
            <b><label for="name">Link:</label></b>
            <?php echo $subcontDetails['link']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
       
   </div>
   
</div>
      
      <div class="row">
          
          
      </div> 

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>
