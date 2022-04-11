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

Route::get('/clc', function () {
	Artisan::call('config:clear');
	Artisan::call('cache:clear');
	Artisan::call('view:clear');
	Artisan::call('route:clear');
	return "Config,Cache,View,Route is cleared";
});

Auth::routes();

Route::get('/', 'frontend\FrontEndController@index')->name('frontend-home');
Route::get('/about', 'frontend\FrontEndController@about')->name('frontend-about');
Route::get('/services', 'frontend\FrontEndController@service')->name('frontend-service');
Route::get('/services/{slug}', 'frontend\FrontEndController@service_view')->name('frontend-service-view');
Route::get('/job-listing', 'frontend\FrontEndController@job_listing')->name('frontend-joblist');

Route::post('/apply-job/{id}', 'frontend\FrontEndController@apply_job')->name('frontend-job-apply');

Route::get('/jobs/{slug}', 'frontend\FrontEndController@job_single')->name('frontend-job-slingle');
Route::get('/employer/', 'frontend\FrontEndController@employer')->name('frontend-employer');
Route::get('/contact-us', 'frontend\FrontEndController@contact_us')->name('frontend-contact');
Route::post('/contact-mail', 'frontend\FrontEndController@mail')->name('frontend-contact-mail');
Route::get('/register-user', 'frontend\RegisterController@index')->name('frontend-register');
Route::get('/register-employer', 'frontend\RegisterController@employer_register')->name('frontend-employer-register');
Route::post('/employer-store', 'frontend\RegisterController@employer_store')->name('frontend-employer-store');

// user account blocked
Route::get('/account-block', 'frontend\FrontEndController@user_account_block')->name('user-account-block');
Route::resource('career', 'frontend\CareerController');


