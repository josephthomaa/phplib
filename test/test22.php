<html>
<?php phpinfo(INFO_VARIABLES); ?>
<form action="quote_enquiry.php" method="post"> 
        <div class="mini_width_left">
        <input type="text" name="name" id="quick_name" placeholder="Name"/>      
        <input type="text" name="email" id="quick_email" onblur="quickcheckEmail(this.value);" placeholder="Email" />

        </div>
        <div class="mini_width_right">
        <input type="text" name="phone" id="quick_phone" onKeyPress="return isNumberKey(event);"  placeholder="Phone" />
        <input type="text" name="location" id="quick_location" placeholder="Location" />  
</div>
        <input type="text" name="category" id="category" value="<?php echo isset($category) ? $category :"" ?>" /> 
        <input type="text" name="product" id="product" value="<?php echo isset($product) ? $product : ""?>" /> 
        <textarea name="requirement" placeholder="Message..." required=""></textarea>
        <input type="submit" name="get_submit" value="SUBMIT" >
</form>
</html>