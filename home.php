 <?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'already added to wishlist!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
   <!-- custom css file link  -->
   <script src="js/jquery-3.2.1.min.js"></script>
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/style.css">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</head>
<body>
   
<?php include 'header.php'; ?>

<div class="container_slide">
        <div class="slide">
            <div class="slide-menu">
                <div class="cate flex" style="background-color:#233a95;color:#fff; border-radius:5px;">
                    <span>All Category</span>
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul>
                </ul>
            </div>    
            <div class="slider">
                <div class="swiper slide_box"> 
                    <div class="swiper-wrapper">
                       <!--  -->
                    </div>   
                    <div class="btn-slide btn-back">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="btn-slide btn-next">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="swiper-pagination"></div>              
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="left_contain">
            
            <div class="row_product">
                <div class="title">
                    TOP RATE PRODUCTS
                </div>
                <div class="item_products">
                    <div class="product">
                        <div class="img_box">
                            <img src="img/1 (6).jpg" alt="">
                        </div>
                        <div class="des">
                            <h3>PUFFER COAT</h3>
                            <div class="price">
                                <a>$100</a>
                                <span>$80</span>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="img_box">
                            <img src="img/3 (65).jpg" alt="">
                        </div>
                        <div class="des">
                            <h3>T-SHIRT</h3>
                            <div class="price">
                                <a>$120</a>
                                <span>$100</span>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="img_box">
                            <img src="img/1 (35).jpg" alt="">
                        </div>
                        <div class="des">
                            <h3>JACKET</h3>
                            <div class="price">
                                <a>$700</a>
                                <span>$650</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row_pic">
                <img src="img/pic3.jpg" alt="">
            </div>
            <div class="row_product">
                <div class="title">
                    TOP RATE PRODUCTS
                </div>
                <div class="item_products">
                    <div class="product">
                        <div class="img_box">
                            <img src="img/1 (11).jpg" alt="">
                        </div>
                        <div class="des">
                            <h3>Jens Baby</h3>
                            <div class="price">
                                <a>$175</a>
                                <span>$160</span>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="img_box">
                            <img src="img/2 (42).jpg" alt="">
                        </div>
                        <div class="des">
                            <h3>JACKET</h3>
                            <div class="price">
                                <a>$1250</a>
                                <span>$1200</span>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="img_box">
                            <img src="img/3 (62).jpg" alt="">
                        </div>
                        <div class="des">
                            <h3>JACKET Pispol</h3>
                            <div class="price">
                                <a>$700</a>
                                <span>$650</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right_contain">
            <div class="swiper row_category">
                <div class="swiper-wrapper">
                    
                </div>  
            </div>
            <div class="row_product">                
                <div class="row_slide">
                    <div class="box_pic">
                        <img src="" alt="">
                        <div class="title">
                            <h3>Fastion Store</h3>
                            <h1>MODERN HEADBAGE'S</h1>
                        </div>
                    </div>
                    <div class="box_pic">
                        <img src="i" alt="">
                        <div class="title">
                            <h3>Furnitur Store</h3>
                            <h1>WOODEN LIFGT'S</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="swiper row_brand" >
                <div class="swiper-wrapper">

                </div>
            </div> -->
        </div>
    </div>
    <?php include 'footer.php'; ?>