Route::get('/home', 'HomeController@user_redirect')->name('user-redirect');

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
	Route::get('/dashboard', 'admin\DashboardController@index')->name('admin-dashboard');
	Route::get('/roles', 'admin\RoleController@index')->name('admin-role');
	//Route::get('/users', 'admin\UserController@index')->name('admin-users');
	Route::get('/users/admin', 'admin\UserController@admin')->name('admin-list');

	Route::get('/users/general', 'admin\UserController@general_user')->name('admin-general-user');
	Route::get('/users/general/search', 'admin\UserController@user_search')->name('admin-general-user-search');
	Route::post('/candidate', 'admin\UserController@excel');
	// Route::post('/candidate', 'admin\UserController@excel');
	// create new user
	Route::get('/users/new', 'admin\UserController@create')->name('admin-user-create');
	Route::post('/users/store', 'admin\UserController@store')->name('admin-user-store');

	Route::get('/users/edit/{id}', 'admin\UserController@edit')->name('admin-user-edit');
	Route::post('/user-info/store/{id}', 'admin\UserController@user_info_store')->name('admin-user-info-store');
	Route::post('/user-work-history/store', 'admin\WorkHistoryController@store')->name('admin-user-work-history-store');
	Route::get('/user-work-history/delete/{id}', 'admin\WorkHistoryController@destroy')->name('admin-user-work-history-delete');

	Route::get('/users/show/{id}', 'admin\UserController@show')->name('admin-user-show');
	Route::post('/user/status/{id}', 'admin\UserController@status')->name('admin-user-status');
	Route::post('/users/update/{id}', 'admin\UserController@update')->name('admin-user-update');
	//document upload
	Route::post('/users/doc-upload/', 'admin\DocumentController@store')->name('admin-user-document-upload');
	Route::delete('/users/doc-delete/{id}', 'admin\DocumentController@destroy')->name('admin-user-document-delete');

	//job applicant
	Route::resource('job-applicant', 'admin\JobapplycantController');

	// able to work 
	Route::post('/users/able-to-work/{id}', 'admin\AbleToWorkController@update')->name('admin-user-able-to-work');

	Route::post('/users/wish-to-work-store', 'admin\WorkController@user_wish_to_work_update')->name('admin-user-wish-to-work-update');
	//smsf candidate
	Route::post('/users/smsf', 'admin\SelfManagedController@update')->name('admin-user-smsf-update');

	Route::delete('/user/delete/{id}', 'admin\UserController@destroy')->name('admin-user-delete');
	// assigned candidate
	Route::get('/employer', 'admin\EmployerController@index')->name('admin-employer');
	Route::get('/employer/users', 'admin\EmployerController@users')->name('admin-employer-users');
	Route::get('/employer/create', 'admin\EmployerController@create')->name('admin-employer-create');
	Route::post('/employer/store', 'admin\EmployerController@store')->name('admin-employer-store');
	Route::post('/employer/status/{id}', 'admin\EmployerController@status')->name('admin-employer-status');
	Route::delete('/employer/delete/{id}', 'admin\EmployerController@delete')->name('admin-employer-delete');
	Route::get('/employer/profile/{id}', 'admin\EmployerController@profile')->name('admin-employer-profile');
	Route::post('/employer/basic-info-update/{id}', 'admin\EmployerController@basic_update')->name('admin-employer-basic_update');
	Route::get('/employer/assigned_candidate', 'admin\AssignedController@index')->name('admin-employer-assigned_candidate');
	Route::get('/assigned_candidate/search', 'admin\AssignedController@candidate_search')->name('admin-assigned-candidate-search');
	Route::post('/employer/assigned_candidate/store/', 'admin\AssignedController@store')->name('admin_employer_assigned_candidate_store');
	Route::post('/assigned_candidate/assign', 'admin\AssignedController@employee_assign')->name('admin-assigned-candidates');

	Route::delete('/employer/candidate/delete/{id}', 'admin\AssignedController@destroy')->name('admin-assigned-delete');


	// assigned user
	Route::delete('/employer/user/delete/{id}', 'admin\AssignedController@user_destroy')->name('admin-assigned-user-delete');



	// pages
	Route::get('/pages', 'admin\PageController@index')->name('admin-pages');
	Route::get('/pages/view/{slug}', 'admin\PageController@show')->name('admin-page-show');
	Route::get('/pages/edit/{slug}', 'admin\PageController@edit')->name('admin-page-edit');
	Route::post('/page/update/{id}', 'admin\PageController@update')->name('admin-page-update');
	// social
	Route::get('/socials', 'admin\SocialController@index')->name('admin-socials');
	Route::post('/social/update/{id}', 'admin\SocialController@update')->name('admin-social-update');
	Route::post('/social/store', 'admin\SocialController@store')->name('admin-social-store');
	Route::delete('/social/delete/{id}', 'admin\SocialController@destroy')->name('admin-social-delete');
	// message box
	Route::get('/messages', 'admin\MessageController@index')->name('admin-message');
	Route::get('/messages/show/{id}', 'admin\MessageController@show')->name('admin-message-show');
	Route::delete('/messages/delete/{id}', 'admin\MessageController@destroy')->name('admin-message-delete');
	// widget
	Route::get('/widgets', 'admin\WidgetController@index')->name('admin-widget');
	Route::post('/widget/update/{id}', 'admin\WidgetController@update')->name('admin-widget-update');
	// sliders
	Route::get('/slider', 'admin\SliderController@index')->name('admin-slider');
	Route::get('/slider/new', 'admin\SliderController@create')->name('admin-slider-create');
	Route::post('/slider/store', 'admin\SliderController@store')->name('admin-slider-store');
	Route::post('/slider/staus/{id}', 'admin\SliderController@status')->name('admin-slider-status');
	Route::post('/slider/update/{id}', 'admin\SliderController@update')->name('admin-slider-update');
	Route::delete('/slider/delete/{id}', 'admin\SliderController@destroy')->name('admin-slider-delete');

	// banks
	Route::get('/banks', 'admin\BankController@index')->name('admin-banks');
	Route::post('/banks/store', 'admin\BankController@store')->name('admin-banks-store');
	Route::delete('/bank/delete/{id}', 'admin\BankController@destroy')->name('admin-bank-delete');
	// category
	Route::get('/categories', 'admin\CategoryController@index')->name('admin-category');
	Route::get('/categories/create', 'admin\CategoryController@create')->name('admin-category-create');
	Route::post('/categories/store', 'admin\CategoryController@store')->name('admin-category-store');
	Route::get('/categories/edit/{id}', 'admin\CategoryController@edit')->name('admin-category-edit');
	Route::post('/categories/update/{id}', 'admin\CategoryController@update')->name('admin-category-update');
	Route::post('/categories/status/{id}', 'admin\CategoryController@status')->name('admin-category-status');
	Route::delete('/category/delete/{id}', 'admin\CategoryController@destroy')->name('admin-category-delete');
	//Quiz
	Route::get('/quiz/', 'admin\QuizController@index')->name('admin-quiz');
	Route::get('/quiz/create', 'admin\QuizController@create')->name('admin-quiz-create');
	Route::post('/quiz/store', 'admin\QuizController@store')->name('admin-quiz-store');
	Route::get('/quiz/show/{id}', 'admin\QuizController@show')->name('admin-quiz-show');
	Route::get('/quiz/edit/{id}', 'admin\QuizController@edit')->name('admin-quiz-edit');
	Route::post('/quiz/update/{id}', 'admin\QuizController@update')->name('admin-quiz-update');
	Route::post('/quiz/status/{id}', 'admin\QuizController@quiz_status')->name('admin-quiz-status');
	//Topic
	Route::get('/topic/', 'admin\TopicController@index')->name('admin-topic');
	Route::get('/topic/create/', 'admin\TopicController@create')->name('admin-topic-create');
	Route::post('/topic/store/', 'admin\TopicController@store')->name('admin-topic-store');
	Route::post('/topic/status/{id}', 'admin\TopicController@status')->name('admin-topic-status');
	Route::get('/topic/edit/{id}', 'admin\TopicController@edit')->name('admin-topic-edit');
	Route::post('/topic/update/{id}', 'admin\TopicController@update')->name('admin-topic-update');
	Route::delete('/topic/delete/{id}', 'admin\TopicController@destroy')->name('admin-topic-delete');
	//work
	Route::get('/work', 'admin\WorkController@index')->name('admin-work');
	Route::get('/work/create', 'admin\WorkController@create')->name('admin-work-create');
	Route::post('/work/store', 'admin\WorkController@store')->name('admin-work-store');
	Route::get('/work/edit/{id}', 'admin\WorkController@edit')->name('admin-work-edit');
	Route::post('/work/update/{id}', 'admin\WorkController@update')->name('admin-work-update');
	Route::post('/work/status/{id}', 'admin\WorkController@status')->name('admin-work-status');
	Route::delete('/work/delete/{id}', 'admin\WorkController@destroy')->name('admin-work-delete');
	// work category
	Route::get('/work-category', 'admin\WorkCategoryController@index')->name('admin-work-categories');
	Route::get('/work-category/create', 'admin\WorkCategoryController@create')->name('admin-work-category-create');
	Route::post('/work-category/store', 'admin\WorkCategoryController@store')->name('admin-work-store');
	Route::get('/work-category/edit/{id}', 'admin\WorkCategoryController@edit')->name('admin-work-category-edit');
	Route::post('/work-category/update/{id}', 'admin\WorkCategoryController@update')->name('admin-work-category-update');
	Route::post('/work-category/status/{id}', 'admin\WorkCategoryController@status')->name('admin-work-category-status');
	Route::delete('/work-category/delete/{id}', 'admin\WorkCategoryController@destroy')->name('admin-work-category-delete');

	//service
	Route::get('/service/', 'admin\ServiceController@index')->name('admin-service');
	Route::get('/service/create/', 'admin\ServiceController@create')->name('admin-service-create');
	Route::post('/service/store/', 'admin\ServiceController@store')->name('admin-service-store');
	Route::get('/service/edit/{id}', 'admin\ServiceController@edit')->name('admin-service-edit');
	Route::post('/service/update/{id}', 'admin\ServiceController@update')->name('admin-service-update');

	Route::post('/service/status/{id}', 'admin\ServiceController@status')->name('admin-service-status');
	Route::delete('/service/delete/{id}', 'admin\ServiceController@destroy')->name('admin-service-delete');

	//Country
	Route::get('/countries/', 'admin\CountryController@index')->name('admin-countries');
	Route::post('/country/status/{id}', 'admin\CountryController@status')->name('admin-country-status');
	// Interview
	Route::resource('candidate/interview', 'admin\InterviewController');
	Route::post('/candidate-find/interview', 'admin\InterviewController@candidateFind')->name('candidate-find-interview');
});

