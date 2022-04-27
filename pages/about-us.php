
        
        
         <!-- Google Font -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
        
        
        <!-- Page Header Start -->
         <div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>About Us</h2>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        <!-- Food Start -->
        <div class="food mt-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="food-item">
                            <i class="flaticon-burger"></i>
                            <h2>Burgers</h2>
                            <p>
                                Burgers
                            </p>
                            <a href="">View Menu</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="food-item">
                            <i class="flaticon-snack"></i>
                            <h2>Snacks</h2>
                            <p>
                               All the Snacks 
                            </p>
                            <a href="">View Menu</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="food-item">
                            <i class="flaticon-cocktail"></i>
                            <h2>Naija Dishes</h2>
                            <p>
                                All the Nigerian Dishes
                            </p>
                            <a href="">View Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Food End -->
        

        <!-- About Start -->
         <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                       
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header">
                                <p>About Us</p>
                                <h2>Cooking Since Foreever</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                   About Us description 
                                </p>
                                <p>
                                About Us description </p>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End  -->


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    

<style>
/*******************************/
/********* General CSS *********/
/*******************************/
body {
    color: #757575;
    background: #ffffff;
    font-family: 'open sans', sans-serif;
    background-image: url(assets/res/img/bg1.png);
}

h1,
h2, 
h3, 
h4,
h5, 
h6 {
    color: #454545;
    font-family: 'Nunito', sans-serif;
}

a {
    font-family: 'Nunito', sans-serif;
    font-weight: 600;
    color: #fbaf32;
    transition: .3s;
}

a:hover,
a:active,
a:focus {
    color: #719a0a;
    outline: none;
    text-decoration: none;
}

.btn.custom-btn {
    padding: 12px 25px;
    font-family: 'Nunito', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    background: #fbaf32;
    border: 2px solid #fbaf32;
    border-radius: 5px;
    transition: .5s;
}

.btn.custom-btn:hover {
    color: #fbaf32;
    background: transparent;
}

.btn.custom-btn:focus,
.form-control:focus,
.custom-select:focus {
    box-shadow: none;
}

.container-fluid {
    max-width: 1366px;
}

.back-to-top {
    position: fixed;
    display: none;
    background: #fbaf32;
    width: 44px;
    height: 44px;
    text-align: center;
    line-height: 1;
    font-size: 22px;
    right: 15px;
    bottom: 15px;
    border-radius: 5px;
    transition: background 0.5s;
    z-index: 9;
}

.back-to-top i {
    color: #ffffff;
    padding-top: 10px;
}

.back-to-top:hover {
    background: #719a0a;
}

[class^="flaticon-"]:before, [class*=" flaticon-"]:before,
[class^="flaticon-"]:after, [class*=" flaticon-"]:after {   
    font-size: inherit;
    margin-left: 0;
}



/*******************************/
/********** Hero CSS ***********/
/*******************************/
.carousel {
    position: relative;
    width: 100%;
    height: 100vh;
    min-height: 400px;
    background: #ffffff;
}

.carousel .container-fluid {
    padding: 0;
}

.carousel .carousel-item {
    position: relative;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.carousel .carousel-img {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: right;
    overflow: hidden;
}

.carousel .carousel-img::after {
    position: absolute;
    content: "";
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1;
}

.carousel .carousel-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.carousel .carousel-text {
    position: absolute;
    max-width: 700px;
    height: calc(100vh - 35px);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    z-index: 2;
}

.carousel .carousel-text h1 {
    text-align: center;
    color: #ffffff;
    font-size: 60px;
    font-weight: 700;
    margin-bottom: 30px;
}

.carousel .carousel-text h1 span {
    color: #fbaf32;
}

.carousel .carousel-text p {
    color: #ffffff;
    text-align: center;
    font-size: 20px;
    margin-bottom: 35px;
}

.carousel .carousel-btn .btn:last-child {
    margin-left: 10px;
    background: #719a0a;
    border-color: #719a0a;
}

.carousel .carousel-btn .btn:last-child:hover {
    color: #719a0a;
    background: transparent;
}

.carousel .animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
}

@media (max-width: 991.98px) {
    .carousel,
    .carousel .carousel-item,
    .carousel .carousel-text {
        height: calc(100vh - 105px);
    }
    
    .carousel .carousel-text h1 {
        font-size: 35px;
    }
    
    .carousel .carousel-text p {
        font-size: 16px;
    }
    
    .carousel .carousel-text .btn {
        padding: 12px 30px;
        font-size: 15px;
        letter-spacing: 0;
    }
}