<script src="js/script.js"></script>
</body>
<script src="js/data.js"></script>
<script src="js/action.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    $(document).ready(function(){
        
         // MenuCategory================
         slideCategory();
        function slideCategory(){
            var txt = ""
            var slideMenu = $('.slide-menu');
            var slideCate = data.category;
            var slideCate = slideCate.slice(0,5);
            for(i in slideCate){
                txt += `<li>
                            <a class="flex" data-opt="${slideCate[i].id}">
                                <span>${slideCate[i].name}</span>
                                <i class="${slideCate[i].icon}"></i>
                            </a>
                        </li>`;
                slideMenu.find('ul').html(txt);
            }
        } 

        // Click on link
        $('.slide').on('click','.slide-menu ul li a',function(){
            var eThis = $(this);
            var id = eThis.data('opt');
            var row_product = $('.right_contain .row_product');                            
            var product = data.product;
            var txt2 = "";
                product.map((item,i)=>{
                    if(item.category == id){
                        var img = item.img;
                            txt2 += `                              
                                    <div class="products" data-id="${item.id}">
                                        <div class="img_box">
                                            <img src="img/${img[0]}" alt="">
                                            <div class="action">
                                                <button class="btn_love"><i class="fa-solid fa-heart"></i></button>
                                                <button class="btn_preview" data-opt="${item.id}"> <i class="fa-solid fa-eye"></i></button>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h3>${item.name}</h3>
                                            <div class="price">
                                                <a>$${product[i].price}</a>
                                                <span>$${product[i].did_price}</span>
                                            </div>
                                        </div>
                                    </div>
                                ` 
                                        
                    }
                })
            var txt1 = `<div class="row_item">${txt2}</div>`
            row_product.html(txt1);
        });
        
        // Slide====================
        slide()
        function slide(){
            var txt = ""
            var slide = data.slide;
            var slide_box = $('.slide_box');
            for(i in slide){
               txt += `<div class="swiper-slide slides">
                            <img src="img/${slide[i]}" alt="">
                        </div> `;
                slide_box.find('.swiper-wrapper').html(txt)
            }
        }
        
        // category
        category()
        function category(){
            var txt = ""
            var category = data.category;
            var row_category = $('.row_category');
            for(i in category){
               txt += `<div class="swiper-slide category" data-opt="${category[i].id}">
                        <img src="img/${category[i].img}" alt="">
                    </div> `;
                row_category.find('.swiper-wrapper').html(txt)
            }
        }
        
        // Click on Category 
        $('.row_category').on('click','.category',function(){
            var eThis = $(this);
            var id = eThis.data('opt');
            var row_product = $('.right_contain .row_product');                            
                var product = data.product;
                var txt2 = "";
                product.map((item,i)=>{
                    if(item.category == id){
                        var img = item.img;
                         txt2 += `                              
                                    <div class="products" data-id="${item.id}">
                                        <div class="img_box">
                                            <img src="img/${img[0]}" alt="">
                                            <div class="action">
                                                <button class="btn_love"><i class="fa-solid fa-heart"></i></button>
                                                <button class="btn_preview" data-opt="${item.id}"><i class="fa-solid fa-eye"></i></button>
                                                <button><i class="fa-solid fa-cart-shopping"></i></button>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h3>${item.name}</h3>
                                            <div class="price">
                                                <a>$${product[i].price}</a>
                                                <span>$${product[i].did_price}</span>
                                            </div>
                                        </div>
                                    </div>
                                ` 
                                     
                    }
                })
                var txt1 = `<div class="row_item">${txt2}</div>`
            row_product.html(txt1);
        })
        
        // GetProductData 
        getProduct();
        function getProduct(){
            var category = data.category;
            var category = category.slice(0,4)
            var txt1 = "";
            var row_product = $('.right_contain .row_product');
            for(i in category){
                var id = category[i].id
                var name = category[i].name
                txt1 += `<div class="row_title">
                                    <h3>${name}</h3>
                                </div>`
         
                var product = data.product;
                product = product.slice(0,50)
                var txt2 = "";
                product.map((item,i)=>{
                    if(item.category == id){
                        console.log(product[i].id)
                        var img = item.img;
                         txt2 += `                              
                                    <div class="swiper-slide products" data-id="${item.id}">
                                        <div class="img_box">
                                            <img src="img/${img[0]}" alt="">
                                            <div class="action">
                                                <button class="btn_love"><i class="fa-solid fa-heart"></i></button>
                                                <button class="btn_preview" data-opt="${item.id}"><i class="fa-solid fa-eye"></i></button>
                                                <button><i class="fa-solid fa-cart-shopping"></i></button>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h3>${item.name}</h3>
                                            <div class="price">
                                                <a>$${product[i].price}</a>
                                                <span>$${product[i].did_price}</span>
                                            </div>
                                        </div>
                                    </div>
                                ` 
                                     
                    }
                })
                txt1 += `<div class="swiper row_item"><div class="swiper-wrapper">${txt2}</div></div>`
                
            }
            row_product.append(txt1);
            
        }
     
     
                  
        var swiper = new Swiper(".row_category", {
            loop:true,
            spaceBetween: 20,
            breakpoints: {
                0: {
                    slidesPerView: 3,
                },
                650: {
                    slidesPerView: 3,   
                },
                768: {
                    slidesPerView: 4,
                },
                1024: {
                    slidesPerView: 5,
                },
            }
        });
        var swiper = new Swiper(".slide_box", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
            navigation: {
            nextEl: ".btn-next",
            prevEl: ".btn-back",
            },
            autoplay: {
            delay: 7500,
            disableOnInteraction: false,
            },
        });
     
        var swiper = new Swiper(".row_brand", {
            loop:true,
            spaceBetween: 20,
            breakpoints: {
                0: {
                    slidesPerView: 3,
                },
                650: {
                    slidesPerView: 3,   
                },
                768: {
                    slidesPerView: 4,
                },
                1024: {
                    slidesPerView: 6,
                },
            }
        });
        var swiper = new Swiper(".row_item", {
            loop:true,
            spaceBetween: 20,
            breakpoints: {
                0: {
                    slidesPerView: 3,
                },
                650: {
                    slidesPerView: 3,   
                },
                768: {
                    slidesPerView: 4,
                },
                1024: {
                    slidesPerView: 5,
                },
            }
        });
    })
</script>
</php>
</html>
