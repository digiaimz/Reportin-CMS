<?php

use App\User;
use App\Zone;
use App\Forum;
use App\District;
use Carbon\Carbon;
use App\Profession;
use App\Wabastagan;
use App\ActivityLog;
use App\Helpers\Helper;
use Carbon\CarbonPeriod;
use App\BroadcastListCategory;
use App\CDR;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Double;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
 
Route::get('mongo' , function(){

    dd(CDR::all());
});



Route::resource('ajaxproducts','ProductAjaxController');

 
Route::get('/clear', function () {
      Artisan::call('cache:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
});


 




Route::get('/', function () {
    // return redirect()->route('login');
    if(!Auth::check())
    {return view('auth.login');}
    else
    {return redirect()->route('home');}
});

Route::get('set-locale/{locale}', function ($locale) {
    session(['lang' => $locale]);
     return redirect()->back();
})->name('set.locale');



 



/*Excel import export*/
  Route::get('export', 'ImportExportController@export')->name('export');
  Route::get('importExportView', 'ImportExportController@importExportView');
  Route::post('import', 'ImportExportController@import')->name('import');



 

Route::get('dawati-form', function()
{
    return redirect()->route('dawati.form.view');
});


Auth::routes(['register' => false]);

Route::middleware(['isLogin'])->group(function () {




    



Route::post('/UserController', 'UserController@update_record')->name('manage-users.update_record');
Route::resource('manage-users', 'UserController');

Route::get('delete-user/{id?}', 'UserController@delete_user')->name('delete.user');;




Route::get('generate-forget-password-link', 'ForgotPasswordControllerCustom@showForgetPasswordForm')->name('forget.password.mobile');
Route::post('forget-password-send', 'ForgotPasswordControllerCustom@submitForgetPasswordForm')->name('forget.password.send');
Route::get('reset/password/link/{token}/{whatsapp}', 'ForgotPasswordControllerCustom@showResetPasswordForm')->name('reset.password.get.link');
Route::post('reset-password-change', 'ForgotPasswordControllerCustom@submitResetPasswordForm')->name('reset.password.post');


// complain.view.worker

Route::post('/FixedAssetController', 'FixedAssetController@update_record')->name('manage-groups.update_record');
Route::post('/manage-groups-compaign-store', 'FixedAssetController@compaign_store')->name('manage-groups.compaign.store');
Route::post('/manage-groups-compaign-update', 'FixedAssetController@compaign_update')->name('manage-groups.compaign.update');
Route::resource('manage-groups', 'FixedAssetController');
Route::get('/manage-group-report', 'FixedAssetController@dashboard')->name('manage-groups.dashboard');

Route::post('/manage-groups-compaign-queue-store', 'FixedAssetController@compaign_queue_store')->name('manage-groups.store.queue');
Route::post('/manage-groups-compaign-queue-update_record', 'FixedAssetController@compaign_queue_update')->name('manage-groups.update_record.queue');


Route::get('/manage-group/{group}', 'FixedAssetController@manage_group')->name('manage-groups.page');

 
 

Route::get('reporting/cdr-report-incoming', 'Wabastagan\ManageComplain@cdr_report_incoming')->name('complain.view.incoming');
Route::get('/cdr-data-incoming', 'Wabastagan\ManageComplain@getCdrData_incoming')->name('cdr.data.incoming');


Route::get('reporting/cdr-report-outgoing', 'Wabastagan\ManageComplain@cdr_report_outgoing')->name('complain.view.worker.outgoing');
Route::get('/cdr-data-outgoing', 'Wabastagan\ManageComplain@getCdrData_outgoing')->name('cdr.data.outgoing');

Route::get('refresh-token', 'Wabastagan\ManageWabastagan@refreshToken')->name('refresh.token');

Route::post('sendotp-verification', 'PublicForm\ManageWorkers@sendOTPVerification')->name('send.otp.verification');
Route::post('VerifyOTPVerification', 'PublicForm\ManageWorkers@VerifyOTPVerification')->name('verify.otp.verification');


Route::get('append-wabastagan', 'Wabastagan\ManageWabastagan@appendWabastagan')->name('append.wabastagan.for.edit');
Route::get('loadWabastaganList', 'Wabastagan\ManageWabastagan@loadWabastaganList')->name('load.Wabastagan.list');
Route::post('deletewabastagan', 'Wabastagan\ManageWabastagan@deletewabastagan')->name('delete.wabastagan');
Route::post('deletecategory', 'Wabastagan\ManageWabastagan@deleteCategory')->name('delete.category');
Route::post('getTehsilwabastagan', 'Wabastagan\ManageWabastagan@getTehsil')->name('get.wabastagan.tehsil.ajax');
Route::post('saveNewWabastagan', 'Wabastagan\ManageWabastagan@saveNewWabastagan')->name('save.new.wabastagan');
Route::post('getNewWabastagan', 'Wabastagan\ManageWabastagan@getNewWabastagan')->name('get.new.wabastagan');
Route::post('create-new-category-for-broadcast-list', 'Wabastagan\ManageWabastagan@createNewCategoryForBroadCastList')->name('create.new.category.for.broadcast.list');
Route::post('saveNewComplain', 'Wabastagan\ManageWabastagan@saveNewComplain')->name('save.new.complain');
Route::post('getTable', 'Wabastagan\ManageWabastagan@getTable')->name('get.table.view');

// Route::get('ajaxRequest', 'PublicForm\ManageWorkers@getTehsil');

Route::get('get/about/software', 'PublicForm\ManageWorkers@getAboutSoftware')->name('get.about.software');
Route::get('get-register-video-iframe', 'PublicForm\ManageWorkers@getVideo')->name('get.register.video.iframe');
Route::post('getTehsil', 'PublicForm\ManageWorkers@getTehsil')->name('get.tehsil.ajax');
Route::post('getTehsil/for-edit-profile', 'PublicForm\ManageWorkers@getTehsilForEditProfile')->name('get.tehsil.for.edit.profile.ajax');
Route::post('getUC/for-edit-profile', 'PublicForm\ManageWorkers@getUCForEditProfile')->name('get.uc.for.edit.profile.ajax');
Route::post('verifyNumber', 'PublicForm\ManageWorkers@verifyNumber')->name('get.worker.number.verify');
Route::post('saveNewWorker', 'PublicForm\ManageWorkers@saveNewWorker')->name('save.new.worker.publicform');
Route::get('register/{reffer?}', 'PublicForm\ManageWorkers@index')->name('dawati.form.view');


    // Languages and Translation
    Route::get('manage/languages', 'LanguageController@index')->name('manage.languages');

    // Reporting
    Route::get('reporting/top-20-district-summery', 'Reporting\DistrictSummeryController@top20District')->name('reporting.top.20.district.summery');
    Route::get('reporting/district-summery', 'Reporting\DistrictSummeryController@index')->name('reporting.district.summery');
    Route::post('reporting/district-summery/get-result', 'Reporting\DistrictSummeryController@getResult')
    ->name('get.reporting.district.summery');
    Route::get('reporting/daily-registration', 'Reporting\DailyRegistrationController@index')->name('reporting.registration.graph');
    Route::get('reporting/district-summery/forum-comparison', 'Reporting\DistrictSummeryController@forum_comparison')->name('forum.comparison.reporting.district.summery');

    Route::get('reporting/zone-wise/summery/{id?}', 'Reporting\LevelXForumController@zone_wise')->name('reporting.zone.wise');
    Route::get('reporting/district-wise/summery/{id?}', 'Reporting\LevelXForumController@district_wise')->name('reporting.district.wise');
    Route::get('reporting/tehsil-wise/summery/{id?}', 'Reporting\LevelXForumController@tehsil_wise')->name('reporting.tehsil.wise');
    Route::get('reporting/pp-wise/summery/{id?}', 'Reporting\LevelXForumController@pp_wise')->name('reporting.pp.wise');
    Route::get('reporting/uc-wise/summery/{id?}', 'Reporting\LevelXForumController@uc_wise')->name('reporting.uc.wise');


    Route::get('reporting/zone-summary-stats/{zone_id?}', 'Reporting\DistrictSummeryController@zone_summery_stats')->name('reporting.zone.summery.stats');

    //broadcast list and invities

    Route::get('my-broadcast-list', 'BroadcastListController@index')->name('my.broadcast.list');


    // help and support

Route::get('help', 'HelpController@index')->name('help.view');
Route::post('get-help', 'HelpController@getHelp')->name('get.help.page');
Route::get('how-its-work', function()
{
    return redirect()->route('help.view');
});


    //Clips
    Route::get('clips', 'ClipController@index')->name('view.clips');
    Route::get('manage-clips', 'ClipController@indexManage')->name('view.clips.manage');
    Route::get('add-new-clip', 'ClipController@addNew')->name('add.new.clip');
    Route::post('store-new-clip', 'ClipController@store')->name('store.new.clip');
      Route::post('store-new-clip-question', 'ClipController@store_clip_questions')->name('store.new.clip.questions');
    Route::get('edit/clip/{id}', 'ClipController@edit')->name('edit.clip');
    Route::post('edit/store/{id}', 'ClipController@editStore')->name('edit.store.clip');
    Route::get('get-recent-clip', 'ClipController@getClip')->name('get.recent.clip');
    Route::post('add-to-watch-clip', 'ClipController@add_to_watch_clip')->name('add.to.watch.clip');
      Route::post('add-to-quiz-result', 'ClipController@save_quiz_result')->name('add.to.result');
    Route::post('add-to-video-or-audio-clip', 'ClipController@add_to_download_clip')->name('add.to.download.clip');


    // Notifications
    Route::post('manage-request-complain', 'Wabastagan\ManageComplain@complain')->name('manage.complain.requests');
    Route::post('mark-notification-as-read', 'Wabastagan\ManageComplain@markAsRead')->name('mark.notification.as.read');
    Route::post('get-notification-data', 'Wabastagan\ManageComplain@getNotifications')->name('get.notification.data');




    // System Setting
    Route::post('Sms-otp-setting', 'SystemSettingController@setOTP')->name('opt.setting');
    Route::post('set-otp-cron-job-time', 'SystemSettingController@cronJob')->name('opt.setting.cronJob');
    Route::post('cancel-cron-job-for-otp', 'SystemSettingController@cancel_cronJob')->name('cancel.opt.setting.cronJob');

    Route::get('get/setting/otp/info', 'SystemSettingController@get_otp_info')->name('get.setting.otp.info');
    Route::get('get/gender/comp', 'SystemSettingController@get_gender_comp')->name('get.gender.comp');

    // login to account
    Route::post('secure/login/account/', 'SystemSettingController@login_custom_account')->name('secure.login.account');
    Route::post('back/to/my/dashboard/', 'SystemSettingController@backto_mydashboard')->name('back.to.my.dashboard');


    // switch.dashboard
Route::get('switch-user', 'HomeController@switchUser')->name('switch.dashboard');
Route::post('worker-registration-graph', 'HomeController@getGraph')->name('get.worker.registration.graph');
Route::get('get/total/count/ajax', 'HomeController@getToatlCount')->name('get.total.count.ajax');
Route::get('worker-registration-graph-testing', 'HomeController@getGraphTesting')->name('get.worker.registration.graph.testing');

    // Staff and Workers

Route::get('view-dignitaries', 'Staff\ManageStaff@index')->name('view.staff');
Route::get('view-staff/{slug}', 'Staff\ManageStaff@index')->name('view.single.staff');
Route::get('manage-tanzim/assign-designation', 'Staff\ManageStaff@create')->name('add.new.staff');
Route::get('manage-tanzim/my-team/assign-designation', 'Staff\ManageStaff@createTeam')->name('make.my.team');
Route::get('manage-tanzim/create-below-level/assign-designation', 'Staff\ManageStaff@createTeamBelow')->name('create.below.level.tanzim');
Route::get('manage-tanzim/edit-designation/{id}', 'Staff\ManageStaff@edit')->name('edit.designation.view');
Route::get('change-status/of/designator/{id?}', 'Staff\ManageStaff@changeStatus')->name('change.status.of.designation');

Route::post('manage-tanzim/below-level-tanzim/assign-designation-user', 'Staff\ManageStaff@assign_designation')
->name('below.level.tanzim.assign.designation');
Route::get('manage-tanzim/below-level-tanzim/delete-user/{id?}', 'Staff\ManageStaff@deleteUser')->name('below.level.tanzim.delete.user');
Route::get('manage-tanzim/below-level-tanzim/get-worker/{id?}', 'Staff\ManageStaff@getWorker')->name('below.level.tanzim.get.worker');
Route::get('manage-tanzim/below-level-tanzim/assign-designation', 'Staff\ManageStaff@GetBelowBody')->name('below.level.tanzim.designations');
Route::post('manage-tanzim/assign-designation/save', 'Staff\ManageStaff@save')->name('add.new.staff.save');
Route::post('manage-tanzim/assign-designation/update', 'Staff\ManageStaff@update_user')->name('update.add.new.staff.save');

Route::get('assign/designation/worker/filter', 'Staff\ManageStaff@workersGet')->name('assign.designation.worker.filter');
Route::post('apply/filter/on/forum', 'Staff\ManageStaff@filterForum')->name('apply.filter.on.forum');



Route::post('change-worker-password', 'Staff\ManageStaff@ChnageWorkerPassword')->name('change.password.from.admin');
Route::post('update-profile-ajax-request', 'Staff\ManageStaff@updateProfile')->name('update.user.profile.from.admin');

Route::get('view-workers', 'ManageWorkers@index')->name('manage.workers');
Route::get('view-workers-change-password', 'ManageWorkers@chnagePassword')->name('manage.workers.change.password');
Route::get('add-new-worker', 'ManageWorkers@addNew')->name('add.new.worker');
Route::get('view-woker/profile/{slug}', 'ManageWorkers@show')->name('view.worker.profile');
Route::post('append-workers', 'ManageWorkers@getWorkers')->name('append.workers.list');
Route::get('get-stat-report', 'ManageWorkers@getReport')->name('get.stat.report');
Route::get('get-stat-report-full-page', 'ManageWorkers@getReport_full_page')->name('get.stat.report.full.page');


Route::get('/excel/users/exporting', 'ManageWorkers@export_users')->name('export.users');
Route::get('/csv/users/exporting', 'ManageWorkers@export_users_csv')->name('export.users.csv');
Route::get('/html/users/exporting', 'ManageWorkers@export_users_html')->name('export.users.html');
Route::get('/pdf/users/exporting', 'ManageWorkers@export_users_pdf')->name('export.users.pdf');



Route::get('change-password', 'ChangePasswordController@index')->name('change.password.view');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/edit-profile', 'User\ProfileController@showProfile')->name('user.profile');
Route::get('/my-profile', 'User\ProfileController@ViewProfile')->name('user.view.profile');
Route::post('/save-profile', 'User\ProfileController@UpdateProfile')->name('update.profile');

// Whatsapp Group Setting

Route::get('groups-list' , 'Groups\ManageGroups@groupList')->name('group.list');
Route::get('crate-new-group' , 'Groups\ManageGroups@createNew')->name('create.new.group');


// seting and operations

Route::get('/manage-province/{name?}', 'CRUD\ManageProvince@index')->name('manage.province');
Route::get('/edit-province/{slug}', 'CRUD\ManageProvince@edit')->name('edit.province');

Route::get('/manage-zones', 'CRUD\ManageZone@index')->name('manage.zone');
Route::get('/edit-zone/{slug}', 'CRUD\ManageZone@edit')->name('edit.zone');

Route::get('/manage-districts', 'CRUD\ManageDistrict@index')->name('manage.district');
Route::get('/edit-district/{slug}', 'CRUD\ManageDistrict@edit')->name('edit.district');

Route::get('/manage-tehsils', 'CRUD\ManageProvince@index')->name('manage.tehsil');
Route::get('/edit-tehsil/{slug}', 'CRUD\ManageProvince@edit')->name('edit.tehsil');

Route::get('/manage-UC', 'CRUD\ManageProvince@index')->name('manage.uc');
Route::get('/edit-Uc/{slug}', 'CRUD\ManageProvince@edit')->name('edit.uc');

Route::get('/manage-Units', 'CRUD\ManageProvince@index')->name('manage.unit');
Route::get('/edit-unit/{slug}', 'CRUD\ManageProvince@edit')->name('edit.unit');



// Forms Selections
// Forms Selections
// Forms Selections

Route::get('/manage-forums', 'Selections\ManageFourms@index')->name('Manage.forums');
Route::post('/store-forum', 'Selections\ManageFourms@index')->name('store.forum');
Route::get('/edit-forum/{slug}', 'Selections\ManageFourms@edit')->name('edit.forum');
Route::post('/edit-forum/{id}', 'Selections\ManageFourms@update')->name('store.edit.forum');

// Activities CRUD
// Activities CRUD
// Activities CRUD

Route::resource('ajaxActivities','CRUD\ActivityController');



Route::get('/manage-countries', 'Selections\ManageCountries@index')->name('Manage.countries');
Route::post('/store-country', 'Selections\ManageCountries@index')->name('store.country');
Route::get('/edit-country/{slug}', 'Selections\ManageCountries@edit')->name('edit.country');
Route::put('/edit-country/{slug}', 'Selections\ManageCountries@edit')->name('store.edit.country');





Route::get('/manage-university', 'Selections\ManageUniversity@index')->name('Manage.University');
Route::post('/store-University', 'Selections\ManageUniversity@index')->name('store.University');
Route::get('/edit-university/{slug}', 'Selections\ManageUniversity@edit')->name('edit.University');
Route::put('/edit-university/{slug}', 'Selections\ManageUniversity@edit')->name('store.edit.University');




Route::get('/manage-profession', 'Selections\ManageProfession@index')->name('Manage.Profession');
Route::post('/store-profession', 'Selections\ManageProfession@index')->name('store.Profession');
Route::get('/edit-profession/{slug}', 'Selections\ManageProfession@edit')->name('edit.Profession');
Route::put('/edit-profession/{slug}', 'Selections\ManageProfession@edit')->name('store.edit.Profession');




Route::get('/manage-designation', 'Selections\ManageDesignation@index')->name('Manage.Designation');
Route::post('/store-designation', 'Selections\ManageDesignation@index')->name('store.Designation');
Route::get('/edit-designation/{slug}', 'Selections\ManageDesignation@edit')->name('edit.Designation');
Route::put('/edit-designation/{slug}', 'Selections\ManageDesignation@edit')->name('store.edit.Designation');




// End Forms Selections
// End Forms Selections
// End Forms Selections

Route::get('/create-new-designation', 'Staff\Role\ManageRoles@create')->name('staff.role.create');
Route::get('/manage-tanzim/manage-designation/edit-designation/{id}', 'Staff\Role\ManageRoles@edit')->name('edit.designation.permission');
Route::post('/store-new-designation', 'Staff\Role\ManageRoles@store')->name('create.new.designation');
Route::post('/update-new-designation/{id}', 'Staff\Role\ManageRoles@update')->name('edit.new.designation');
Route::get('/view-designations', 'Staff\Role\ManageRoles@index')->name('staff.role.view');

// Manage Staff Start
// Manage Staff Start
// Manage Staff Start




// Manage Staff End
// Manage Staff End
// Manage Staff End
Route::get('/membership-reporting/district/{district?}', 'Reporting\MemberShipReport@district_report')->name('district.membership.report');



});
