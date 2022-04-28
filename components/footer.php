        <footer>
            <div class="row">
                <div class="col span-1-of-2">
                    <ul class="footer-nav">
                        <li><a href="index.php?page=about-us">About us</a></li>
                        <li><a href="pages/vendor-pages/become_a_vendor.php?page=become-a-vendor">Become a Vendor</a></li>
                        <li><a href="#">iOS App</a></li>
                        <li><a href="#">Android App</a></li>
                    </ul>
                </div>
                <div class="col span-1-of-2">
                    <ul class="social-icon">
                        <li><a href="#">
                                <ion-icon name="logo-youtube" class="icon-small"></ion-icon>
                            </a></li>
                        <li><a href="#">
                                <ion-icon name="logo-facebook" class="icon-small"></ion-icon>
                            </a></li>
                        <li><a href="#">
                                <ion-icon name="logo-instagram" class="icon-small"></ion-icon>
                            </a></li>
                        <li><a href="#">
                                <ion-icon name="logo-twitter" class="icon-small"></ion-icon>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <p>Copyright&copy; 2022 by NETFood. All rights reserved.</p>
            </div>
        </footer>
        <script>
            const IMG = '<?= ITEM_IMG_DIR ?>'
        </script>
        
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
	<script src="assets/res/script.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
<?php
@session_start();
if(isset($_SESSION['error_msg'])){
    ?>
    <script>
  
        Swal.fire({
            title: '<?= $_SESSION['error_msg']; ?>',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#e4a804',
            cancelButtonColor: '#e82d00',
            confirmButtonText: 'Yes, log in or sign up!'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href= '/?page=login-signup';
            }else{
                location.href= '/?page=menu';
            }
        });

     </script>
    <?php
    unset($_SESSION['error_msg']);
}
if(isset($_SESSION['go_to_menu'])){
    ?>
    <script>
  
        Swal.fire(
            "You don't have any favorites!",
            "Go back to the menu to add items to your favorites",
            'warning'
            // confirmButtonColor: '#e4a804',
            // confirmButtonText: 'OK!'
        ).then((result) => {
            if (result.isConfirmed) {
                location.href= '/?page=menu';
            }
        });

     </script>
    <?php
    unset($_SESSION['go_to_menu']);
}

?>
</body>

</html>