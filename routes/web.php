<?php

use App\Http\Controllers\main\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\CompetitionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\FunnabHomeController;
use App\Http\Controllers\Frontend\AhikmahController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact.us');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('/clear-cache', [HomeController::class, 'clearCache']);
Route::get('/news/{id}', [HomeController::class, 'single_news'])->name('front.single.news');


// FUNNAB ROUTE STARTS HERE ::::::::::::::::::

Route::group(['prefix' => 'funnab'], function () {
	Route::get('/', [FunnabHomeController::class, 'index']);
	Route::get('/news/{id}', [FunnabHomeController::class, 'single_news'])->name('funnb.single.news');
});
// FUNNAB ROUTE ENDS HERE ::::::::::::::::::

// UAES ROUTE STARTS HERE ::::::::::::::::::::::::::
Route::get('/uaes', [HomeController::class, 'index']);
// UAES ROUTE STARTS HERE ::::::::::::::::::::::::::

// AL-HIKMAH ROUTE STARTS HERE ::::::::::::::::::::::::::

Route::get('/al-hikmah', [AhikmahController::class,'index']);
// AL-HIKMAH ROUTE STARTS HERE ::::::::::::::::::::::::::


// ALL NEWS :::::::::::::::::::::::::
Route::get('/all/news', [HomeController::class, 'all_news'])->name('all.news');
// ALL NEWS :::::::::::::::::::::::::
// Authenticated Routes
Route::group(['middleware' => 'auth'], function () {

	// logout route
	Route::get('/logout', [LoginController::class, 'logout']);
	
	// dashboard route  
	Route::get('/dashboard', function () {
		return view('admin.index');
	})->name('dashboard');


    // Edit Profile
	Route::post('account/update', [UserController::class, 'profile_update'])->name('account.update');
	// Service Route
	Route::get('/partner/create', [ServiceController::class, 'create']);
	Route::get('/partner/list', [ServiceController::class, 'index'])->name('partner.index');
	Route::post('/partner/store', [ServiceController::class, 'store'])->name('create-partner');
	Route::get('/partner/edit/{id}', [ServiceController::class, 'edit'])->name('partner.edit');
	Route::post('/partner/edit/{id}', [ServiceController::class, 'update'])->name('partner.update');

	// Proejct Route
	Route::get('/project/create', [ProjectController::class, 'create']);
	Route::get('/project/list', [ProjectController::class, 'index'])->name('project.index');
	Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
	Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
	Route::post('/project/edit/{id}', [ProjectController::class, 'update'])->name('project.update');
	// Features Route
	Route::get('/feature/create', [FeaturesController::class, 'create'])->name('create-feature');
	Route::post('/feature/create', [FeaturesController::class, 'store'])->name('create-feature');
	Route::get('/feature/list', [FeaturesController::class, 'index'])->name('features');

	//only those have manage news permission will get access
	Route::group(['middleware' => 'can:manage_news'], function () {
		Route::get('admin/news/list/{query?}', [NewsController::class, 'index'])->name('news.list');
		Route::get('admin/news/create', [NewsController::class, 'create'])->name('news.create');
		Route::post('admin/news/store', [NewsController::class, 'store'])->name('news.store');
		Route::get('admin/news/show/{id}', [NewsController::class, 'show'])->name('news.show');
		Route::get('admin/news/categories', [NewsController::class, 'category'])->name('news.category');
		Route::post('admin/news/category/store', [NewsController::class, 'storeCategory'])->name('news.category.store');
		Route::post('admin/news/category/update', [NewsController::class, 'updateCategory'])->name('news.category.update');
		Route::get('admin/news/update/{id}', [NewsController::class, 'editNews'])->name('news.edit');
		Route::post('admin/news/update/{id}', [NewsController::class, 'updateNews'])->name('news.update');
		Route::get('admin/news/delete/{id}', [NewsController::class, 'deleteNews']);
		// Route::get('/categories', function () { return view('inventory.category.index'); }); 
	});

	// Only those with this privilegde can manage the competition table
	Route::group(['middleware' => 'can:manage_competition'], function () {
		Route::get('competition/list', [CompetitionController::class, 'index'])->name('competiiton.list');
	});

	Route::group(['middleware' => 'can:manage_slider'], function () {
		Route::get('slider/all', [SliderController::class, 'index'])->name('slider.list');
		Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
		Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
		Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
		Route::post('slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
	});

	// Setting
	Route::prefix('setting')->group(function () {
		// Route::get('/file-manager/index', 			 [App\Http\Controllers\Admin\FileManagerController::class, 'index'])->name('filemanager.index');
		// Route::get('/website-setting/edit', 		 [App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('website-setting.edit');
    	// Route::post('/website-setting/update/{id}',  [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('website-setting.update');
		Route::get('/website-setting/edit', [SettingController::class, 'edit'])->name('website-setting.edit');
		Route::post('/website-setting/update/{id}', [SettingController::class, 'update'])->name('website-setting.update');
	});


	//only those have manage_user permission will get access
	Route::group(['middleware' => 'can:manage_user'], function () {
		Route::get('/users', [UserController::class, 'index']);
		Route::get('/user/get-list', [UserController::class, 'getUserList']);
		Route::get('/user/create', [UserController::class, 'create']);
		Route::post('/user/create', [UserController::class, 'store'])->name('create-user');
		Route::get('/user/{id}', [UserController::class, 'edit']);
		Route::post('/user/update', [UserController::class, 'update']);
		Route::get('/user/delete/{id}', [UserController::class, 'delete']);
	});

	//only those have manage_role permission will get access
	Route::group(['middleware' => 'can:manage_category'], function () {
		Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
		Route::get('categories', [CategoryController::class, 'index'])->name('inventory.category.index');
		Route::post('category/update', [CategoryController::class, 'update']);
		// Route::get('/categories', function () { return view('inventory.category.index'); }); 
	});

	Route::group(['middleware' => 'can:manage_product'], function () {
		Route::get('/products', [ProductController::class, 'index'])->name('product.list');
		Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
		Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
		Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
		Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
		Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
		Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
		// Route::get('/products', function () { return view('inventory.product.list'); });
		// Route::get('/', function () { return view('inventory.product.create'); }); 
	});

	Route::group(['middleware' => 'can:manage_role|manage_user'], function () {
		Route::get('/roles', [RolesController::class, 'index']);
		Route::get('/role/get-list', [RolesController::class, 'getRoleList']);
		Route::post('/role/create', [RolesController::class, 'create']);
		Route::get('/role/edit/{id}', [RolesController::class, 'edit']);
		Route::post('/role/update', [RolesController::class, 'update']);
		Route::get('/role/delete/{id}', [RolesController::class, 'delete']);
	});


	//only those have manage_permission permission will get access
	Route::group(['middleware' => 'can:manage_permission|manage_user'], function () {
		Route::get('/permission', [PermissionController::class, 'index']);
		Route::get('/permission/get-list', [PermissionController::class, 'getPermissionList']);
		Route::post('/permission/create', [PermissionController::class, 'create']);
		Route::get('/permission/update', [PermissionController::class, 'update']);
		Route::get('/permission/delete/{id}', [PermissionController::class, 'delete']);
	});

	// get permissions
	Route::get('get-role-permissions-badge', [PermissionController::class, 'getPermissionBadgeByRole']);
	// permission examples
	Route::get('/permission-example', function () {
		return view('permission-example');
	});
	// API Documentation
	Route::get('/rest-api', function () {
		return view('api');
	});
	// Editable Datatable
	Route::get('/table-datatable-edit', function () {
		return view('pages.datatable-editable');
	});

	// Themekit demo pages
	Route::get('/calendar', function () {
		return view('pages.calendar');
	});
	Route::get('/charts-amcharts', function () {
		return view('pages.charts-amcharts');
	});
	Route::get('/charts-chartist', function () {
		return view('pages.charts-chartist');
	});
	Route::get('/charts-flot', function () {
		return view('pages.charts-flot');
	});
	Route::get('/charts-knob', function () {
		return view('pages.charts-knob');
	});
	Route::get('/forgot-password', function () {
		return view('pages.forgot-password');
	});
	Route::get('/form-addon', function () {
		return view('pages.form-addon');
	});
	Route::get('/form-advance', function () {
		return view('pages.form-advance');
	});
	Route::get('/form-components', function () {
		return view('pages.form-components');
	});
	Route::get('/form-picker', function () {
		return view('pages.form-picker');
	});
	Route::get('/invoice', function () {
		return view('pages.invoice');
	});
	Route::get('/layout-edit-item', function () {
		return view('pages.layout-edit-item');
	});
	Route::get('/layouts', function () {
		return view('pages.layouts');
	});

	Route::get('/navbar', function () {
		return view('pages.navbar');
	});
	Route::get('/profile', function () {
		return view('pages.profile');
	});
	Route::get('/project', function () {
		return view('pages.project');
	});
	Route::get('/view', function () {
		return view('pages.view');
	});

	Route::get('/table-bootstrap', function () {
		return view('pages.table-bootstrap');
	});
	Route::get('/table-datatable', function () {
		return view('pages.table-datatable');
	});
	Route::get('/taskboard', function () {
		return view('pages.taskboard');
	});
	Route::get('/widget-chart', function () {
		return view('pages.widget-chart');
	});
	Route::get('/widget-data', function () {
		return view('pages.widget-data');
	});
	Route::get('/widget-statistic', function () {
		return view('pages.widget-statistic');
	});
	Route::get('/widgets', function () {
		return view('pages.widgets');
	});

	// themekit ui pages
	Route::get('/alerts', function () {
		return view('pages.ui.alerts');
	});
	Route::get('/badges', function () {
		return view('pages.ui.badges');
	});
	Route::get('/buttons', function () {
		return view('pages.ui.buttons');
	});
	Route::get('/cards', function () {
		return view('pages.ui.cards');
	});
	Route::get('/carousel', function () {
		return view('pages.ui.carousel');
	});
	Route::get('/icons', function () {
		return view('pages.ui.icons');
	});
	Route::get('/modals', function () {
		return view('pages.ui.modals');
	});
	Route::get('/navigation', function () {
		return view('pages.ui.navigation');
	});
	Route::get('/notifications', function () {
		return view('pages.ui.notifications');
	});
	Route::get('/range-slider', function () {
		return view('pages.ui.range-slider');
	});
	Route::get('/rating', function () {
		return view('pages.ui.rating');
	});
	Route::get('/session-timeout', function () {
		return view('pages.ui.session-timeout');
	});
	Route::get('/pricing', function () {
		return view('pages.pricing');
	});


	// new inventory routes
	Route::get('/inventory', function () {
		return view('inventory.dashboard');
	});
	Route::get('/pos', function () {
		return view('inventory.pos');
	});
	// Route::get('/products', function () { return view('inventory.product.list'); });
	// Route::get('/products/create', function () { return view('inventory.product.create'); }); 
	Route::get('/sales', function () {
		return view('inventory.sale.list');
	});
	Route::get('/sales/create', function () {
		return view('inventory.sale.create');
	});
	Route::get('/purchases', function () {
		return view('inventory.purchase.list');
	});
	Route::get('/purchases/create', function () {
		return view('inventory.purchase.create');
	});
	Route::get('/customers', function () {
		return view('inventory.people.customers');
	});
	Route::get('/suppliers', function () {
		return view('inventory.people.suppliers');
	});

});
