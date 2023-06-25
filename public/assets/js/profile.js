(()=>{"use strict";$("#editProfileForm").on("submit",(function(e){if(!validateName()||!validateEmail()||!validatePhone())return!1;e.preventDefault();var r=jQuery(this).find("#btnEditSave");r.button("loading"),$.ajax({url:route("update.profile"),type:"post",data:new FormData($(this)[0]),processData:!1,contentType:!1,success:function(e){e.success&&(displayToastr("Success","success",e.message),setTimeout((function(){location.reload()}),2e3))},error:function(e){displayToastr("Error","error",e.responseJSON.message),setTimeout((function(){location.reload()}),2e3)},complete:function(){r.button("reset")}})})),$(":checkbox:not('.not-checkbox')").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square",increaseArea:"20%"}),$("#upload-photo").on("change",(function(){!function(e){if(e.files&&e.files[0]){var r=new FileReader;r.onload=function(e){$("#upload-photo-img").attr("src",e.target.result)},r.readAsDataURL(e.files[0])}}(this)}));$("#btnCancelEdit").on("click",(function(){$("#editProfileForm").trigger("reset")}));window.printErrorMessage=function(e,r){$(e).show().html(""),$(e).text(r.responseJSON.message)};var e=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;window.validateName=function(){return""!==$("#user-name").val()||(displayToastr("Error","error","The name field is required."),!1)},window.validateEmail=function(){var e=$("#email").val();return""===e?(displayToastr("Error","error","The email field is required."),!1):!!validateEmailFormat(e)||(displayToastr("Error","error","Please enter valid email."),!1)},window.validateEmailFormat=function(r){return e.test(r)},window.validatePhone=function(){var e=$("#phone").val();return""===e||10===e.length||(displayToastr("Error","error","The phone number must be 10 digits long."),!1)},$("#phone").on("keypress keyup blur",(function(e){if($(this).val($(this).val().replace(/[^\d].+/,"")),8!==e.which&&0!==e.which&&(e.which<48||e.which>57))return e.preventDefault(),!1}));var r=Swal.mixin({customClass:{confirmButton:"btn btn-danger mr-2 btn-lg",cancelButton:"btn btn-secondary btn-lg"},buttonsStyling:!1});$(".remove-profile-img").on("click",(function(e){e.preventDefault(),r.fire({title:"Are you sure?",html:"Your profile image removed by clicking on YES.",icon:"warning",showCancelButton:!0,confirmButtonText:"Yes, remove it!"}).then((function(e){e.value&&$.ajax({type:"DELETE",url:route("remove-profile-image"),success:function(e){displayToastr("Success","success",e.message),setTimeout((function(){location.reload()}),2e3)},error:function(e){displayToastr("Error","error",e.message)}})}))})),$(document).on("click",".changeLanguage",(function(){var e=$(this).data("prefix-value");$.ajax({type:"POST",url:route("update-language"),data:{languageName:e},success:function(){location.reload()}})})),$("#changePasswordModal").on("hidden.bs.modal",(function(){resetModalForm("#changePasswordForm","#validationErrorsBox")}))})();