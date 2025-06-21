<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- datatable js file -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>



<!-- export buttons -->
<script src="<?php echo base_url() ?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/js/buttons.html5.min.js"></script>
<!-- export buttons end -->

<script>
$(function(){

    // products Listing
    if($("#list-products").length > 0){
      <?php
        if(isset($report) && $report){
          ?>
          $("#list-products").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
          });
          <?php
        }else{
          ?>
          $("#list-products").DataTable();
          <?php
        }
      ?>

    }

    // orders Listing
    if($("#list-orders").length > 0){
      <?php
        if(isset($report) && $report){
          ?>
          $("#list-orders").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
          });
          <?php
        }else{
         ?>
         $("#list-orders").DataTable();
         <?php
        }
        ?>

    }

    // list categories
    if($("#list-categories").length > 0){
        $("#list-categories").DataTable();
    }

    // list brands
    if($("#list-brands").length > 0){
        $("#list-brands").DataTable();
    }

// <-- Add Category Model -->


$("#catmodal").submit(function(event) {
    event.preventDefault();

    $.ajax({
        url: "<?php echo site_url('Ajax/category_insert'); ?>",
        data: $("#catmodal").serialize(),
        type: "POST",
        dataType: 'json',
        success: function(response) {
            //console.log(response); // Log the response
            
            if (response.status === 'success') {
                $('#catmodal').modal('hide');
                $('#catmodal')[0].reset();
                //alert(response.message); 
                location.reload(); 
            } else {
                alert(response.message); 
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
            alert('An error occurred while processing your request.');
        }
    });
});

// Get category data for edit

$(document).on('click', '.edit-button', function() {
    const recordId = $(this).data('id'); 

    $.ajax({
        url: '<?php echo site_url('ajax/get_category/'); ?>' + recordId,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log("Response Data:", data);
             
            if (data && !data.error) {
                $('#recordId').val(data.id);
                $('#name').val(data.name);
                $('#status').val(data.status)=== '1' ? 'Active' : 'Inactive';              
                $('#updateModal').modal('show');
                
            } 
             
            else {
                alert(data.error || 'No data found for this category.');
            }

        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.error('Response Text:', xhr.responseText);
            alert('An error occurred while fetching data.');
        }

    });

});

// insert updated category data into table.

$(document).on('submit', '#updateForm', function(event) {
    event.preventDefault(); 

    // Gather form data
    const formData = $(this).serialize(); 

    $.ajax({
        url: '<?php echo site_url('ajax/update_category'); ?>', 
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            console.log("Response:", response);
            if (response && response.success) {
                //alert('Category updated successfully!');
                $('#updateModal').modal('hide'); 
                
                 location.reload(); 
            } else {
                alert(response.error || 'An error occurred while updating the category.');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            alert('An error occurred while updating the category.');
        }
    });
});

   // Handle the delete button click
$(document).on('click', '.delete-button', function() {
    const recordId = $(this).data('id'); 

    if (confirm('Are you sure you want to delete this category?')) {
        $.ajax({
            url: '<?php echo site_url('ajax/delete_category/'); ?>' + recordId,
            method: 'POST', 
            data: { _method: 'DELETE' },  
            dataType: 'json',
            success: function(response) {
                console.log("Response Data:", response); 
                if (response && response.success) {
                   // alert('Category deleted successfully!');
                    location.reload(); 
                } else {
                    alert(response.error || 'An error occurred while deleting the category.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('An error occurred while deleting the category.');
            }
        });
    }
});

//add brand

$("#brand-form-add").submit(function(event) {
    event.preventDefault();

    $.ajax({
        url: "<?php echo site_url('Ajax/brand_insert'); ?>",
        data: $(this).serialize(),
        type: "POST",
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                $('#brand-modal').modal('hide');
                document.getElementById("brand-form-add").reset(); 
                location.reload(); 
            } else {
                alert(response.message); // Show error message
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
            alert('An error occurred while processing your request.');
        }
    });
});

// Edit-brand
$(document).on('click', '.edit-brand-button', function() {
    const brandid = $(this).data('id'); 

    $.ajax({
        url: '<?php echo site_url('ajax/get_brands/'); ?>' + brandid,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log("Response Data:", data);
            
            if (data && !data.error) {
                $('#brandid').val(data.id);
                $('#cateid').val(data.category_id);
                $('#brandname').val(data.name);
                $('#dd_status').val(data.status);
                ('#dd_status').val(data.status)=== '1' ? 'Active' : 'Inactive';
                $('#update-brand-modal').modal('show'); // Show the modal
            } else {
                alert(data.error || 'No data found for this brand.');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.error('Response Text:', xhr.responseText);
            alert('An error occurred while fetching data.');
        }
    });
});




// Insert updated brand data into table.
$(document).on('submit', '#brand-form-edit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Gather form data
    const formData = $(this).serialize(); 
    console.log("Form Data:", formData); 

    $.ajax({
        url: '<?php echo site_url('ajax/update_brands'); ?>', 
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            console.log("Response:", response);
            if (response && response.success) {
                $('#update-brand-modal').modal('hide'); 
                location.reload(); 
            } else {
                alert(response.error || 'An error occurred while updating the brand.');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.error('Response Text:', xhr.responseText);
            alert('An error occurred while updating the brand. Check console for details.');
        }
    });
});

