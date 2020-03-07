<?php

// FrontendController

use App\Models\SubCategory;
use Illuminate\Support\Facades\Input;

Route::get('/ajax-subcat', function () {
    $cat_id = Input::get('cat_id');
    $subcategories = DB::table('sub_categories')->where('category_id', '=', $cat_id)->get();
    return Response::json($subcategories);
});
Route::get('/', 'Frontend\IndexController@index')->name('index');
Route::get('/products/{id}', 'Frontend\IndexController@products')->name('products');
Route::get('/shop', 'Frontend\IndexController@shop')->name('shop');

Route::get('/category-products/{category}-{slug}', 'Frontend\IndexController@categoryProducts')->name('category.products');
Route::get('/subcategory-products/{subcategory}-{slug}', 'Frontend\IndexController@subCategoryProducts')->name('subcategory.products');

Route::get('/product/{product}-{slug}', 'Frontend\IndexController@newproduct')->name('newproduct');
Route::get('/product/{id}', 'Frontend\IndexController@product')->name('product');
Route::get('/search', 'Frontend\IndexController@search')->name('search');
Route::get('/search-page', 'Frontend\IndexController@searchPage')->name('search.page');
Route::post('/sort-by-price', 'Frontend\IndexController@sortByPrice')->name('sort.by.price');
Route::get('/cart', 'Frontend\ShoppingController@cart')->name('cart');
// Route::get('/checkout/{id?}', 'Frontend\ShoppingController@checkoutPage')->name('checkout');
Route::get('/checkout', 'Frontend\ShoppingController@checkoutPage')->name('checkout');
Route::get('/buy-now/{product}-{slug}', 'Frontend\ShoppingController@buyNow')->name('buy.now');
Route::post('/place-order', 'Frontend\ShoppingController@placeOrder')->name('place.order');
Route::get('/thanks', 'Frontend\ShoppingController@thanks')->name('thanks');


Route::get('/change-password', 'Frontend\UserController@changePasswordView')->name('change.password');
Route::post('/change-password', 'Frontend\UserController@changePassword')->name('change.password');

Route::get('/user-profile', 'Frontend\UserController@userProfileChangeView')->name('user.profile');
Route::post('/user-profile', 'Frontend\UserController@userProfileChange')->name('user.profile');


Route::middleware(['onlyAjaxRequest'])->group(function () {
    Route::get('/add-to-cart', 'Frontend\ShoppingController@addToCart')->name('add.to.cart');
    Route::get('/frontend-carts', 'Frontend\ShoppingController@frontendCarts')->name('frontend.carts');
    Route::get('/change-quantity', 'Frontend\ShoppingController@changeQuantity')->name('change.quantity');

    Route::get('/delete-cart', 'Frontend\ShoppingController@deleteCart')->name('delete.cart');
});
Route::post('/add-review', 'Frontend\ReviewController@addReview')->name('add.review');


//Give feed back and help User side
Route::get('feedback', 'Frontend\HelpController@helpPage')->name('help');
Route::post('submit-help', 'Frontend\HelpController@submitHelp')->name('submit.help');

Route::get('/about-us', 'Frontend\IndexController@aboutUs')->name('about.us');

Route::get('/terms-and-conditions', 'Frontend\IndexController@shipingReturn')->name('shiping.return');
Route::get('/privacy-policy', 'Frontend\IndexController@privacyPolicy')->name('privacy.policy');
Route::get('/quick-contact', 'Frontend\IndexController@quickContact')->name('quick.contact');




Auth::routes();


