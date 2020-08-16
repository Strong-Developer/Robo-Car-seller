<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home-2', 'PagesHandler@homeNew')->name('home.new');
Route::get('/pages/{page_url}', 'AdminHandler@viewCustomPage')->name('page.custom');
Route::get('/login-2', 'PagesHandler@loginNew')->name('login.new');
Route::get('/register', 'PagesHandler@newRegister')->name('cms.pages.register');
Route::get('/negotiate', 'PagesHandler@negotiate')->name('negotiate.iframe');
Route::get('/load-plugin-content', 'PluginHandler@loadHtmlContent')->name('plugin.content.load');
Route::get('/load-plugin-stylesheet', 'PluginHandler@loadStyleSheet')->name('plugin.stylesheet.load');
Route::get('/instant-deal-check', 'ProductHandler@instantDealCheck')->name('negotiate.instantDealCheck');
Route::get('/get-deal-status', 'ProductHandler@checkBuyerOfferWithId')->name('negotiate.getdealstatus');
Route::get('/getDealStatus', 'ProductHandler@getDealStatus')->name('negotiate.getDealStatus');
Route::post('/save-payment', 'ProductHandler@savePayment')->name('payment.save');
Route::get('/save-payment-info', 'ProductHandler@savePayment')->name('payment.save.get');
Route::get('/car', 'PagesHandler@carHome')->name('home.car');
Route::get('/cars', 'PagesHandler@cars')->name('home.cars');
Route::get('/catalogue', 'PagesHandler@cars')->name('home.catalogue');
Route::get('/catalog', 'PagesHandler@cars')->name('home.catalog');
Route::get('/cars-details', 'PagesHandler@getProductDetailsN')->name('home.car.details');
Route::get('/', 'PagesHandler@index')->name('home.main');
Route::get('/sign-up', 'PagesHandler@register')->name('home.register');
Route::get('/login', 'PagesHandler@login')->name('home.login');
Route::get('/app-login', 'PagesHandler@login')->name('login');
Route::get('/logout', 'LoginHandler@logout')->name('logout');
Route::post('/sign-up', 'RegisterHandler@addSeller')->name('register.submit');
Route::post('/login', 'LoginHandler@login')->name('login.submit');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'PagesHandler@dashboard')->name('dashboard');
    //Route::get('/dashboard', 'PagesHandler@dashboard_new')->name('dashboard');
    Route::get('/set-rules', 'PagesHandler@setRules')->name('setrules');
    Route::get('/customer', 'PagesHandler@customerProfile')->name('customer');
    Route::post('/set-rules', 'ProductHandler@setNegotiationRules')->name('setrules.submit');
    Route::post('/import-csv', 'ProductHandler@importDealsFromCSV')->name('import.csv');
    Route::get('/deal-progress', 'PagesHandler@viewProgress')->name('viewProgress');
    Route::post('/deal-progress', 'ProductHandler@getDealProgress')->name('get.progress');
    Route::get('/upload-a-deal', 'PagesHandler@addProduct')->name('addProduct');
    Route::get('/edit-a-deal', 'ProductHandler@editDeal')->name('editProduct');
    Route::post('/upload-deal', 'ProductHandler@addProduct')->name('addProduct.submit');
    Route::post('/edit-a-deal', 'ProductHandler@editDealAction')->name('editProduct.submit');
    Route::get('/manage-products', 'ProductHandler@manageProducts')->name('products.manage');
    Route::post('/deal-intelligence', 'ProductHandler@getDealIntelligence')->name('deal.intelligence');
    Route::post('/market-price', 'ProductHandler@getMarketPriceOfProduct')->name('get.marketprice');
    Route::post('/intelligence-report', 'ProductHandler@getIntelligenceReport')->name('get.intelligenceReport');
    Route::post('/demographicsReport', 'ProductHandler@getDemographicsReport')->name('get.demographicsReport');
    Route::post('/matchedBuyers', 'ProductHandler@getmatchedBuyers')->name('get.matchedBuyers');
    Route::post('/customerProfile', 'ProductHandler@getCustomerProfile')->name('get.customerProfile');
});
Route::get('/products', 'PagesHandler@viewProducts')->name('buyer.products');
Route::post('/search', 'ProductHandler@getProducts')->name('products.search');
Route::post('/AllProducts', 'ProductHandler@getAllProducts')->name('products.all');
Route::get('/product-details', 'PagesHandler@getProductDetails')->name('buyer.product.details');