// Delete Brands

$(document).on('click', '.brand-delete-button', function() {
    const brandid = $(this).data('id'); // Get the ID from the data attribute

    if (confirm('Are you sure you want to delete this category?')) {
        $.ajax({
            url: '<?php echo site_url('ajax/delete_brand/'); ?>' + brandid,
            method: 'POST', 
            data: { _method: 'DELETE' }, 
            dataType: 'json',
            success: function(response) {
                console.log("Response Data:", response); 
                if (response && response.success) {
                   // alert('Category deleted successfully!');
                    location.reload(); 
                } else {
                    alert(response.error || 'An error occurred while deleting the category.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('An error occurred while deleting the category.');
            }
        });
    }
});



//delete buyers

$(document).on('click', '.delete-buyer-button', function() {
    const buyer_id = $(this).data('id'); 

    if (confirm('Are you sure you want to delete this Invoice?')) {
        $.ajax({
            url: '<?php echo site_url('order/delete_invoice/'); ?>' + buyer_id,  
            method: 'POST',  
            data: { buyer_id: buyer_id }, 
            dataType: 'json',
            success: function(response) {
                console.log("Response Data:", response); 
                if (response && response.success) {
                    //alert('Invoice deleted successfully!');  
                    location.reload(); 
                } else {
                    alert(response.error || 'An error occurred while deleting the Invoice.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('An error occurred while deleting the Invoice.');
            }
        });
    }
});


//end delete buyers


//delete product 

$(document).on('click', '.delete-product-button', function() {
    const product_id = $(this).data('id'); 
    if (confirm('Are you sure you want to delete this Product?')) {
        $.ajax({
            url: '<?php echo site_url('product/delete_product/'); ?>' + product_id,  
            method: 'POST',  
            data: { product_id: product_id }, 
            dataType: 'json',
            success: function(response) {
                console.log("Response Data:", response); 
                if (response && response.success) {
                    //alert('Product deleted successfully!');  
                    location.reload(); 
                } else {
                    alert(response.error || 'An error occurred while deleting the Product.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('An error occurred while deleting the Product.');
            }
        });
    }
});


//end product

    if($(".btn-edit-brand").length > 0){

        $(".btn-edit-brand").on("click",function(){
          $("#modal-title").text("Update Brand");
          var brand_id = $(this).attr("data-id");

          var postdata = "brand_id="+brand_id+"&action=get_brand";

          $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){

            var data = $.parseJSON(response);

            $("#txt_add_name").val(data.arr.data.name);
            $("#edit_id").val(data.arr.data.id);
            $("#opt_type").val("edit");
            $("#dd_status option[value='"+data.arr.data.status+"']").attr("selected",true);
            $("#dd_category option[value='"+data.arr.data.category_id+"']").attr("selected",true);

            $("#brand-modal").modal();
          });
        });
    }

    $(document).on("click",".btn-delete-brand",function(){

         var conf = confirm("Are you sure want to delete?");

         if(conf){

           var delete_id = $(this).attr("data-id");

           var postdata = "delete_id="+delete_id+"&action=delete_brand";

           $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){

               location.reload();
           });
         }

    });

    if($("#frm-add-product").length > 0){
      $("#frm-add-product").validate();
    }

    if($("#dd_add_product_category").length > 0){

      $(document).on("change","#dd_add_product_category",function(){

        var postdata = "cat_id="+$("#dd_add_product_category").val()+"&action=list_category_brands";

        $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){

            var data = $.parseJSON(response);

            var brands = "<option value=''>Select Brand</option>";

            $.each(data.arr.data,function(index,item){
               brands += "<option value='"+item.id+"'>"+item.name+"</option>";
            });

            $("#dd_add_product_brand").html(brands);
        });
      });
    }

    $(document).on("click",".btn-delete-product",function(){

         var conf = confirm("Are you sure want to delete?");

         if(conf){

           var delete_id = $(this).attr("data-id");

           var postdata = "delete_id="+delete_id+"&action=delete_product";

           $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){

               location.reload();
           });
         }

    });

    if($("#btn-add-more").length > 0){
        $("#btn-add-more").on("click",function(){
          var postdata = "action=add_more_product_row";

          $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){

            var data = $.parseJSON(response);
            $("#row-add-more-products").append(data.arr.template);
          });
        });
    }

    $(document).on("click",".btn-remove-row",function(){
       $(this).closest(".product-row").remove();
    });