@media (max-width: 767.98px) {
    .carousel,
    .carousel .carousel-item,
    .carousel .carousel-text {
        height: calc(100vh - 70px);
    }
    
    .carousel .carousel-text h1 {
        font-size: 30px;
    }
    
    .carousel .carousel-text .btn {
        padding: 10px 25px;
        font-size: 15px;
        letter-spacing: 0;
    }
}

@media (max-width: 2575.98px) {
    .carousel .carousel-text h1 {
        font-size: 25px;
    }
    
    .carousel .carousel-text .btn {
        padding: 8px 20px;
        font-size: 14px;
        letter-spacing: 0;
    }
}


/*******************************/
/******* Page Header CSS *******/
/*******************************/


/*******************************/
/******* Section Header ********/
/*******************************/
.section-header {
    margin-left: 800px;
    margin-bottom: 45px;
}

.section-header p {
    color: #719a0a;
    margin-bottom: 5px;
    position: relative;
    font-size: 20px;
}

.section-header h2 {
    margin: 0;
    position: relative;
    font-size: 45px;
    font-weight: 700;
}

@media (max-width: 991.98px) {
    .section-header h2 {
        position: relative;
        font-size: 40px;
        font-weight: 600;
    }
}

@media (max-width: 767.98px) {
    .section-header h2 {
        font-size: 35px;
        font-weight: 600;
    }
}

@media (max-width: 575.98px) {
    .section-header h2 {
        font-size: 30px;
        font-weight: 600;
    }
} 


/*******************************/
/********* Booking CSS *********/
/*******************************/
.booking {
    position: relative;
    width: 100%;
    margin-bottom: 45px;
    background: rgba(0, 0, 0, .04);
}

.booking .booking-content {
    padding: 45px 0 15px 0;
}

.booking .booking-content .section-header {
    margin-bottom: 30px;
}

.booking .booking-form {
    padding: 60px 30px;
    background: #fbaf32;
}

.booking .booking-form .control-group {
    margin-bottom: 15px;
}

.booking .booking-form .input-group-text {
    position: absolute;
    padding: 0;
    border: none;
    background: none;
    top: 15px;
    right: 15px;
    color: #ffffff;
    font-size: 14px;
}

.booking .booking-form .form-control {
    height: 45px;
    font-size: 14px;
    color: #ffffff;
    padding: 0 15px;
    border-radius: 5px !important;
    border: 1px solid #ffffff;
    background: transparent;
}

.booking .booking-form select.form-control {
    padding: 0 10px;
}

.booking .booking-form .form-control::placeholder {
    color: #ffffff;
    opacity: 1;
}

.booking .booking-form .form-control:-ms-input-placeholder,
.booking .booking-form .form-control::-ms-input-placeholder {
    color: #ffffff;
}

.booking .booking-form .input-group [data-toggle="datetimepicker"] {
    cursor: default;
}

.booking .booking-form .btn.custom-btn {
    width: 100%;
    color: #fbaf32;
    background: #ffffff;
    border: 1px solid #ffffff;
}

.booking .booking-form .btn.custom-btn:hover {
    color: #ffffff;
    background: transparent;
} 


/*******************************/
/********** Menu CSS ***********/
/*******************************/
.food {
    position: relative;
    width: 100%;
    padding: 90px 0 60px 0;
    margin: 45px 0;
    background: rgba(0, 0, 0, .04);
}

.food .food-item {
    position: relative;
    width: 100%;
    margin-bottom: 30px;
    padding: 50px 30px 30px;
    text-align: center;
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 0 30px rgba(0, 0, 0, .08);
    transition: .6s;
}

.food .food-item:hover {
    box-shadow: none;
}

.food .food-item i {
    position: relative;
    display: inline-block;
    color: #fbaf32;
    font-size: 60px;
    line-height: 60px;
    margin-bottom: 20px;
    transition: .6s;
}

.food .food-item:hover i {
    color: #719a0a;
}

.food .food-item i::after {
    position: absolute;
    content: "";
    width: calc(100% + 20px);
    height: calc(100% + 20px);
    top: -20px;
    left: -15px;
    border: 3px dotted #fbaf32;
    border-right: transparent;
    border-bottom: transparent;
    border-radius: 100px;
    transition: .3s;
}

.food .food-item:hover i::after {
    border: 3px dotted #719a0a;
    border-right: transparent;
    border-bottom: transparent;
}

.food .food-item h2 {
    font-size: 30px;
    font-weight: 700;
}

.food .food-item a {
    position: relative;
    font-size: 16px;
}

.food .food-item a::after {
    position: absolute;
    content: "";
    width: 50px;
    height: 1px;
    bottom: 0;
    left: cal (25px);
    background: #fbaf32;
    transition: .3s;
}

.food .food-item a:hover::after {
    width: 100%;
    left: 0;
    background: #719a0a;
}

.about-text{
    text-align: none;
}
</style>