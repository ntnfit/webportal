/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/admin/users/edit_user.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/admin/users/edit_user.js ***!
  \******************************************************/
/***/ (function() {



var _this = this;
$('#upload-photo').on('change', function () {
  readURL(this, 'upload-photo-img');
});

// profile js
function readURL(input, photoId) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#' + photoId).attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$('#edit_upload-photo').on('change', function () {
  readURL(this, 'edit_upload-photo-img');
});
$('#logo_upload').on('change', function () {
  readURL(this, 'logo-img');
});
$('#favicon_upload').on('change', function () {
  readURL(this, 'favicon-img');
});
$('#pwaIcon').on('change', function () {
  readURL(this, 'pwa-icon');
});
setTimeout(function () {
  $('.alert').slideUp(function () {
    $(_this).addClass('d-none');
  });
}, 1500);
$('#settingForm').on('submit', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnSave');
  loadingButton.button('loading');
  $('#settingForm')[0].submit();
  return true;
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/js/admin/users/edit_user.js"]();
/******/ 	
/******/ })()
;