// seletct brand by catid
$(document).on("change", "#dd_order_category", function () {
    var categoryId = $(this).val();  // Get the selected category ID

    if (!categoryId) {
        return;  
    }

    var postdata = { cat_id: categoryId, action: 'list_order_category_brands' };

    var $this = $(this);  
    var brands = "<option value=''>Loading Brands...</option>";
    var $brandDropdown = $(".dd_order_brand");  

    // Make AJAX request to fetch the brands for the selected category
    $.ajax({
        url: "<?php echo site_url('order/populate_brand'); ?>",  
        method: "POST",
        data: postdata,
        success: function (response) {
            //console.log("Response data:", response);

    
            var data = response;

            // Check if data.arr is defined and is an object
            if (data && data.success && data.arr && Array.isArray(data.arr.data)) {
               // console.log("Brands array:", data.arr.data);  

                // Reset the brand dropdown
                var brands = "<option value=''>Select Brand</option>";  

                // Loop through the brand data and build the options
                $.each(data.arr.data, function (index, item) {
                    brands += "<option value='" + item.id + "'>" + item.name + "</option>";
                });

                // Log the final HTML content that will be injected
                //console.log("Brands HTML before injection:", brands);

                // Inject the brands into the dropdown
                $brandDropdown.html(brands);
            } else {
                console.log("No brands available or invalid data structure.");
                $brandDropdown.html("<option value=''>No Brands Available</option>");
            }
        },
        error: function () {
            console.log("AJAX error: Something went wrong");
            $brandDropdown.html("<option value=''>Error loading brands</option>");
        }
    });
});


// select brand


$(document).on("change", "#dd_order_category", function () {
    var categoryId = $(this).val();  // Get the selected category ID

    if (!categoryId) {
        return;  
    }

    var postdata = { cat_id: categoryId, action: 'list_order_category_brands' };

    var $this = $(this);  
    var $brandDropdown = $(".dd_order_brand");  
    //console.log("Selected Category ID:", categoryId);  

    // Make AJAX request to fetch the brands for the selected category
    $.ajax({
        url: "<?php echo site_url('order/populate_brand'); ?>",  
        method: "POST",
        data: postdata,
        success: function (response) {
            //console.log("Response data:", response);

            // Make sure response is a valid object, not a string
            var data = typeof response === 'string' ? JSON.parse(response) : response;  
            //console.log("Parsed Data:", data);  

            // Check if the success flag is true
            if (data && data.success) {
               // console.log("Data is valid:", data);

                // Ensure that data.arr exists and is an array
                if (data.arr && Array.isArray(data.arr.data)) {
                   // console.log("Brands array:", data.arr.data);  

                    var brands = "<option value=''>Select Brand</option>";  

                    // Loop through the brand data and build the options
                    $.each(data.arr.data, function (index, item) {
                        brands += "<option value='" + item.id + "'>" + item.name + "</option>";
                    });

                    console.log("Brands HTML before injection:", brands);  

                    // Inject the brands into the dropdown
                    $brandDropdown.html(brands);
                } else {
                    console.log("No brands available or invalid 'data.arr.data' format.");
                    $brandDropdown.html("<option value=''>No Brands Available</option>");
                }
            } else {
                // Log error message if success is false
                console.log("No brands found or success flag is false. Message:", data.message);
                $brandDropdown.html("<option value=''>" + (data.message || "No Brands Available") + "</option>");
            }
        },
        error: function () {
            console.log("AJAX error: Something went wrong");
            $brandDropdown.html("<option value=''>Error loading brands</option>");
        }
    });
});



//end brand

// selet product

