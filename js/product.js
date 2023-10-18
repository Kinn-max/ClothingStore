
// quantity add and minus

var quantity_minus = document.querySelector('.product_quantity-giam')
var quantity_add = document.querySelector('.product_quantity-tang')
var count_quantity = 1;
var value_quantity = document.querySelector('.value_product')
var quantity_main = document.getElementById('quantity_main')

quantity_add.addEventListener('click',function(){
    change(1);
    value_quantity.value = count_quantity
    quantity_main.textContent = count_quantity

})
quantity_minus.addEventListener('click', function(){
   change(-1);
   value_quantity.value = count_quantity
   quantity_main.textContent = count_quantity

})


function change(index){
     if(index == 1){
        count_quantity++;
     }
     if(index == -1){
        if(count_quantity <= 0){
            count_quantity = 0;
            return;
        }
        count_quantity--;
     }

}
// size product


var product_size_list = document.querySelectorAll('.product_size-list--item');
var bold_type = document.querySelector('.bold_type-size');
if (product_size_list.length > 0){
   product_size_list[0].style.backgroundColor = 'rgba(0,0,0,0.3)';
   bold_type.textContent = product_size_list[0].textContent; // Use textContent here
   var length_product = product_size_list.length;
   
   for (let i = 0; i < length_product; i++) {
      product_size_list[i].addEventListener('click', function () {
         for (let j = 0; j < length_product; j++) {
            product_size_list[j].style.backgroundColor = 'transparent';
         }
        this.style.backgroundColor = 'rgba(0,0,0,0.3)';
        content_size = this.querySelector('span');
        bold_type.textContent = content_size.textContent; // Use textContent here
      });
   }

}else{
   bold_type.textContent = "Không"
}


// img big product

document.addEventListener('DOMContentLoaded', function () {
   var list_img = document.querySelectorAll('.img-item--list');
   var img_big = document.getElementById('img_big');
   var img_length = list_img.length;
 
   for (var i = 0; i < img_length; i++) {
     (function (index) {
       list_img[index].addEventListener('click', function () {
         for(let j = 0; j< img_length ;j++){
            list_img[j].classList.remove('tmp_pick_img')
         }
         list_img[index].classList.add('tmp_pick_img')
         var img_list_chose = list_img[index].querySelector('img');
         img_big.src = img_list_chose.src;
       });
     })(i);
   }
 });
 


