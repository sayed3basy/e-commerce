<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<div class="header1">
        <div class="menu">
            <div class="logo">
                <a href="">Clothes Shop</a>
            </div>
            <div class="search-frm flex">
                <select  name="txt-cate" id="txt-cate">
                    <option value="">All Category</option>
                </select>
                <input type="search" id="txt-search" name="txt-search" placeholder="search here...">
                <div id="btn-search">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="contacts">
                <i class="fa-solid fa-phone"></i>
                <span>+20 01000723760</span>
            </div>
            
            
        </div>
    </div>
<header class="header">

   <div class="flex">


      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="new_shop.php"> Product</a>
         <a href="orders.php">Orders</a>
         <a href="contact.php">Contact</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <a href="search_page.php" class="fas fa-search"></a>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
         ?>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $count_wishlist_items->rowCount(); ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="user_profile_update.php" class="btn">update profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

   </div>

</header>