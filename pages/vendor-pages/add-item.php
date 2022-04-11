<?php
//link to php page
include ('api/add.php');
    
include 'components/vendor_header.php';
?>

        <h2>ADD-ITEM</h2>
       

        <section class="image-background">

        <form action="add-item.php" method="post" class="login-request">
            <div class="adds" class="col-1">
            </div>

            <div class="">
                <input name="item_name" placeholder="food title/ name" type="text" class="">
        
            <div class="">
                <input name="ingredients" placeholder="enter ingredients used" type="text" class="">

            <div class="">
            <label for="" class=""> Uplaod food image </label>
                <input name="image" placeholder="Uplaod food image" type="file" name="uploadfile" value=""class="">
                   
                   
            </div>

            <label for="" class=""> Food Description</label>
            <div class="">
                <textarea name="description" id="myEditor" type="text"  placeholder="Enter Your Post Decription/Content"></textarea>
                   
            </div>

            <div class="">
                <input  name="price" type="number" class="" placeholder="₦0000.00" id="">
            </div>

            <button  type="submit"  name="upload" action="submit" value="">ADD ITEM</button>
    </div>
    </form>

    </div>
        </section>
        <?php include '/components/vendor_footer.php';?>