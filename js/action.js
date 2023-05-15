
var body = $('body');
var popup = `<div class='popup'>
                <div class='containers'>
                    <div class='image-container'>
                        <div class='big-image'>
                        
                            <div class="btn-slide btn-back">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <div class="btn-slide btn-next">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        <div class='small-image'>
                            
                        </div>
                    </div>
                    <div class='content'>
                        <h1></h1>
                        <div class="price"><span class="red">$12.00</span><span>-</span><span class="green">$10.00</span></div> 
                        <p>جميع انواع الملابس و احدث الموديلات متوفره عندنا ب ازن الله خد فكره و اشتري بكره قربي يا مدام اتفرجي يا انسه.
                        </p>
                        <hr>
                        
                    </div>
                    <div class="btn-close">
                        <img src="img/cancel.png" alt>
                    </div>
                </div>
            </div>`;
    var color = `<div class="color">
                    <h2>Color</h2>
                    <div class="group_color">
                        <span>BLUE</span>
                        <span>RED</span>
                        <span>BLACK</span>
                        <span>WHITE</span>
                    </div>
                </div>`;
// var size = `<div class="size">
//                 <h2>Size</h2>
//                 <div class="group_size">
//                     <span>XXS</span>
//                     <span>XS</span>
//                     <span>S</span>
//                     <span>M</span>
//                     <span>L</span>
//                 </div>
//             </div>`;

// cate
// allCategory to search
cate();
function cate(){
    var category = data.category;
    var txt = `<option value="">All Category</option>`;
    category.map((item,i)=>{
        txt += `<option value="${item.id}">${item.name}</option>`;
    })
    $('.search-frm select').html(txt);
}


// Click Bar Menu

$('.header2').on('click','.menu .bar',function(){
    $('.menu_left').toggleClass('active');
})
//seach 
var cate_id;
var seach;

const byCategory = (list, cateId) => {
    if (cateId) {
      return list.category == cateId;
    }else return list;

  };

const bySearch = (list, search) => {
    if (search) {
        return list.name.toLowerCase().includes(search.toLowerCase());
    }else{
        return list;
    }
};

// function getlistProductFilter
const filteredList = (list,cateId, search) => {
    return list
        .filter(list => bySearch(list, search))
        .filter(list => byCategory(list, cateId))
};

// function getProductfilter
function getProductFilter(){
    var product = data.product;
    var row_product = $('.row_product');
    var txt = "";
    var txt2 = ""; 
    var num = 0;
    filteredList(product, cate_id, seach).map((item,i)=>{
        num += 1
        var img = item.img;
        txt2 += `                              
                <div class="products" key=${i+1} data-id="${item.id}">
                    <div class="img_box">
                        <img src="img/${img[0]}"  alt="">
                        <div class="action">
                            <button class="btn_love"><i class="fa-solid fa-heart"></i></button>
                            <button class="btn_preview" data-opt="${item.id}"><i class="fa-solid fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="info">
                        <h3>${item.name}</h3>
                        <div class="price">
                            <a>$${item.price}</a>
                            <span>$${item.did_price}</span>
                        </div>
                    </div>
                </div>
            ` 
        
    })
    $('.right_contain .count h3').text('New In ('+num+' Items)');
    txt = `<div class="row_item">${txt2}</div>`
    row_product.html(txt);
}

// onChange On Category
$('#txt-cate').change(function(){
     cate_id = $('#txt-cate').val();  
     if(cate_id){
        getProductFilter();
    }else{
        location.reload();
    }
})

// KeyUp on Input Search
$('#txt-search').keyup(function(){
    seach = $('#txt-search').val();
    if(seach){
        getProductFilter();
    }else{
        location.reload();
        $('#txt-cate').focus();
    }
})

// Winodw Scroll
$(window).on("scroll", function() {
    if($(window).scrollTop() >=350) {
        $("#scroll-up").addClass("show-scroll");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
    $("#scroll-up").removeClass("show-scroll");
    }
});

