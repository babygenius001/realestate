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

Route::get('images/resource','CFactories@IMG_RESOURCE')->name('img_resource');
Route::get('images/resource/{link}','CFactories@IMG_RESOURCE_IMG')->name('img_resource_img');

// --------------------------------page--------------------------------------
// --------------------------------page--------------------------------------
// --------------------------------page--------------------------------------

Route::get('/', function () {
    return view('welcome');
});
Route::get('home','modules\pageController@home')->name('NRGHome');

Route::get('login','CCustomers@getLogin')->middleware('page_login')->name('NRGLogin');
Route::post('login','CCustomers@postLogin')->name('NRPLogin');
Route::get('logout','CCustomers@getLogout')->name('NRGCLogout');
Route::get('register','CCustomers@getRegister')->name('NRGRegister');
Route::post('register','CCustomers@postRegister')->name('NRPRegister');

Route::prefix("news")->group(function(){
	Route::get("/",function(){ return redirect()->route('NRGNews');});
	Route::get("",'modules\pageNews@getNews')->name('NRGNews');
	Route::get("detail/{alias}_{id}",'modules\pageNews@getDetail')->name('NRGNews_detail');
	Route::get("categories/{alias}_{id}",'modules\pageNews@getCates')->name('NRGNews_getCates');
});

Route::prefix("product")->group(function(){
	Route::get("/",function(){ return redirect()->route('NRGProduct');});
	Route::get("",'modules\pageProduct@getProducts')->name('NRGProduct');
	Route::get("detail/{alias}_{id}",'modules\pageProduct@getDetail')->name('NRGProduct_getDetail');

});

Route::prefix("/dashboard")->middleware('dashboardChecking')->group(function(){

	Route::get('',function(){ return redirect()->route('NRGDashboard');});
	Route::get('/',function(){ return redirect()->route('NRGDashboardDashboard');})->name('NRGDashboard');
	Route::get('dashboard','modules\pageDashboard@dashboard')->name('NRGDashboardDashboard');

//-------------------------------------- G AJAX--------------------------------------
//-------------------------------------- G AJAX--------------------------------------
//-------------------------------------- G AJAX--------------------------------------
//-------------------------------------- G AJAX--------------------------------------
//-------------------------------------- G AJAX--------------------------------------
//-------------------------------------- G AJAX--------------------------------------
//-------------------------------------- G AJAX--------------------------------------
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('products_categories/{id}','modules\CAjax@getProducts_categories');
	});

//-------------------------------------- end G AJAX--------------------------------------
//-------------------------------------- end G AJAX--------------------------------------
//-------------------------------------- end G AJAX--------------------------------------
//-------------------------------------- end G AJAX--------------------------------------
//-------------------------------------- end G AJAX--------------------------------------
//-------------------------------------- end G AJAX--------------------------------------
//-------------------------------------- end G AJAX--------------------------------------

	Route::group(['prefix'=>'products'],function(){ 
		Route::get('products','page\CDProducts@products')->name('NRGDashProducts');
		Route::get('new','page\CDProducts@getNew')->name('NRGDashProducts_getNew');
		Route::post('new','page\CDProducts@postNew')->name('NRPDashProducts_postNew');
		Route::get('detail/{id}','page\CDProducts@getDetail')->name('NRGDashProducts_getDetail');
		Route::get('update/{id}','page\CDProducts@getUpdate')->name('NRGDashProducts_getUpdate');
		Route::post('update/{id}','page\CDProducts@postUpdate')->name('NRPDashProducts_postUpdate');
		Route::get('unpublish/{id}','page\CDProducts@unpublish')->name('NRGDashProducts_unpublish');
	});
	Route::group(['prefix'=>'posters'],function(){ 
		Route::get('posters','page\CDPosters@posters')->name('NRGDashPosters');
		Route::get('detail/{id}','page\CDPosters@getDetail')->name('NRGDashPosters_getDetail');
		Route::get('new','page\CDPosters@getNew')->name('NRGDashPosters_getNew');
		Route::get('new/{id}','page\CDPosters@getNewId')->name('NRGDashPosters_getNewId');
		Route::post('new','page\CDPosters@postNew')->name('NRGDashPosters_postNew');
		Route::get('update/{id}','page\CDPosters@getUpdate')->name('NRGDashPosters_getUpdate');
		Route::post('update/{id}','page\CDPosters@postUpdate')->name('NRPDashPosters_postUpdate');
		Route::get('unpublish/{id}','page\CDPosters@unpublish')->name('NRGDashPosters_unpublish');
	});

	Route::group(['prefix'=>'posters_detail'],function(){ 
		Route::get('posters_detail/{id}','page\CDPostersDetail@posters_detail')->name('NRGDashPostersDetail');
		Route::get('{id}/new','page\CDPostersDetail@getNew')->name('NRGDashPostersDetail_getNew');
		Route::post('{id}/new','page\CDPostersDetail@postNew')->name('NRPDashPostersDetail_postNew');
		Route::get('{id}/update','page\CDPostersDetail@getUpdate')->name('NRGDashPostersDetail_getUpdate');
		Route::post('{id}/update','page\CDPostersDetail@postUpdate')->name('NRPDashPostersDetail_postUpdate');
		Route::get('{id}/unpublish','page\CDPostersDetail@unpublish')->name('NRPDashPostersDetail_unpublish');
	});
	Route::group(['prefix'=>'posters_images'],function(){ 
		Route::get('posters_images/{id}','page\CDPostersImages@posters_images')->name('NRGDashPostersImages');
		Route::get('{id}/new','page\CDPostersImages@getNew')->name('NRGDashPostersImages_getNew');
		Route::post('{id}/new','page\CDPostersImages@postNew')->name('NRPDashPostersImages_postNew');
		Route::get('unpublish/{id}','page\CDPostersImages@unpublish')->name('NRGDashPostersImages_unpublish');
	});
});



