"use strict";function GSPB_render_Swiper(e){let t=parseFloat(e.dataset.slidesperview),s=parseFloat(e.dataset.slidesperviewmd),a=parseFloat(e.dataset.slidesperviewsm),r=parseFloat(e.dataset.slidesperviewxs),l=parseInt(e.dataset.spacebetween),o=parseInt(e.dataset.spacebetweenmd),c=parseInt(e.dataset.spacebetweensm),n=parseInt(e.dataset.spacebetweenxs),p=parseInt(e.dataset.speed),d=JSON.parse(e.dataset.loop),w=JSON.parse(e.dataset.autoheight),g=JSON.parse(e.dataset.grabcursor),u=JSON.parse(e.dataset.freemode),v=JSON.parse(e.dataset.vertical),f=JSON.parse(e.dataset.centered),b=JSON.parse(e.dataset.autoplay),y=parseInt(e.dataset.autodelay);1==y&&(y=0);let m=e.dataset.effect,h=parseInt(e.dataset.coverflowrotate),x=parseInt(e.dataset.coverflowdepth),S=JSON.parse(e.dataset.coverflowshadow),q=e.dataset.customparams?JSON.parse(e.dataset.customparams):"",E="",B="",P=e.closest(".gs-slider-root");P||(P=e.closest(".gspb_row")),P&&(E=P.querySelector(".gs-slider-custom-btn-right"),B=P.querySelector(".gs-slider-custom-btn-left")),new Swiper(e.querySelector(".swiper:not(.swiper-initialized)"),{spaceBetween:l,slidesPerView:t,speed:p,loop:d,autoHeight:w,direction:v?"vertical":"horizontal",grabCursor:g,freeMode:u,centeredSlides:f,autoplay:!!b&&{delay:y},effect:"coverflow"==m||"creative"==m||"cards"==m?m:null,coverflowEffect:"coverflow"==m?{rotate:h,slideShadows:S,depth:x}:null,creativeEffect:"creative"==m?{prev:{translate:[q.prev.translateX,q.prev.translateY,q.prev.translateZ],rotate:[q.prev.rotateX,q.prev.rotateY,q.prev.rotateZ],opacity:q.prev.opacity,scale:q.prev.scale,shadow:q.prev.shadow,origin:q.prev.origin},next:{translate:[q.next.translateX,q.next.translateY,q.next.translateZ],rotate:[q.next.rotateX,q.next.rotateY,q.next.rotateZ],opacity:q.next.opacity,scale:q.next.scale,shadow:q.next.shadow,origin:q.next.origin},perspective:!0}:null,breakpoints:{236:{slidesPerView:r||t,spaceBetween:n||l},576:{slidesPerView:a||t,spaceBetween:c||l},768:{slidesPerView:s||t,spaceBetween:o||l},992:{spaceBetween:l,slidesPerView:t}},on:{slideChange:function(e){let t=e.el,s=t.closest(".gs-slider-root");if(s||(s=t.closest(".gspb_row")),s){let a=s.querySelectorAll(".gs-slider-control-btn");Array.prototype.forEach.call(a,function(e){e.classList.remove("active")});let r=e.activeIndex+1,l=s.querySelectorAll(".gs-slideto-"+r);Array.prototype.forEach.call(l,function(e){e.classList.add("active")})}}},pagination:{el:e.querySelector(".swiper-pagination"),type:"bullets"},navigation:{nextEl:E||e.querySelector(".swiper-button-next"),prevEl:B||e.querySelector(".swiper-button-prev")},scrollbar:{el:e.querySelector(".swiper-scrollbar"),draggable:!0}})}var gcswiperinits=document.getElementsByClassName("gs-swiper-init");for(let i=0;i<gcswiperinits.length;i++)GSPB_render_Swiper(gcswiperinits[i]);let gspbslidercustom=document.getElementsByClassName("gs-slider-control-btn");for(let i=0;i<gspbslidercustom.length;i++){let e=gspbslidercustom[i],t=e.closest(".gs-slider-root");if(t||(t=e.closest(".gspb_row")),t){let s=t.querySelector(".swiper");if(s){let a=s.swiper,r=e.getAttribute("class").match(/gs-slideto-([0-9]+)/)[1];e.addEventListener("click",function(e){a.slideTo(parseInt(r)-1)})}}}