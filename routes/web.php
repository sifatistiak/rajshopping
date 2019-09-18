<?php

// FrontendController

Route::get('/', 'Frontend\IndexController@index')->name('index');
Route::get('/products/{id}', 'Frontend\IndexController@products')->name('products');
Route::get('/product/{id}', 'Frontend\IndexController@product')->name('product');
Route::get('/search', 'Frontend\IndexController@search')->name('search');
Route::get('/search_page', 'Frontend\IndexController@searchPage')->name('search.page');
Route::post('/sort_by_price', 'Frontend\IndexController@sortByPrice')->name('sort.by.price');
Route::get('/cart', 'Frontend\ShoppingController@cart')->name('cart');
Route::get('/checkout/{id?}', 'Frontend\ShoppingController@checkoutPage')->name('checkout');
Route::post('/place_order', 'Frontend\ShoppingController@placeOrder')->name('place.order');
Route::get('/thanks', 'Frontend\ShoppingController@thanks')->name('thanks');


Route::get('/change_password', 'Frontend\UserController@changePasswordView')->name('change.password');
Route::post('/change_password', 'Frontend\UserController@changePassword')->name('change.password');

Route::get('/user_profile', 'Frontend\UserController@userProfileChangeView')->name('user.profile');
Route::post('/user_profile', 'Frontend\UserController@userProfileChange')->name('user.profile');


Route::middleware(['onlyAjaxRequest'])->group(function () {
    Route::get('/add_to_cart', 'Frontend\ShoppingController@addToCart')->name('add.to.cart');
    Route::get('/frontend_carts', 'Frontend\ShoppingController@frontendCarts')->name('frontend.carts');
    Route::get('/change_quantity', 'Frontend\ShoppingController@changeQuantity')->name('change.quantity');

    Route::get('/delete_cart', 'Frontend\ShoppingController@deleteCart')->name('delete.cart');
});
Route::post('/add_review', 'Frontend\ReviewController@addReview')->name('add.review');


//Give feed back and help User side
Route::get('help', 'Frontend\HelpController@helpPage')->name('help');
Route::post('submit_help', 'Frontend\HelpController@submitHelp')->name('submit.help');

Route::get('/about_us', 'Frontend\IndexController@aboutUs')->name('about.us');

Route::get('/shiping_return', 'Frontend\IndexController@shipingReturn')->name('shiping.return');




Auth::routes();


//admin Login, logout, forget password routes
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('login', 'Auth\Admin\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\Admin\LoginController@login');
        Route::post('logout', 'Auth\Admin\LoginController@logout')->name('logout');

        //show the link request form to reset password
        Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        //Send the link - it will use the notification from admin model
        Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //receive the request from the send email
        Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('password.reset');
        //update password
        Route::post('password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('password.update');

        Route::get('index', 'Admin\AdminController@index')->name('index');
    });
});

//admin  routes
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        //change password
        Route::get('change_password', 'Admin\AdminController@changePasswordView')->name('change.password.view');
        Route::post('change_password', 'Admin\AdminController@changePassword')->name('change.password');

        //category
        Route::get('categories', 'Admin\CategoryController@categories')->name('categories');
        Route::get('delete_category/{id}', 'Admin\CategoryController@deleteCategory')->name('delete.category');
        Route::get('add_category', 'Admin\CategoryController@addCategoryView')->name('add.category.view');
        Route::post('add_category', 'Admin\CategoryController@addCategory')->name('add.category');

        //slider_image
        Route::get('slider_images', 'Admin\SliderImageController@sliderImages')->name('slider.images');
        Route::get('delete_slider_image/{id}', 'Admin\SliderImageController@deleteSliderImage')->name('delete.slider.image');
        Route::get('add_slider_image', 'Admin\SliderImageController@addSliderImageView')->name('add.slider.image.view');
        Route::post('add_slider_image', 'Admin\SliderImageController@addSliderImage')->name('add.slider.image');

        //product
        Route::get('products', 'Admin\ProductController@products')->name('products');
        Route::get('delete_product/{id}', 'Admin\ProductController@deleteProduct')->name('delete.product');
        Route::get('add_product', 'Admin\ProductController@addProductView')->name('add.product.view');
        Route::post('add_product', 'Admin\ProductController@addProduct')->name('add.product');
        Route::get('edit_product/{id}', 'Admin\ProductController@editProductView')->name('edit.product.view');
        Route::post('edit_product/{id}', 'Admin\ProductController@editProduct')->name('edit.product');
        Route::get('view_product/{id}', 'Admin\ProductController@viewProduct')->name('product.view');
        Route::get('product_by_category/{id?}', 'Admin\ProductController@productByCategory')->name('product.by.category');
        

        // order
        Route::get('orders', 'Admin\OrderController@orders')->name('orders');
        Route::get('action/{action}/{user_identity}', 'Admin\OrderController@action')->name('action');
        Route::get('reverse/{action}/{user_identity}', 'Admin\OrderController@reverseAction')->name('reverse.action');
        Route::get('order/{id}', 'Admin\OrderController@orderView')->name('order.view');

        Route::get('delete_order/{user_identity}', 'Admin\OrderController@deleteOrder')->name('delete.order');
        Route::get('delete_complete_order/{user_identity}', 'Admin\OrderController@deleteCompleteOrder')->name('delete.complete.order');
        Route::get('save_complete_order/{user_identity}', 'Admin\OrderController@saveCompleteOrder')->name('save.complete.order');
        Route::get('completed_orders', 'Admin\OrderController@completedOrders')->name('completed.orders');
        
        //reviews
        Route::get('reviews', 'Admin\ReviewHelpController@reviews')->name('reviews');
        Route::get('change_review_status/{id}', 'Admin\ReviewHelpController@changeReviewStatus')->name('change.review.status');

        //helps
        Route::get('helps', 'Admin\ReviewHelpController@helps')->name('helps');
    });
});