//strip payment
Route::post('/get_strip_payment', 'ProductHandler@get_strip_payment')->name('buyer.stripe.payment');

Route::post('/add-buyer-offer', 'ProductHandler@addBuyerOffer')->name('buyer.offer.add');
Route::get('/add-buyer-offer', 'ProductHandler@addBuyerOffer')->name('buyer.offer.add.get');
Route::post('/update-buyer-offer', 'ProductHandler@updateBuyerOffer')->name('buyer.offer.add');
Route::get('/update-buyer-offer', 'ProductHandler@updateBuyerOffer')->name('buyer.offer.add.get');
//Route::group(['middleware' => ['admin']], function () {
Route::prefix('admin-xyz')->group(function () {
    Route::prefix('cms')->group(function () {
        Route::get('/edit-post', 'AdminHandler@editPost')->name('admin.cms.edit_page');
        Route::get('/dist/bricks_assets/{directory}/{html_name}', 'AdminHandler@getHtml')->name('admin.cms.getHtml');
        Route::get('/create-page', 'AdminHandler@createPage')->name('admin.cms.create_page');
        Route::post('/update-page', 'AdminHandler@updatePage')->name('admin.cms.update_page');
        Route::get('/pages', 'AdminHandler@managePages')->name('admin.cms.pages');
    });
    Route::get('/', 'AdminHandler@dashboard')->name('admin.dashboard');
    Route::get('/manage-categories', 'AdminHandler@manageCategories')->name('admin.categories.manage');
    Route::get('/manage-sellers', 'AdminHandler@manageSellers')->name('admin.sellers.manage');
    Route::get('/manage-products', 'AdminHandler@manageProducts')->name('admin.products.manage');
    Route::get('/delete-seller', 'AdminHandler@deleteSeller')->name('admin.seller.delete');
    Route::get('/delete-product', 'AdminHandler@deleteProduct')->name('admin.product.delete');
    Route::get('/edit-product', 'AdminHandler@editProduct')->name('admin.product.edit');
    Route::get('/edit-category', 'AdminHandler@editCategory')->name('admin.category.edit');
    Route::post('/update-category', 'CategoryHandler@updateCategory')->name('admin.category.update');
    Route::post('/delete-category', 'CategoryHandler@deleteCategory')->name('admin.category.delete');
    Route::post('/add-category', 'CategoryHandler@addCategory')->name('admin.category.add');
});

//MiddleTier Routes
Route::get('/api-786-instant-deal-check', 'ProductHandler@instantDealCheck')->name('negotiate.instantDealCheck');
Route::get('/api-786-get-deal-status', 'ProductHandler@checkBuyerOfferWithId')->name('negotiate.getdealstatus');
Route::get('/api-786-getDealStatus', 'ProductHandler@getDealStatus')->name('negotiate.getDealStatus');
Route::get('/api-786-save-payment-info', 'ProductHandler@savePayment')->name('payment.save.get');
Route::post('/api-786-add-buyer-offer', 'ProductHandler@addBuyerOffer')->name('buyer.offer.add');
Route::get('/api-786-add-buyer-offer', 'ProductHandler@addBuyerOffer')->name('buyer.offer.add.get');

//}

Route::get('/demo', 'MainController@page_one');
Route::get('/demo1', function (){
    return redirect('/demo');
});
Route::post('/demo1', 'MainController@page_two');
Route::post('/api_call', 'MainController@api_call');