(()=>{"use strict";function t(t,n){if(t.files&&t.files[0]){var e=new FileReader;e.onload=function(t){$("#"+n).attr("src",t.target.result)},e.readAsDataURL(t.files[0])}}$("#frontCmsImg").on("change",(function(){t(this,"front-cms-img")})),$("#featuresImg").on("change",(function(){t(this,"features-img")})),$("#testimonialImageInput1").on("change",(function(){t(this,"testimonials-img-1")})),$("#testimonialImageInput2").on("change",(function(){t(this,"testimonials-img-2")})),$("#testimonialImageInput3").on("change",(function(){t(this,"testimonials-img-3")})),$("#startChatImg").on("change",(function(){t(this,"start-chat-img")})),$("#featureImageInput1").on("change",(function(){t(this,"feature-img-1")})),$("#featureImageInput2").on("change",(function(){t(this,"feature-img-2")})),$("#featureImageInput3").on("change",(function(){t(this,"feature-img-3")})),$("#featureImageInput4").on("change",(function(){t(this,"feature-img-4")})),$("#frontCmsFrom").on("submit",(function(t){return t.preventDefault(),jQuery(this).find("#btnSave").button("loading"),$("#frontCmsFrom")[0].submit(),!0}))})();