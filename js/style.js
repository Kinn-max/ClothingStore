

var click_left = document.querySelector('.wrap_click-left')
var click_right = document.querySelector('.wrap_click-right')
var wrap_all = document.querySelector('.wrap_all')
var wrap_dot = document.querySelectorAll('.wrap_dot-list')
var limitLenght = wrap_all.children.length
var count = 0;
var window_first = 0;
if(window.innerWidth <= 425){
    window_first = window.innerWidth
}
else{
    window_first = 500
}

click_left.addEventListener('click',function(){
    console.log("giam")
    changeLength(-1);
    upDataMargin()
    
})
click_right.addEventListener('click',function(){
    console.log("tang")
    changeLength(1);
    upDataMargin()
})
function changeLength(index){
    if(index == 1){
        count++;
        if(count >= limitLenght ){
            count = 0;
            return;
        }
    }
    if(index == -1){
        count--;
        if(count <= 0){
            count = 0;
            return
        }
        
    }
}
function upDataMargin(){
    for (var i = 0; i < wrap_dot.length; i++) {
        wrap_dot[i].style.backgroundColor = "transparent";
    }
    wrap_dot[count].style.transition = "background-color 0.8s linear";
    wrap_dot[count].style.backgroundColor = "#333"
    wrap_all.style.marginLeft = -count*window_first + 'px';
}
setInterval(function () {
    changeLength(1);
    upDataMargin()
}, 3000);
/* collection */
var click_left_coll = document.querySelector('.wrap_click-left--coll')
var click_right_coll = document.querySelector('.wrap_click-right--coll')
var wrap_all_coll = document.querySelector('.wrap_all--coll')
var wrap_dot_coll = document.querySelectorAll('.wrap_dot-list--coll')
var wrap_ifor = document.querySelectorAll('.wrap_ifor-more-dentail--list')
var limitLenght_coll = wrap_all_coll.children.length
var lengthAll_coll = wrap_all_coll.children.length*500
var count_coll = 0;

click_left_coll.addEventListener('click',function(){
    changeLength_coll(-1);
    upDataMargin_coll()
    
})
click_right_coll.addEventListener('click',function(){
    changeLength_coll(1);
    upDataMargin_coll()
})
function changeLength_coll(index){
    if(index == 1){
        count_coll++;
        if(count_coll >= limitLenght_coll ){
            count_coll = 0;
            return;
        }
    }
    if(index == -1){
        count_coll--;
        if(count_coll <= 0){
            count_coll = 0;
            return
        }
        
    }
}
wrap_dot_coll[0].style.backgroundColor = "#333"
wrap_ifor[0].style.display = "block"
var windowWidth = 0;
if(window.innerWidth <= 700){
    windowWidth = window.innerWidth
}
else{
    windowWidth = 700;
}
function upDataMargin_coll(){
    for (var i = 0; i < wrap_dot_coll.length; i++) {
        wrap_dot_coll[i].style.backgroundColor = "transparent";
    }
    for (var i = 0; i < wrap_ifor.length; i++) {
        wrap_ifor[i].style.display = "none"
    }
    wrap_ifor[count_coll].style.display = "block"
    wrap_dot_coll[count_coll].style.transition = "background-color 0.8s linear";
    wrap_dot_coll[count_coll].style.backgroundColor = "#333"
    wrap_all_coll.style.marginLeft = -count_coll*windowWidth + 'px';
}

// open menu taskbar with icon

var close = document.querySelector('.name_sign-close')
var open = document.querySelector(".title_signCart-bar")
var menu = document.querySelector('.taskbar')

open.addEventListener('click',function(){
     menu.style.display = 'block'
})
close.addEventListener('click',function(){
    menu.style.display = 'none'
})
//open search










