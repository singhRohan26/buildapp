<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from atmos.atomui.com/light/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2019 04:44:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="author"/>
<meta content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" name="description"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:title"
      content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
<meta property="og:description"
      content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>

<meta property="og:site_name" content="atlas "/>
<link rel="icon" href="<?php echo base_url('public/favicon.png') ?>" type="image/png" >
<title>Build App Admin Panel</title>


<link rel='stylesheet' href='<?php echo base_url() ?>public/d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/crisp/assets/vendor/pace/pace.css'/>
<script src='<?php echo base_url() ?>public/d33wubrfki0l68.cloudfront.net/js/3d1965f9e8e63c62b671967aafcad6603deec90c/js/pace.min.js'></script>
<!--vendors-->
<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>public/d33wubrfki0l68.cloudfront.net/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css'/>

<link rel='stylesheet' href='<?php echo base_url() ?>public/d33wubrfki0l68.cloudfront.net/bundles/30bc673ce76f73ecf02568498f6b139269f6e4c7.css'/>



<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
<!--Material Icons-->
<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>public/d33wubrfki0l68.cloudfront.net/css/25c25777222bf3d9fd0a0753e479d37892512062/crisp/assets/fonts/materialdesignicons/materialdesignicons.min.css'/>
<!--Material Icons-->
<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>public/d33wubrfki0l68.cloudfront.net/css/0940f25997c8e50e65e95510b30245d116f639f0/light/assets/fonts/feather/feather-icons.css'/>
<!--Bootstrap + atmos Admin CSS-->
<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>public/d33wubrfki0l68.cloudfront.net/css/16e33a95bb46f814f87079394f72ef62972bd197/light/assets/css/atmos.min.css'/>
<!-- Additional library for page -->

</head>
<body class="jumbo-page">

<main class="admin-main  ">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-4  bg-white">
                <div class="row align-items-center m-h-100">
                    <div class="mx-auto col-md-8">
                        <div class="p-b-20 text-center">
                            
                            <p class="admin-brand-content">
                                <img src="<?php echo base_url('public/logo-min.png') ?>">
                            </p>
                        </div>
                        <h3 class="text-center p-b-20 fw-400">Login</h3>
                        <h5 class="text-center p-b-20 fw-400 text-danger"><?php echo $this->session->flashdata('error') ?></h5>
                        <form class="needs-validation" action="<?php echo base_url('Admin/checkLogin') ?>" method="post">
                            <div class="form-row">
                                <div class="form-group floating-label col-md-12">
                                    <label>Email</label>
                                    <input type="email"  class="form-control" placeholder="Email" name="email">
                                    <span class="text-danger"><?php if(!empty($error['email'])){ echo $error['email'];}  ?></span>
                                </div>
                                <div class="form-group floating-label col-md-12">
                                    <label>Password</label>
                                    <input type="password"  class="form-control " placeholder="Password" name="pass">
                                    <span class="text-danger"><?php if(!empty($error['pass'])){ echo $error['pass'];}  ?></span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>

                        </form>
                        
                    </div>

                </div>
            </div>
            <div class="col-lg-8 d-none d-md-block bg-cover" style="background-image: url('<?php echo base_url() ?>public/assets/img/builders-risk.png');">

            </div>
        </div>
    </div>
</main>



<script src='<?php echo base_url() ?>public/d33wubrfki0l68.cloudfront.net/bundles/9556cd6744b0b19628598270bd385082cda6a269.js'></script>
<!--page specific scripts for demo-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-66116118-3"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-66116118-3'); </script>

</body>

<!-- Mirrored from atmos.atomui.com/light/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2019 04:44:38 GMT -->
</html>