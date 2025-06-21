<div class="col-sm-12 product-row">
  <div class="col-sm-2">
    <label for="dd_order_category">Category:</label>
    <select class="form-control dd_order_category" name="dd_order_category[]">
       <option value="">Select Category</option>
       <?php
       if(count($categories) > 0){
         foreach($categories as $index => $value){
           ?>
           <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
           <?php
         }
       }
       ?>
    </select>
  </div>
  <div class="col-sm-2">
    <label for="dd_order_brand">Brand:</label>
    <select class="form-control dd_order_brand" name="dd_order_brand[]">
       <option value="">Select Brand</option>
    </select>
  </div>
  <div class="col-sm-2">
    <label for="dd_order_product">Product:</label>
    <select class="form-control dd_order_product" name="dd_order_product[]">
       <option value="">Select Product</option>
    </select>
  </div>
  <div class="col-sm-2">
    <div class="form-group">
      <label for="txt_quantity">Quantity:</label>
      <input type="number" min="1" required class="form-control txt_order_quantity" value="1" name="txt_quantity[]" placeholder="Enter Quantity">
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group">
      <label for="txt_amount">Amount (<?php echo get_option_value("site_currency"); ?>):</label>
      <input type="number" min="0" readonly class="form-control txt_order_amount" name="txt_order_amount[]" value="0">
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group">
      <button type="button" style="margin-top: 23px;" class="btn-remove-row btn btn-danger">Remove</button>
    </div>
  </div>
</div>