// --------------------------------admin--------------------------------------
// --------------------------------admin--------------------------------------
// --------------------------------admin--------------------------------------
// --------------------------------admin--------------------------------------


Route::get('admin/login','Security@C_getLogin')->name('NRGSecurity_getLogin')->middleware('admin_login');
Route::post('admin/login','Security@C_postLogin')->name('NRPSecurity_postLogin');

Route::prefix("/admin")->middleware('admin_checking')->group(function(){

	Route::get('',function() { return redirect()->route('NRGRedirects_AdminIndex');});
	Route::get('/',function(){ return redirect()->route('NRGRedirects_AdminIndex');})->name('NRGAdmin');

	Route::get('logout','Security@C_logout')->name('NRGLogout');
	Route::get('home','Redirects@Redirect_admin_index')->name('NRGRedirects_AdminIndex');
	Route::group(['prefix'=>'products'],function(){

		Route::group(['prefix'=>'brands'],function(){
			Route::get('',function() { return redirect()->route('NRGCBrands_getList'); })->name('NRGCBrands');
			Route::get('list','CBrands@getList')->name('NRGCBrands_getList');
			Route::get('list/{items}','CBrands@getList')->name('NRGCBrands_getListItems');
			Route::get('detail/{id}','CBrands@getDetail')->name('NRGCBrands_getDetail');
			Route::get('insert','CBrands@getInsert')->name('NRGCBrands_getInsert');
			Route::post('insert','CBrands@postInsert')->name('NRPCBrands_postInsert');
			Route::get('update/{id}','CBrands@getUpdate')->name('NRGCBrands_getUpdate');
			Route::post('update/{id}','CBrands@postUpdate')->name('NRPCBrands_postUpdate');
			Route::get('delete/{id}','CBrands@getDelete')->name('NRGCBrands_postDelete');
		});

		Route::group(['prefix'=>'categories'],function(){
			Route::get('',function() { return redirect()->route('NRGCCategories_getList'); })->name('NRGCCategories');
			Route::get('list','CCategories@getList')->name('NRGCCategories_getList');
			Route::get('list/{items}','CCategories@getList')->name('NRGCCategories_getListItems');
			Route::get('detail/{id}','CCategories@getDetail')->name('NRGCCategories_getDetail');
			Route::get('insert','CCategories@getInsert')->name('NRGCCategories_getInsert');
			Route::post('insert','CCategories@postInsert')->name('NRPCCategories_postInsert');
			Route::get('update/{id}','CCategories@getUpdate')->name('NRGCCategories_getUpdate');
			Route::post('update/{id}','CCategories@postUpdate')->name('NRPCCategories_postUpdate');
			Route::get('delete/{id}','CCategories@getDelete')->name('NRGCCategories_postDelete');
		});


		Route::group(['prefix'=>'types'],function(){
			Route::get('',function() { return redirect()->route('NRGCTypes_getList'); })->name('NRGCTypes');
			Route::get('list','CTypes@getList')->name('NRGCTypes_getList');
			Route::get('list/{items}','CTypes@getList')->name('NRGCTypes_getListItems');
			Route::get('detail/{id}','CTypes@getDetail')->name('NRGCTypes_getDetail');
			Route::get('insert','CTypes@getInsert')->name('NRGCTypes_getInsert');
			Route::post('insert','CTypes@postInsert')->name('NRPCTypes_postInsert');
			Route::get('update/{id}','CTypes@getUpdate')->name('NRGCTypes_getUpdate');
			Route::post('update/{id}','CTypes@postUpdate')->name('NRPCTypes_postUpdate');
			Route::get('delete/{id}','CTypes@getDelete')->name('NRGCTypes_postDelete');
		});

		Route::group(['prefix'=>'colours'],function(){
			Route::get('',function() { return redirect()->route('NRGCColours_getList'); })->name('NRGCColours');
			Route::get('list','CColours@getList')->name('NRGCColours_getList');
			Route::get('list/{items}','CColours@getList')->name('NRGCColours_getListItems');
			Route::get('detail/{id}','CColours@getDetail')->name('NRGCColours_getDetail');
			Route::get('insert','CColours@getInsert')->name('NRGCColours_getInsert');
			Route::post('insert','CColours@postInsert')->name('NRPCColours_postInsert');
			Route::get('update/{id}','CColours@getUpdate')->name('NRGCColours_getUpdate');
			Route::post('update/{id}','CColours@postUpdate')->name('NRPCColours_postUpdate');
			Route::get('delete/{id}','CColours@getDelete')->name('NRGCColours_postDelete');
		}); 

		Route::group(['prefix'=>'videos'],function(){
			Route::get('',function() { return redirect()->route('NRGCProducts_video_getList'); })->name('NRGCProducts_video');
			Route::get('list','CProducts_video@getList')->name('NRGCProducts_video_getList');
			Route::get('list/{items}','CProducts_video@getList')->name('NRGCProducts_video_getListItems');
			Route::get('detail/{id}','CProducts_video@getDetail')->name('NRGCProducts_video_getDetail');
			Route::get('update/{id}','CProducts_video@getUpdate')->name('NRGCProducts_video_getUpdate');
			Route::post('update/{id}','CProducts_video@postUpdate')->name('NRPCProducts_video_postUpdate');
			Route::get('delete/{id}','CProducts_video@getDelete')->name('NRGCProducts_video_postDelete');
		}); 

		Route::group(['prefix'=>'products'],function(){
			Route::get('',function() { return redirect()->route('NRGCProducts_getList'); })->name('NRGCProducts');
			Route::get('list','CProducts@getList')->name('NRGCProducts_getList');
			Route::get('list/{items}','CProducts@getList')->name('NRGCProducts_getListItems');
			Route::get('detail/{id}','CProducts@getDetail')->name('NRGCProducts_getDetail');
			Route::get('insert','CProducts@getInsert')->name('NRGCProducts_getInsert');
			Route::post('insert','CProducts@postInsert')->name('NRPCProducts_postInsert');
			Route::get('update/{id}','CProducts@getUpdate')->name('NRGCProducts_getUpdate');
			Route::post('update/{id}','CProducts@postUpdate')->name('NRPCProducts_postUpdate');
			Route::get('delete/{id}','CProducts@getDelete')->name('NRGCProducts_postDelete');
		});
	});

	Route::group(['prefix'=>'customers'],function(){

		Route::group(['prefix'=>'customers'],function(){
			Route::get('',function() { return redirect()->route('NRGCCustomers_getList'); })->name('NRGCCustomers');
			Route::get('list','CCustomers@getList')->name('NRGCCustomers_getList');
			Route::get('list/{items}','CCustomers@getList')->name('NRGCCustomers_getListItem');
			Route::get('detail/{id}','CCustomers@getDetail')->name('NRGCCustomers_getDetail');
			Route::get('insert','CCustomers@getInsert')->name('NRGCCustomers_getInsert');
			Route::post('insert','CCustomers@postRegister')->name('NRGCCustomers_postRegister');
			Route::get('update/{id}','CCustomers@getUpdate')->name('NRGCCustomers_getUpdate');
			Route::post('update/{id}','CCustomers@postUpdate')->name('NRGCCustomers_postUpdate');
			Route::get('banned/{id}','CCustomers@getBanned')->name('NRGCCustomers_getBanned');
		});

		Route::group(['prefix'=>'addresses'],function(){
			Route::get('',function() { return redirect()->route('NRGCAddresses_getList'); })->name('NRGCAddresses');
			Route::get('list','CAddresses@getList')->name('NRGCAddresses_getList');
			Route::get('list/{items}','CAddresses@getList')->name('NRGCAddresses_getListItems');
			Route::get('detail/{id}','CAddresses@getDetail')->name('NRGCAddresses_getDetail');
			Route::get('insert/{id}','CAddresses@getInsert')->name('NRGCAddresses_getInsert');
			Route::post('insert','CAddresses@postInsert')->name('NRPCAddresses_postInsert');
			Route::get('update/{id}','CAddresses@getUpdate')->name('NRGCAddresses_getUpdate');
			Route::post('update/{id}','CAddresses@postUpdate')->name('NRPCAddresses_postUpdate');
		});

	});

	Route::group(['prefix'=>'news'],function(){


		Route::group(['prefix'=>'news'],function(){
			Route::get('',function() { return redirect()->route('NRGCNews_getList'); })->name('NRGCNews');
			Route::get('list','CNews@getList')->name('NRGCNews_getList');
			Route::get('list/{items}','CNews@getList')->name('NRGCNews_getListItems');
			Route::get('detail/{id}','CNews@getDetail')->name('NRGCNews_getDetail');
			Route::get('insert','CNews@getInsert')->name('NRGCNews_getInsert');
			Route::post('insert','CNews@postInsert')->name('NRPCNews_postInsert');
			Route::get('update/{id}','CNews@getUpdate')->name('NRGCNews_getUpdate');
			Route::post('update/{id}','CNews@postUpdate')->name('NRPCNews_postUpdate');
			Route::get('delete/{id}','CNews@getDelete')->name('NRGCNews_postDelete');
		});

		Route::group(['prefix'=>'categories'],function(){
			Route::get('',function() { return redirect()->route('NRGCNewCategories_getList'); })->name('NRGCNewCategories');
			Route::get('list','CNews_categories@getList')->name('NRGCNewCategories_getList');
			Route::get('list/{items}','CNews_categories@getList')->name('NRGCNewCategories_getListItems');
			Route::get('detail/{id}','CNews_categories@getDetail')->name('NRGCNewCategories_getDetail');
			Route::get('insert','CNews_categories@getInsert')->name('NRGCNewCategories_getInsert');
			Route::post('insert','CNews_categories@postInsert')->name('NRPCNewCategories_postInsert');
			Route::get('update/{id}','CNews_categories@getUpdate')->name('NRGCNewCategories_getUpdate');
			Route::post('update/{id}','CNews_categories@postUpdate')->name('NRPCNewCategories_postUpdate');
			Route::get('delete/{id}','CNews_categories@getDelete')->name('NRGCNewCategories_postDelete');
		});

		Route::group(['prefix'=>'images_groups'],function(){
			Route::get('',function() { return redirect()->route('NRGCImages_groups_getList'); })->name('NRGCImages_groups');
			Route::get('list','CNewsGroupImage@getList')->name('NRGCImages_groups_getList');
			Route::get('list/{items}','CNewsGroupImage@getList')->name('NRGCImages_groups_getListItems');
			Route::get('detail/{id}','CNewsGroupImage@getDetail')->name('NRGCImages_groups_getDetail');
			Route::get('insert','CNewsGroupImage@getInsert')->name('NRGCImages_groups_getInsert');
			Route::post('insert','CNewsGroupImage@postInsert')->name('NRPCImages_groups_postInsert');
			Route::get('update/{id}','CNewsGroupImage@getUpdate')->name('NRGCImages_groups_getUpdate');
			Route::post('update/{id}','CNewsGroupImage@postUpdate')->name('NRPCImages_groups_postUpdate');
			Route::get('delete/{id}','CNewsGroupImage@getDelete')->name('NRGCImages_groups_postDelete');
			Route::get('getlink/{id}','CNewsGroupImage@getLink')->name('NRGCImages_groups_getLink');
		});

		Route::group(['prefix'=>'images'],function(){
			Route::get('',function() { return redirect()->route('NRGCNewsImages_getList'); })->name('NRGCNewsImages');
			Route::get('list','CNewsImages@getList')->name('NRGCNewsImages_getList');
			Route::get('list/{items}','CNewsImages@getList')->name('NRGCNewsImages_getListItems');
			Route::get('detail/{id}','CNewsImages@getDetail')->name('NRGCNewsImages_getDetail');

			Route::get('insert','CNewsImages@getInsert')->name('NRGCNewsImages_getInsert');
			Route::post('insert','CNewsImages@postInsert')->name('NRPCNewsImages_postInsert');
			Route::get('update/{id}','CNewsImages@getUpdate')->name('NRGCNewsImages_getUpdate');
			Route::post('update/{id}','CNewsImages@postUpdate')->name('NRPCNewsImages_postUpdate');
			Route::get('delete/{id}','CNewsImages@getDelete')->name('NRGCNewsImages_postDelete');
		});

	});

	Route::group(['prefix'=>'slides'],function(){

		Route::group(['prefix'=>'slides_categories'],function(){
			Route::get('',function() { return redirect()->route('NRGCSlides_categories_getList'); })->name('NRGCSlides_categories');
			Route::get('list','CSlides_categories@getList')->name('NRGCSlides_categories_getList');
			Route::get('list/{items}','CSlides_categories@getList')->name('NRGCSlides_categories_getListItems');
			Route::get('detail/{id}','CSlides_categories@getDetail')->name('NRGCSlides_categories_getDetail');
			Route::get('insert','CSlides_categories@getInsert')->name('NRGCSlides_categories_getInsert');
			Route::post('insert','CSlides_categories@postInsert')->name('NRPCSlides_categories_postInsert');
			Route::get('update/{id}','CSlides_categories@getUpdate')->name('NRGCSlides_categories_getUpdate');
			Route::post('update/{id}','CSlides_categories@postUpdate')->name('NRPCSlides_categories_postUpdate');
			Route::get('delete/{id}','CSlides_categories@getDelete')->name('NRGCSlides_categories_postDelete');
		});

		Route::group(['prefix'=>'slides'],function(){
			Route::get('',function() { return redirect()->route('NRGCSlides_getList'); })->name('NRGCSlides');
			Route::get('list','CSlides@getList')->name('NRGCSlides_getList');
			Route::get('list/{items}','CSlides@getList')->name('NRGCSlides_getListItems');
			Route::get('detail/{id}','CSlides@getDetail')->name('NRGCSlides_getDetail');
			Route::get('items/{id}','CSlides@getItems')->name('NRGCSlides_getItems');	
			Route::get('insert','CSlides@getInsert')->name('NRGCSlides_getInsert');
			Route::post('insert','CSlides@postInsert')->name('NRPCSlides_postInsert');
			Route::get('update/{id}','CSlides@getUpdate')->name('NRGCSlides_getUpdate');
			Route::post('update/{id}','CSlides@postUpdate')->name('NRPCSlides_postUpdate');
			Route::get('delete/{id}','CSlides@getDelete')->name('NRGCSlides_postDelete');
		});

	});

	// ---------------------------------------------------------------------------
	Route::get('clear',function(){
		Session::forget('manager_permission');
		Session::forget('manager_permission');
		return redirect()->route('NRGSecurity_getLogin');
	})->name('NRGClear');
	// Route::get('/{a}',function() { return redirect()->route('NRGClear'); });
	// ---------------------------------------------------------------------------

});

// --------------------------------End admin--------------------------------------
// --------------------------------End admin--------------------------------------
// --------------------------------End admin--------------------------------------
// --------------------------------End admin--------------------------------------