<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#"><?php echo $supplierDetails['name']; ?></a>
          </li>
          
        </ol>

<div class="row">
    <div class="col-sm-4">
        <?php
                    if(!empty($supplierDetails['image']))
                    {
                    ?>
                    
                    <img src="<?php echo base_url() ?>/uploads/supplier/<?php echo $supplierDetails['image']; ?>" style="height: 250px; width: 100%;"  >
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
            <?php echo $supplierDetails['name']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Email Id :</label></b>
            <?php echo $supplierDetails['email']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Phone No. :</label></b>
            <?php echo $supplierDetails['phone']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Registered on :</label></b>
            <?php echo $supplierDetails['time']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        <div class="form-group">
            <b><label for="name">Company Name:</label></b>
            <?php echo $supplierDetails['company_name']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
        <div class="form-group">
            <b><label for="name">Links:</label></b>
            <?php echo $supplierDetails['link']; ?>
            <!--<span id="name"> Name</span>-->
        </div>
        
    </div>
   
   
   
</div>
       

      </div>

        

       

      </div>
      <!-- /.container-fluid -->

      
    </div>
