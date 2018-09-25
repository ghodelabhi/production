<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//product
$route['weighing-scales/([a-zA-Z0-9-]+)/:num'] = 'ProductController/index';  //product list
$route['weighing-scales/([a-zA-Z0-9-]+)/([a-zA-Z0-9-]+)/:num'] = 'ProductController/productDetail';  //product details
//about
$route['about-us'] = 'AboutController/index';
//contact
$route['contact-us'] = 'ContactController/index';
$route['send-mail'] = 'ContactController/sendMail';
//enquiry
$route['enquiry'] = 'EnquiryController/index';
$route['send-enquiry'] = 'EnquiryController/sendEnquery'; //send enquiry
//video
$route['videos'] = 'VideoController/index';
//service
$route['services'] = 'GeneralController/index';
//accessories
$route['weighing-scales/accessories'] = 'ProductController/accessories';


////////////////////////////// ADMIN ////////////////////////////////////
//login 
$route['admin/login'] = 'admin/auth/LoginController/index';
$route['admin/checklogin'] = 'admin/auth/LoginController/checkLogin';
$route['admin/logout'] = 'admin/auth/LoginController/destroySession';

//dashboard
$route['admin'] = 'admin/DashboardController/index';
$route['admin/dashboard'] = 'admin/DashboardController/index';

//category
$route['admin/category'] = 'admin/CategoryController/index';
$route['admin/add-edit-category'] = 'admin/CategoryController/addedit';
$route['admin/addeditdata'] = 'admin/CategoryController/addeditdata'; // add edit category
$route['admin/add-edit-category/:num'] = 'admin/CategoryController/addedit/$1';  //update category
$route['admin/deletecategory/:num'] = 'admin/CategoryController/deleteCategory/$1'; // delete category
$route['admin/category-status'] = 'admin/CategoryController/changeStatus'; // change category status

//sub category
$route['admin/sub-category'] = 'admin/SubCategoryController/index';
$route['admin/add-edit-subcategory'] = 'admin/SubCategoryController/addEditSubCategory'; //add subcategory view
$route['admin/add-edit-subcategory/:num'] = 'admin/SubCategoryController/addEditSubCategory/$1';  //update subcategory view
$route['admin/addeditsubcategory'] = 'admin/SubCategoryController/addEditData'; //add edit sub category
$route['admin/deletesubcategory/:num'] = 'admin/SubCategoryController/deleteSubCategory/$1'; // delete sub category
$route['admin/subcategory-status'] = 'admin/SubCategoryController/changeStatus'; // change category status

//enquiry
$route['admin/enquiry'] = 'admin/EnquiryController/index';
$route['admin/show-enquiry'] = 'admin/EnquiryController/showEnquiry';

//video
$route['admin/video'] = 'admin/VideoController/index';
$route['admin/video/add-edit-video'] = 'admin/VideoController/addEdit'; //add
$route['admin/video/add-edit-video/:num'] = 'admin/VideoController/addEdit/$1';	//edit
$route['admin/video/addeditvideo'] = 'admin/VideoController/addEditData'; //add edit
$route['admin/video/deletevideo/:num'] = 'admin/VideoController/deleteVideo/$1'; //delete

//product
$route['admin/product'] = 'admin/ProductController/index';
$route['admin/product/add-edit-product'] = 'admin/ProductController/addEdit'; //add
$route['admin/product/add-edit-product/:num'] = 'admin/ProductController/addEdit/$1';	//edit
$route['admin/loadSubCategory'] = 'admin/ProductController/loadSubCategory'; //load subcategory using ajax
$route['admin/product/addeditproduct'] = 'admin/ProductController/addEditData'; //add edit
$route['admin/deleteproduct/:num'] = 'admin/ProductController/deleteProduct/$1'; //delete
$route['admin/product-status'] = 'admin/ProductController/changeStatus'; // change product status

//accessories----image
$route['admin/accessory/accessory_image'] = 'admin/AccessoryController/index';
$route['admin/accessory/add-edit-image'] = 'admin/AccessoryController/addEditImage'; //add
$route['admin/accessory/addeditdataImage'] = 'admin/AccessoryController/addeditdataImage'; // add edit image

//----title
$route['admin/accessory/accessory_title'] = 'admin/AccessoryController/title';
$route['admin/accessory/add-edit-title'] = 'admin/AccessoryController/addEditTitle'; //add
$route['admin/accessory/addeditdataTitle'] = 'admin/AccessoryController/addeditdataTitle'; // add edit title
$route['admin/accessory/add-edit-title/:num'] = 'admin/AccessoryController/addEditTitle';	//edit
$route['admin/deletetitle/:num'] = 'admin/AccessoryController/deleteTitle/$1'; //delete

//accessories
$route['admin/accessory'] = 'admin/AccessoryController/index';
$route['admin/accessory/add-edit-accessory'] = 'admin/AccessoryController/addedit';
$route['admin/accessory/addeditdata'] = 'admin/AccessoryController/addeditdata';
$route['admin/accessory/add-edit-accessory/:num'] = 'admin/AccessoryController/addedit/$1';	//edit

//services
$route['admin/services/cc'] = 'admin/ServicesController/index';
$route['admin/services/add-edit-cc'] = 'admin/ServicesController/addEditCC'; //add

//about
$route['admin/about'] = 'admin/AboutController/index';
$route['admin/about/add-edit-about'] = 'admin/AboutController/addedit';
$route['admin/about/add-edit-about/:num'] = 'admin/AboutController/addedit/$1';	//edit
$route['admin/about/addeditdata'] = 'admin/AboutController/addeditdata';

//brand
$route['admin/brand'] = 'admin/BrandController/index';
$route['admin/brand/add-edit-brand'] = 'admin/BrandController/addedit';
$route['admin/brand/addeditdata'] = 'admin/BrandController/addeditdata';
$route['admin/brand/add-edit-brand/:num'] = 'admin/BrandController/addedit/$1';	//edit
$route['admin/delete_brand/:num'] = 'admin/BrandController/delete_brand/$1'; //delete

//banner image
$route['admin/banner'] = 'admin/BannerController/index';
$route['admin/banner/add-edit-banner'] = 'admin/BannerController/addedit';
$route['admin/banner/addeditdata'] = 'admin/BannerController/addeditdata';
$route['admin/banner/add-edit-banner/:num'] = 'admin/BannerController/addedit/$1';	//edit
$route['admin/delete_banner/:num'] = 'admin/BannerController/delete_banner/$1'; //delete