$(document).on("change", ".dd_order_brand", function () {
    var categoryId = $("#dd_order_category").val();  

    var brandId = $(this).val();  

    if (!categoryId || !brandId) {
        return;  
    }

    var postdata = { cat_id: categoryId, brand_id: brandId, action: 'list_order_category_products' };
    var $productDropdown = $(".dd_order_product");
//console.log("postdata:", postdata);
    // Make AJAX request to fetch products for the selected category and brand
    $.ajax({
        url: "<?php echo site_url('order/populate_product'); ?>",  
        method: "POST",
        data: postdata,
        success: function (response) {
            //console.log("Response data:", response);

            var data = typeof response === 'string' ? JSON.parse(response) : response;

            if (data && data.success) {
                var products = "<option value=''>Select Product</option>";
                $.each(data.arr.data, function (index, item) {
                    products += "<option value='" + item.id + "'>" + item.name + "</option>";
                });
                $productDropdown.html(products);
            } else {
                $productDropdown.html("<option value=''>No Products Available</option>");
            }
        },
        error: function () {
           // console.log("AJAX error: Something went wrong");
            $productDropdown.html("<option value=''>Error loading products</option>");
        }
    });
});

//end product

//product amount

var productPrice = 0;  

// When a product is selected, fetch the product details (including price)
$(document).on("change", ".dd_order_product", function () {
    var productId = $(this).val();  // Get selected product ID

    console.log("Selected Product ID: " + productId); 
    if (!productId) {
        console.log("No product selected.");
        return;  
    }

    // Fetch product price via AJAX
    var postdata = { product_id: productId, action: 'get_product_details' };

    $.ajax({
        url: "<?php echo site_url('order/get_product_details'); ?>",  
        method: "POST",
        data: postdata,
        success: function (response) {
            console.log("AJAX Response:", response);  
            var data = typeof response === 'string' ? JSON.parse(response) : response;
            
            if (data && data.success) {
                console.log("Product Price:", data.product.amount);  

                // Store product price and display it
                productPrice = data.product.amount;

                updateTotalAmount();  
            } else {
                console.log("Product details not found.");
            }
        },
        error: function () {
            console.log("Error fetching product details.");
        }
    });
});

// When quantity is changed, update the total amount
$(document).on("input", "#product_quantity", function () {
    updateTotalAmount();
});

// Function to update the total amount
function updateTotalAmount() {
    var quantity = $("#product_quantity").val();
    console.log("Selected Quantity:", quantity); 

    if (productPrice && quantity > 0) {
        var totalAmount = productPrice * quantity;
        console.log("Total Amount:", totalAmount); 
        $("#total_amount").val(totalAmount.toFixed(2));  
    } else {
        $("#total_amount").val("0");  
    }
}



//end product amount


    $(document).on("change",".dd_order_product",function(){

      var postdata = "product_id="+$(this).val()+"&action=get_product_information";
      var product_amount = 0;

      $.ajax({
        url:"<?php echo site_url('inventory-ajax') ?>",
        data:postdata,
        method:"POST",
        async:false,
        success:function(response){

          var data = $.parseJSON(response);
          product_amount = data.arr.data.amount;

          

        }
      });

      $(this).closest(".product-row").find(".txt_order_amount").val(product_amount);
      $(this).closest(".product-row").find(".txt_order_amount").attr("data-unit-price",product_amount);
    });

    $(document).on("keyup mouseup",".txt_order_quantity",function(){

        var quantity = $(this).val();
        var unit_price = $(this).closest(".product-row").find(".txt_order_amount").attr("data-unit-price");

        var total_amount = quantity * unit_price;
        $(this).closest(".product-row").find(".txt_order_amount").val(total_amount);

    });

    if($("#frm-profile-settings").length > 0){

      $("#frm-profile-settings").validate();
    }

    if($("#frm-product-image-settings").length > 0){

      $("#frm-product-image-settings").validate();
    }

    if($("#frm-footer-settings").length > 0){

      $("#frm-footer-settings").validate();
    }

});


$(document).ready(function() {
            // Event listener for product change
            $('#product, #quantity').on('change', function() {
                // Get selected product and quantity
                var product_id = $('#product').val();
                var quantity = $('#quantity').val();

                // Validate if product and quantity are selected
                if (product_id && quantity > 0) {
                    // Send AJAX request to get product price and calculate the amount
                    $.ajax({
                        url: "<?= site_url('order/submit_created_order') ?>",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            quantity: quantity
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            $('#amount').val(data.amount);
                        }
                    });
                }
            });
        });

</script>
