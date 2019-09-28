<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'admin/vendors/custom/fullcalendar/fullcalendar.bundle.css',

//		<!--end::Page Vendors Styles -->

//		<!--begin:: Global Mandatory Vendors -->
//        'admin/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css',

//		<!--end:: Global Mandatory Vendors -->

//		<!--begin:: Global Optional Vendors -->
        "admin/media/logos/favicon.ico",
        "admin/app/custom/login/login-v4.default.css",
        'admin/siteadmin.css',
        'admin/vendors/general/tether/dist/css/tether.css',
//        'admin/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
//        'admin/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css',
//        'admin/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css',
//        'admin/vendors/general/bootstrap-daterangepicker/daterangepicker.css',
//        'admin/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css',
//        'admin/vendors/general/bootstrap-select/dist/css/bootstrap-select.css',
//        'admin/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css',
//        'admin/vendors/general/select2/dist/css/select2.css',
        'admin/vendors/general/ion-rangeslider/css/ion.rangeSlider.css',
        'admin/vendors/general/nouislider/distribute/nouislider.css',
//        'admin/vendors/general/owl.carousel/dist/assets/owl.carousel.css',
        'admin/vendors/general/owl.carousel/dist/assets/owl.theme.default.css',
//        'admin/vendors/general/dropzone/dist/dropzone.css',
        'admin/vendors/general/summernote/dist/summernote.css',
//        'admin/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css',
//        'admin/vendors/general/animate.css/animate.css',
        'admin/vendors/general/toastr/build/toastr.css',
//        'admin/vendors/general/morris.js/morris.css',
        'admin/vendors/general/sweetalert2/dist/sweetalert2.css',
//        'admin/vendors/general/socicon/css/socicon.css',
        'admin/vendors/custom/vendors/line-awesome/css/line-awesome.css',
        'admin/vendors/custom/vendors/flaticon/flaticon.css',
        'admin/vendors/custom/vendors/flaticon2/flaticon.css',
        'admin/vendors/custom/vendors/fontawesome5/css/all.min.css',

//		<!--end:: Global Optional Vendors -->

//		<!--begin::Global Theme Styles(used by all pages) -->
        'admin/demo/default/base/style.bundle.css',

//		<!--end::Global Theme Styles -->

//		<!--begin::Layout Skins(used by all pages) -->
        'admin/demo/default/skins/header/base/light.css',
        'admin/demo/default/skins/header/menu/light.css',
        'admin/demo/default/skins/brand/dark.css',
        'admin/demo/default/skins/aside/dark.css',

//		<!--end::Layout Skins -->

    ];
    public $js = [
//        "admin/vendors/general/jquery/dist/jquery.js",
        "admin/vendors/general/popper.js/dist/umd/popper.js",
//        "admin/vendors/general/bootstrap/dist/js/bootstrap.min.js",
//        "admin/vendors/general/js-cookie/src/js.cookie.js",
        "admin/vendors/general/moment/min/moment.min.js",
        "admin/vendors/general/tooltip.js/dist/umd/tooltip.min.js",
        "admin/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js",
        "admin/vendors/general/sticky-js/dist/sticky.min.js",
//        "admin/vendors/general/wnumb/wNumb.js",

//    <!--end:: Global Mandatory Vendors -->

//    <!--begin:: Global Optional Vendors -->
//        "admin/vendors/general/jquery-form/dist/jquery.form.min.js",
        "admin/vendors/general/block-ui/jquery.blockUI.js",
//        "admin/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
//        "admin/vendors/custom/components/vendors/bootstrap-datepicker/init.js",
//        "admin/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js",
//        "admin/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js",
//        "admin/vendors/custom/components/vendors/bootstrap-timepicker/init.js",
//        "admin/vendors/general/bootstrap-daterangepicker/daterangepicker.js",
        "admin/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js",
//        "admin/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js",
//        "admin/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js",
//        "admin/vendors/general/bootstrap-select/dist/js/bootstrap-select.js",
//        "admin/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js",
//        "admin/vendors/custom/components/vendors/bootstrap-switch/init.js",
//        "admin/vendors/general/select2/dist/js/select2.full.js",
//        "admin/vendors/general/ion-rangeslider/js/ion.rangeSlider.js",
//        "admin/vendors/general/typeahead.js/dist/typeahead.bundle.js",
        "admin/vendors/general/handlebars/dist/handlebars.js",
        "admin/vendors/general/inputmask/dist/jquery.inputmask.bundle.js",
//        "admin/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js",
//        "admin/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js",
        "admin/vendors/general/nouislider/distribute/nouislider.js",
//        "admin/vendors/general/owl.carousel/dist/owl.carousel.js",
        "admin/vendors/general/autosize/dist/autosize.js",
//        "admin/vendors/general/clipboard/dist/clipboard.min.js",
//        "admin/vendors/general/dropzone/dist/dropzone.js",
        "admin/vendors/general/summernote/dist/summernote.js",
        "admin/vendors/general/markdown/lib/markdown.js",
//        "admin/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js",
//        "admin/vendors/custom/components/vendors/bootstrap-markdown/init.js",
        "admin/vendors/general/bootstrap-notify/bootstrap-notify.min.js",
        "admin/vendors/custom/components/vendors/bootstrap-notify/init.js",
        "admin/vendors/general/jquery-validation/dist/jquery.validate.js",
        "admin/vendors/general/jquery-validation/dist/additional-methods.js",
//        "admin/vendors/custom/components/vendors/jquery-validation/init.js",
        "admin/vendors/general/toastr/build/toastr.min.js",
//        "admin/vendors/general/raphael/raphael.js",
//        "admin/vendors/general/morris.js/morris.js",
        "admin/vendors/general/chart.js/dist/Chart.bundle.js",
//        "admin/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js",
//        "admin/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js",
        "admin/vendors/general/waypoints/lib/jquery.waypoints.js",
//        "admin/vendors/general/counterup/jquery.counterup.js",
        "admin/vendors/general/es6-promise-polyfill/promise.min.js",
//        "admin/vendors/general/sweetalert2/dist/sweetalert2.min.js",
//        "admin/vendors/custom/components/vendors/sweetalert2/init.js",
        "admin/vendors/general/jquery.repeater/src/lib.js",
//        "admin/vendors/general/jquery.repeater/src/jquery.input.js",
//        "admin/vendors/general/jquery.repeater/src/repeater.js",
        "admin/vendors/general/dompurify/dist/purify.js",

//    <!--end:: Global Optional Vendors -->

//    <!--begin::Global Theme Bundle(used by all pages) -->
        "admin/demo/default/base/scripts.bundle.js",

//    <!--end::Global Theme Bundle -->

//    <!--begin::Page Vendors(used by this page) -->
        "admin/vendors/custom/fullcalendar/fullcalendar.bundle.js",
//        "//maps.google.com/maps/apidel/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM",
//        "admin/vendors/custom/gmaps/gmaps.js",

//    <!--end::Page Vendors -->

//    <!--begin::Page Scripts(used by this page) -->
        "admin/app/custom/general/dashboard.js",

//    <!--end::Page Scripts -->

//    <!--begin::Global App Bundle(used by all pages) -->
        "admin/app/bundle/app.bundle.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
