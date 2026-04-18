<!-- Vendors JS -->
<script src="<?php echo  base_url(); ?>assest/frontend/js/vendor/modernizr-3.11.7.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/frontend/js/vendor/jquery-3.6.0.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/frontend/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo  base_url(); ?>assest/frontend/js/vendor/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="<?php echo  base_url(); ?>assest/administrator/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo  base_url(); ?>assest/administrator/vendors/js/vendor.bundle.addons.js"></script>

<script src="<?php echo  base_url(); ?>assest/frontend/js/plugins/slick.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/frontend/js/plugins/countdown.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/frontend/js/plugins/jquery-ui.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/frontend/js/plugins/jquery.zoom.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/frontend/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/frontend/js/plugins/counterup.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/frontend/js/plugins/scrollup.js"></script>
<!-- <script src="<?php echo  base_url(); ?>assest/frontend/js/plugins/ajax.mail.js"></script> -->

<!-- Activation JS -->
<script src="<?php echo  base_url(); ?>assest/frontend/js/active.js"></script>

<script language="javascript" type="text/javascript">

$(document).on("keypress keyup keydown change",".minQty",function (e) {
  var v = $(this).val();
  if(v<=0)
  {
    $(this).val(1);
  }
  //console.log(v)
});

$(document).ready(function(){
    $('#subscriber_form').submit(function(){
		 var email = $('#user_subs_email').val();  		
		 if(email != '')  
         {  
            $.ajax({  
                 url:"<?php echo base_url(); ?>ajax/subscribe",  
                 method:"POST",  
                 data:{email:email},  
                 success:function(data){  
					  $('#subscribe_response').html(data);  
                      $('#user_subs_email').val('');  
                 }  
            });  
         }  
	});   
});
var APP_URL = '<?php echo base_url(); ?>';

function set_search_value()
{
    var txt_search = $('#txt_search').val();      // $('.txt_search').val();      
    $.ajax({  
        url:APP_URL+"ajax/set_search_data",  
        method:"POST",  
        data:{txt_search:txt_search},  
        success:function(data){  
          window.location.href = APP_URL+'products/search';
        }
    });  
}
/*$(document).on('keypress', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        set_search_value();
    }
});*/
$('#txt_search').keypress(function(event){
	
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		//alert('You pressed a "enter" key in textbox');	
		set_search_value();
	}

});



function set_search_value_mobile()
{
    var txt_search = $('#txt_search_mob').val();      // $('.txt_search').val();      
    $.ajax({  
        url:APP_URL+"ajax/set_search_data",  
        method:"POST",  
        data:{txt_search:txt_search},  
        success:function(data){  
          window.location.href = APP_URL+'products/search';
        }
    });  
}
$('#txt_search_mob').keypress(function(event){
  
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    //alert('You pressed a "enter" key in textbox');  
    set_search_value_mobile();
  }

});

 function add_to_cart(pid="",qty="",variation="")
 {
    if(qty=="")
    {
        var qty = $("#qty_btn_"+pid).val();
    }
    if(qty>0 && pid)
    {
        $.ajax({  
          url:APP_URL+"cart/add_to_cart",  
          method:"POST",  
          dataType:"JSON",
          data:{qty:qty,pid:pid,variation:variation},  
          success:function(data){  
            if(data.error==0)
            {
                get_cart_content();
            }
          }
        });  
    }
 } 
 function get_cart_content(opn=0)
 {
    $.ajax({  
      url:APP_URL+"cart/get_cart_content",  
      method:"POST",  
      dataType:"JSON",
      data:{},  
      success:function(data){  
        if(data.error==0)
        {
            $("#sidebar_cart").empty().append(data.cart_html);
            $("#sidebar_cart_subtotal").html("₹ "+data.sub_total);
            $(".header_min_cart_count").html(data.qty_count);
            if(opn==0){
                $("#header_min_cart").trigger("click");
            }

        }
      }
    });  
 }
 function remove_from_cart(rid)
  {
    swal({
          title: "Remove from Cart",
          text: 'Are You Sure Remove this Product ?',
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            if(rid!="")
            {
                swal("Product removed successfully from cart.");
                $.ajax({  
                  url:APP_URL+"cart/remove_from_cart",  
                  method:"POST",  
                  dataType:"JSON",
                  data:{rid:rid},  
                  success:function(data){  
                    if(data.error==0)
                    {
                        get_cart_content();
                    }
                  }
                });  
            }
          } else {
            //swal("Your imaginary file is safe!");
          }
        })
  }

 
 function FavoriteProducts(productid){
  var data = 'productid=' +productid;
  if (productid>0){    
    $.ajax({
      type:'POST',
      url:'<?php echo base_url(); ?>ajax/SetFavoriteProducts/',
      data:data,
      dataType: "json",
      success:function(result){
          var msg = result.msg;
          if(msg=='success')
          {
            $("#wishlist_count_span").html(result.total_pro);
            swal({
              icon: 'success',
              title: 'Product set as favorite product.',
              showConfirmButton: false,
              timer: 2000
            })
          }
          else if(msg=='info'){
            swal({
              icon: 'info',
              title: 'Product already in wishlist.',
              showConfirmButton: false,
              timer: 2000
            })
          }
          else if(msg=='error'){
              swal({
                title: "Login",
                text: 'Please Login To Your Account',
                icon: "error",
                showCancelButton: true,
                showConfirmButton: false,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  window.location.href = '<?php echo base_url(); ?>login/';   
                } else {
                  //swal("Your imaginary file is safe!");
                }
              })
          }else{
            swal({
              icon: 'error',
              title: 'Something went wrong',
              showConfirmButton: false,
              timer: 2000
            })
          }      
          return false;
        }
    });    
  }
}





function FavoriteProductsRemove(favoriteid){  
  var data = 'favoriteid='+favoriteid;
  if(favoriteid!=''){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url(); ?>ajax/RemoveFavoriteProducts/',
      data:data,
      dataType: "json",
      success:function(result){
        var msg = result.msg;
        if(msg=='success'){
          $("#wishlist_count_span").html(result.total_pro);
          swal({
            icon: 'success',
            title: 'Product Removed From favorite product.',
            showConfirmButton: false,
            timer: 2000
          })
          $("#favoriteproducts"+favoriteid).remove();
        }else{
         swal({
            icon: 'error',
            title: 'Something went wrong',
            showConfirmButton: false,
            timer: 2000
          })
        }    
        return false;
      }
    });
  }else{
   swal({
      icon: 'error',
      title: 'Something went wrong',
      showConfirmButton: false,
      timer: 2000
    })
  }  
}

</script>