// user routes
Route::group(['prefix' => 'user', 'middleware' => ['user']], function () {
	Route::get('/dashboard', 'user\DashboardController@index')->name('user-dashboard');
	Route::get('/profile', 'user\ProfileController@index')->name('user-profile');
	Route::get('/profile/edit/', 'user\ProfileController@edit')->name('user-profile-edit');
	Route::post('profile/update/{id}', 'user\ProfileController@update')->name('user-profile-update');
	Route::post('profile/image_update/{id}', 'user\ProfileController@image_update')->name('user-profile-image_update');
	Route::post('/work-history/store/{id}', 'user\WorkHistoryController@store')->name('user-work-history-store');
	Route::delete('/work-history/delete/{id}', 'user\WorkHistoryController@destroy')->name('user-work-history-delete');
	// work history new
	Route::get('/my-work-history/', 'user\WorkHistoryController@index')->name('my-work-history');

	// able to work 
	Route::post('/able-to-work/{id}', 'user\AbleToWorkController@update')->name('user-able-to-work');
	//document upload
	//Route::post('/doc-upload/', 'user\DocumentController@store')->name('user-document-upload');
	Route::post('/doc-upload/', 'user\DocumentController@document_store')->name('user-document-upload');
	Route::delete('/doc-delete/{id}', 'user\DocumentController@destroy')->name('user-document-delete');
	//document-upload
	Route::get('/my-documents/', 'user\DocumentController@index')->name('my-documents');

	//available to work
	Route::get('/available-to-work/', 'user\AbleToWorkController@index')->name('my-available-to-work');
	// bank

	Route::get('/bank', 'user\BankController@index')->name('user-bank');
	Route::post('/bank/store/{id}', 'user\BankController@store')->name('user-bank-store');
	//work

	//user-register-form
	Route::get('/register-form', 'user\RegistationController@index')->name('user-register-form');
	Route::post('/user-basic-info-update/{id}', 'user\RegistationController@basic_info_store')->name('user-basic-info-store');

	// wish to work
	Route::get('/wish-to-work', 'user\WishToWorkController@index')->name('user-wish-to-work');
	Route::post('/wish-to-work/update', 'user\WishToWorkController@update')->name('user-wish-to-work-update');
	// quiz
	Route::get('/quizzes', 'user\QuizController@index')->name('user-quiz-index');
	Route::get('/quiz-details/{id}', 'user\QuizController@show')->name('user-quiz-show');
	Route::get('/take-quiz/{id}', 'user\QuizController@questions')->name('user-take-quiz');
	Route::post('/quiz-submit/', 'user\QuizController@quiz_submit')->name('user-submit-quiz');
	//certificate
	Route::get('/certificate', 'user\QuizController@certificate')->name('user-certificate');
	Route::get('/certificate/download/{id}', 'user\QuizController@pdfview')->name('user-certificate-download');
	//Self Managed Super Fund
	Route::get('/self-managed-super-fund', 'user\SelfManagedFund@index')->name('user-self-managed-fund');
	Route::post('/self-managed-super-fund/store', 'user\SelfManagedFund@store')->name('user-self-managed-fund-store');
	// password change
	Route::get('/password', 'user\ProfileController@password_change')->name('user-password-change');
	Route::post('/password/update', 'user\ProfileController@password_update')->name('user-password-update');
});


