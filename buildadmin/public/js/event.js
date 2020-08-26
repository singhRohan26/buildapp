
var Event = function () {
    this.__construct = function () { 
    this.loginForm(); 
    this.imageCommonForm(); 
    this.checkSession();
    // this.addpost();
    this.deleteItem();
    this.propertyWishlist();
    this.contentWrapper();
    this.commonFilters();
    this.sorting();
    this.deletesupplier();
	this.deletesubcont();
	this.delfaq();
	this.delcont();
	this.delsubcontractor();
	this.dellabour();
	this.delsupplier();
	this.deletetender();
	this.delTenderNoti();
	this.delmarketplacerNoti();
	
    }    
    this.loginForm = function() {
        $(document).on('submit', '#contractorSubscription,#subcontplan,#suppliersubscription,#aboutus,#tnc,#privacy,#faq,#faqdesc,#changepass', function(evt){
            evt.preventDefault();
            var url = $(this).attr('action');
            var postdata = $(this).serialize();
            $.post(url, postdata, function (out) {
                $(".form-group > .text-danger").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".form-group").append('<span class="text-danger">' + out.errors[i] + '</span>');
                    }
                }  
                if (out.result === -1) {
                   swal(out.msg)
                }
                
                if (out.result === 1) {
                    swal(out.msg,'',"success")
                    
                    if (out.url !== undefined) {
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 2000);
                    }
                }
            })
        })
    }
    
    this.imageCommonForm = function () {
        $(document).on('submit', '#propertyform', function(evt){
            evt.preventDefault();
            $.ajax({
                url: $(this).attr("action"),
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (out) {
                    $(".input-field > .error").remove();
                    $(".form-group > .text-danger").remove();
                    if (out.result === 0) {
                        for (var i in out.errors) {
                            $("#" + i).parents(".form-group").append('<span class="text-danger">' + out.errors[i] + '</span>');
                            $("#" + i).focus();
                        }
                        
                    }
                    
                    if (out.result === -1) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        $("#error_msg").fadeOut(2000);
                        if (out.url) {
                            window.location.href = out.url;
                        }
                    }
                   
                    if (out.result === 1) {
                        swal("Good job!", "Your Post is Added!", "success")
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                        $("#error_msg").removeClass('alert-danger').addClass('alert alert-success alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                        $("#error_msg").fadeOut(5000);
                        window.setTimeout(function () {
                            window.location.href = out.url;
                        }, 2000);
                    }
                }
            });
        });
    };
     
    
   this.checkSession = function() {
       $(document).on('click', '.property_sess', function(e){
           e.preventDefault();
        swal("Please Login First !!")
       })
   } 

   this.deleteItem = function(){
    $(document).on('click', '.deletecontplan', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};

  this.delfaq = function(){
    $(document).on('click', '.delfaq', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete this Question?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};

this.deletesubcont = function(){
    $(document).on('click', '.deletesubcontplan', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};

this.delcont = function(){
    $(document).on('click', '.deletecont', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete this User?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};

this.delsubcontractor = function(){
    $(document).on('click', '.deletesubcontractor', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete this User?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};

this.dellabour = function(){
    $(document).on('click', '.deletelabour', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete this User?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};

this.delsupplier = function(){
    $(document).on('click', '.deletesupplier', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete this User?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};

this.deletetender = function(){
    $(document).on('click', '.deletetender', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete this User?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};


this.deletesupplier = function(){
    $(document).on('click', '.deletesupplan', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
};

    this.delmarketplacerNoti = function(){
        $(document).on('click', '.deletemarketNoti', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete this Notification?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    });
    };
    
    this.delTenderNoti = function(){
        
       $(document).on('click', '.deletetenderNoti', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Do you really want to Delete this Notification?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    }
                });
            }
        });
    }); 
    };


this.propertyWishlist = function () {
    $(document).on('click', '.wish_heart', function (evt) {
        evt.preventDefault();

        if ($("body").data("session") != "") {
            var cls = $(this).children('span');
            // alert(cls.attr('class'))
        //    if ($(cls).hasClass('colorpurple')) {
        //        $(cls).removeClass('colorpurple');
        //     } else {
        //         $(cls).addClass('colorpurple');
        //     }
       
            
            var url = $(this).attr('href');
            
            $.post(url, '', function (out) {
                if (out.result === 1) {
                    if ($(cls).hasClass("colorpurple")) {
                        $(".wishBox").fadeIn();
                        $(".wishBox span").html("Added to your wishlist!. ");
                        $(".wishBox").fadeOut(2000);
                    } else {
                        $(".wishBox").fadeIn();
                        $(".wishBox").fadeOut(2000);
                        $(".wishBox span").html("Removed from your wishlist!. ");
                    }
                }
            });
        } else{
            $(".wishBox").fadeIn();
                        $(".wishBox").fadeOut(2000);
                        $(".wishBox span").html("Please Login First ");
        }

    });

};

this.contentWrapper = function () {
    $(document).ready(function () {
        var url = $('#property_wrapper').data('url');
            
            $.post(url, '', function (out) { 
                if (out.result === 1) {
                    $('#property_wrapper').html(out.content_wrapper);
                    
                }
            });
        // }
    });
};

this.commonFilters = function () { 
    $(document).on('submit', '#common_filter_form', function (evt) {
        evt.preventDefault();
       
        
        var url = $(this).attr("action");
        var postdata = $(this).serialize();
        var form = $(this)[0];
      
        $.post(url, postdata, function (out) {
            $('.error').remove();
      
            if (out.result === 0) {
                for (var i in out.errors) {
                    $("#" + i).parent(".viewForm").append('<span class="error text-danger "><p style="text-align : left;">' + out.errors[i] + '</p></span>');
                    $("#" + i).focus();
                }
            }
            if (out.result === -1) {
                
            }
            if (out.result === 1) {
                $('#property_wrapper').html(out.content_wrapper);
            }
        });
        
    });
};


this.sorting = function () { 
    $(document).on('change', '#cost_sorting', function (evt) {
        evt.preventDefault();
       
        
        var url = $(this).attr("data-url");
        
        var postdata = $(this).serialize();
        var form = $(this)[0];
      
        $.post(url, postdata, function (out) {
            $('.error').remove();
      
            if (out.result === 0) {
                for (var i in out.errors) {
                    $("#" + i).parent(".viewForm").append('<span class="error text-danger "><p style="text-align : left;">' + out.errors[i] + '</p></span>');
                    $("#" + i).focus();
                }
            }
            if (out.result === -1) {
                
            }
            if (out.result === 1) {
                $('#property_wrapper').html(out.content_wrapper);
            }
        });
        
    });
};




    this.__construct();
};
var obj = new Event();