//admin Login, logout, forget password routes
Route::prefix('yqw')->group(function () {
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
Route::prefix('yqw')->group(function () {
    Route::name('admin.')->group(function () {
        //change password
        Route::get('change-password', 'Admin\AdminController@changePasswordView')->name('change.password.view');
        Route::post('change-password', 'Admin\AdminController@changePassword')->name('change.password');

        //category
        Route::get('categories', 'Admin\CategoryController@categories')->name('categories');
        Route::get('deleted-categories', 'Admin\CategoryController@deletedCategories')->name('deleted.categories');
        Route::get('delete-category/{id}', 'Admin\CategoryController@deleteCategory')->name('delete.category');

        Route::get('restore-category/{id}', 'Admin\CategoryController@restoreCategory')->name('restore.category');
        Route::get('force-delete-category/{id}', 'Admin\CategoryController@forceDeleteCategory')->name('force.delete.category');
        Route::get('add-category', 'Admin\CategoryController@addCategoryView')->name('add.category.view');
        Route::post('add-category', 'Admin\CategoryController@addCategory')->name('add.category');

        Route::get('edit-category/{id}', 'Admin\CategoryController@editCategoryView')->name('edit.category.view');
        Route::post('edit-category', 'Admin\CategoryController@editCategory')->name('edit.category');

        // SubCategory
        Route::get('sub-categories', 'Admin\SubCategoryController@subCategories')->name('sub-categories');
        Route::get('deleted-sub-categories', 'Admin\SubCategoryController@deletedSubCategories')->name('deleted.sub-categories');
        Route::get('delete-sub-category/{id}', 'Admin\SubCategoryController@deleteSubCategory')->name('delete.sub-category');

        Route::get('restore-sub-category/{id}', 'Admin\SubCategoryController@restoreSubCategory')->name('restore.sub-category');
        Route::get('force-delete-sub-category/{id}', 'Admin\SubCategoryController@forceSubDeleteCategory')->name('force.delete.sub-category');
        Route::get('add-sub-category', 'Admin\SubCategoryController@addSubCategoryView')->name('add.sub-category.view');
        Route::post('add-sub-category', 'Admin\SubCategoryController@addSubCategory')->name('add.sub-category');

        Route::get('edit-sub-category/{id}', 'Admin\SubCategoryController@editSubCategoryView')->name('edit.sub-category.view');
        Route::post('edit-sub-category', 'Admin\SubCategoryController@editSubCategory')->name('edit.sub-category');

        //slider-image
        Route::get('slider-images', 'Admin\SliderImageController@sliderImages')->name('slider.images');
        Route::get('delete-slider-image/{id}', 'Admin\SliderImageController@deleteSliderImage')->name('delete.slider.image');
        Route::get('add-slider-image', 'Admin\SliderImageController@addSliderImageView')->name('add.slider.image.view');
        Route::post('add-slider-image', 'Admin\SliderImageController@addSliderImage')->name('add.slider.image');

        //product
        Route::get('products', 'Admin\ProductController@products')->name('products');
        Route::get('deleted-products', 'Admin\ProductController@deletedProducts')->name('deleted.products');
        Route::get('delete-product/{id}', 'Admin\ProductController@deleteProduct')->name('delete.product');
        Route::get('restore-product/{id}', 'Admin\ProductController@restoreProduct')->name('restore.product');
        Route::get('force-delete-product/{id}', 'Admin\ProductController@forceDeleteProduct')->name('force.delete.product');
        Route::get('add-product', 'Admin\ProductController@addProductView')->name('add.product.view');
        Route::post('add-product', 'Admin\ProductController@addProduct')->name('add.product');
        Route::get('edit-product/{id}', 'Admin\ProductController@editProductView')->name('edit.product.view');
        Route::post('edit-product/{id}', 'Admin\ProductController@editProduct')->name('edit.product');
        Route::get('view-product/{id}', 'Admin\ProductController@viewProduct')->name('product.view');
        Route::get('product-by-category/{id?}', 'Admin\ProductController@productByCategory')->name('product.by.category');
        Route::get('product-by-subcategory/{id?}', 'Admin\ProductController@productBySubCategory')->name('product.by.subcategory');




        // order
        Route::get('orders', 'Admin\OrderController@orders')->name('orders');
        Route::get('action/{action}/{user_identity}', 'Admin\OrderController@action')->name('action');
        Route::get('reverse/{action}/{user_identity}', 'Admin\OrderController@reverseAction')->name('reverse.action');
        Route::get('order/{id}', 'Admin\OrderController@orderView')->name('order.view');

        Route::get('delete-order/{user_identity}', 'Admin\OrderController@deleteOrder')->name('delete.order');

        Route::get('delete-order-product/{orderProductId}', 'Admin\OrderController@deleteOrderProduct')->name('delete.order.product');

        Route::get('delete-complete-order/{user_identity}', 'Admin\OrderController@deleteCompleteOrder')->name('delete.complete.order');
        Route::get('save-complete-order/{user_identity}', 'Admin\OrderController@saveCompleteOrder')->name('save.complete.order');
        Route::get('completed-orders', 'Admin\OrderController@completedOrders')->name('completed.orders');

        //reviews
        Route::get('reviews', 'Admin\ReviewHelpController@reviews')->name('reviews');
        Route::get('change-review-status/{id}', 'Admin\ReviewHelpController@changeReviewStatus')->name('change.review.status');
        Route::get('delete-review/{id}', 'Admin\ReviewHelpController@deleteReview')->name('delete.review');

        //helps
        Route::get('helps', 'Admin\ReviewHelpController@helps')->name('helps');
    });
});