// User
getUser();
function getUser(){
    var user = $('.menu .nav .user');
    if(window.localStorage.getItem("log")!==''){
        user.find('span').text('ACCOUNT');
        user.find('i').addClass('fa-solid fa-user');
        user.addClass('detail');
        user.find('.user_detail .my_name h2').text(window.localStorage.getItem("name"));
    }else{
        user.removeClass('detail');
        user.find('span').text('login');  
        // window.location.href = "index.php";
    }
}
$('.nav').on('click','.user',function(){
    var eThis = $(this);
    if(window.localStorage.getItem("log")==''){
        window.location.href = "login.php";
    }
});

$('.nav').on('click','.user_detail .logout',function(){
    localStorage.setItem('log','');
    window.location.href = "home.php";
})
 // slide Brand
 brand();
 function brand(){
     var txt = ""
     var brand = data.brand;
     var row_brand = $('.row_brand');
     for(i in brand){
        txt += `<div class="swiper-slide brand">
                     <img src="img/${brand[i]}" alt="">
                 </div> `;
         row_brand.find('.swiper-wrapper').html(txt)
     }
 } 

  // click over product
  body.on('click','.row_item .products',function(){
    window.location.href = "new_shop.php";
    var eThis = $(this)
    var id = eThis.data('id');
    localStorage.setItem('id', id);
});

   // click whishlis
   body.on('click','.img_box .action .btn_love',function(){ 
    var eThis = $(this);  
    eThis.find('i').toggleClass('wishlist')
    e.stopPropagation();
});

// Click to preview product
body.on('click','.img_box .action .btn_preview',function(){
            
    var eThis = $(this);
    var id = eThis.data('opt');
    body.append(popup);
    var product = data.product
    product.map((item,i)=>{
        if(item.id == id){
            console.log(item.name);
            body.find('.popup .content h1').html(item.name);
            // body.find('.popup .content p').html(item.des);
            body.find('.popup .content .price .red').text('$'+item.price);
            body.find('.popup .content .price .green').text('$'+item.did_price);
            body.find('.popup .content').find('hr').after(color);
            var img = item.img;
            var txt = "";
            var txt2 = "";
            for(i=0;i<img.length;i++){ 
                txt+=`<img src='img/${img[i]}' alt='' class="zoom">`;
                txt2+=`<img src='img/${img[i]}' alt=''>`;
            }
            body.find('.popup .big-image').append(txt);
            body.find('.popup .small-image').append(txt2);
            body.find('.popup .small-image img').eq(0).addClass('hilight');

            var slide = $('.zoom');
            var s = 0;
            var num = slide.length;

            body.on('click','.small-image img',function(){
                var eThis = $(this);
                $('.small-image').find('img').eq(s).removeClass('hilight');
                slide.eq(s).hide();
                s = eThis.index();
                slide.eq(s).show();
                $('.small-image').find('img').eq(s).addClass('hilight');
            });
            slide.hide();
            slide.eq(s).show();
            $('.btn-next').click(function(){
                nextSlide();
            });
            $('.btn-back').click(function(){
                slide.eq(s).hide();
                $('.small-image').find('img').eq(s).removeClass('hilight');
                s--;
                if(s<0){
                    s= num-1;
                }
                slide.eq(s).show();
                $('.small-image').find('img').eq(s).addClass('hilight');
            });
            var nextSlide = function () {
                slide.eq(s).hide();
                $('.small-image').find('img').eq(s).removeClass('hilight');
                s++;
                if(s>=num){
                    s=0;
                }
                slide.eq(s).show();
                $('.small-image').find('img').eq(s).addClass('hilight');
            }
            var myAutoSlide = setInterval(function()
            {
                nextSlide();
            },
            5000
            );

            $('.big-image').mouseover(function(){
                clearInterval(myAutoSlide);
            });

            $('.big-image').mouseleave(function(){
                myAutoSlide = setInterval(function()
                {
                    nextSlide();
                },
                5000
            );
            });

            body.on('click','.containers .btn-close',function(){
                $('.popup').remove();
                clearInterval(myAutoSlide);
                s=0;
            });
           
            }
        })
        e.stopPropagation();    
    
});