// employer routes
Route::group(['prefix' => 'employer', 'middleware' => ['employe']], function () {
	Route::get('/dashboard', 'employer\DashboardController@index')->name('employer-dashboard');
	Route::get('/assigned-candidate', 'employer\AssignedController@index')->name('employer-assigned-candidate');
	Route::get('/assigned-candidate/search', 'employer\AssignedController@user_search')->name('employer-assigned-candidate-search');
	Route::get('/assigned-candidate/profile/{id}', 'employer\AssignedController@assigned_candidate_profile')->name('employer-assigned-candidate-profile');
	// company profile
	Route::get('/profile', 'employer\ProfileController@index')->name('employer-profile');
	Route::post('/basic-info-update/{id}', 'employer\ProfileController@basic_update')->name('employer_basic_update');

	//my profile
	Route::get('/user/profile', 'employer\UserProfileController@index')->name('employer-user-profile');


	Route::post('/user/profile/update/{id}', 'employer\UserProfileController@update')->name('emp-user-profile-update');
	Route::post('/user/profile/image_update/{id}', 'employer\UserProfileController@image_update')->name('emp-user-profile-image_update');

	//users
	Route::get('/users', 'employer\UserController@index')->name('employer-users');
	Route::post('/user/store', 'employer\UserController@store')->name('employer-assigned-user-store');
	//
	Route::post('/user/status/{id}', 'employer\ProfileController@status')->name('employer-user-status');
	Route::delete('/remove-assigned-user/{id}', 'employer\ProfileController@assingn_user_remove')->name('employer-user-assigned-remove');
	Route::get('/employer-block', 'employer\EmployerBlock@index')->name('employer-block-account');
});
