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

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\JoinController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageRequestController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\PageContentGalleryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceAudioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceGalleryController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\ServiceVideoController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Site\AboutController as SiteAboutController;
use App\Http\Controllers\Site\CardController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\GalleryController;
use App\Http\Controllers\Site\GamificationController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PackageController as SitePackageController;
use App\Http\Controllers\Site\ServiceController as SiteServiceController;
use App\Http\Controllers\Site\TeamController as SiteTeamController;
use App\Http\Controllers\Site\VideoController as SiteVideoController;
use Illuminate\Support\Facades\Route;

Route::post('/lang' , [LangController::class  , 'postIndex'])->name('lang');

Route::prefix('admin')->group(function () {

    Route::get('/login', [LoginController::class ,'getLogin' ])->name('admin.auth');
    Route::post('/login', [LoginController::class ,'postLogin' ]);    
    Route::get('/logout', [LoginController::class , 'logout'])->name('admin.logout');

    Route::name('admin.')->middleware('auth.admin')->group(function () {

        //dashboard route
        Route::get('/', [DashboardController::class , 'getIndex'])->name('dashboard');

        /*
         * site-info routes
         */
        Route::prefix('site-info')->group(function (){
            Route::get('/', [SettingController::class , 'getIndex'])->name('settings');
            Route::post('/', [SettingController::class , 'postIndex']);
        });

        /*
         * profile routes
         */
        Route::prefix('profile')->group(function (){
            Route::get('/', [ProfileController::class , 'getIndex'])->name('profile');
            Route::post('/', [ProfileController::class , 'postIndex']);
        });

        /**
         * messages routes
         */
        Route::prefix('messages')->group(function (){
            Route::get('/' ,[MessageController::class , 'getIndex'])->name('messages');
            Route::get('/{id}' ,[MessageController::class , 'getSingleMessage'])->name('messages.single');
            Route::get('/delete/{id}' ,[MessageController::class , 'getDelete'])->name('messages.delete');
        });

        /**
         * package-request routes
         */
        Route::prefix('package-request')->group(function (){
            Route::get('/' ,[PackageRequestController::class , 'getIndex'])->name('package_request');
            Route::get('/{id}' ,[PackageRequestController::class , 'getSingleMessage'])->name('package_request.single');
            Route::get('/delete/{id}' ,[PackageRequestController::class , 'getDelete'])->name('package_request.delete');
        });

        /**
         * packages routes
         */
        Route::prefix('packages')->group(function (){
            Route::get('/' ,[PackageController::class , 'getIndex'])->name('packages');
            Route::post('/' ,[PackageController::class , 'postIndex']);
            Route::get('/info/{id}' ,[PackageController::class , 'getInfo'])->name('packages.info');
            Route::post('/edit/{id}' ,[PackageController::class , 'postEdit'])->name('packages.edit');
            Route::get('/delete/{id}' ,[PackageController::class , 'getDelete'])->name('packages.delete');

            //orders routes
            Route::get('/orders/{id}' ,[PackageController::class , 'getOrder'])->name('packages.orders');
            Route::get('/orders/delete/{id}' ,[PackageController::class , 'getDeleteOrder'])->name('packages.orders.delete');
        });

        /**
         * join-requests routes
         */
        Route::prefix('join-requests')->group(function (){
            
            Route::get('/' ,[JoinController::class , 'getIndex'])->name('join');
            Route::get('/delete/{id}' ,[JoinController::class , 'getDelete'])->name('join.delete');
        });

        /**
         * subscribers routes
         */
        Route::prefix('subscribers')->group(function (){
            Route::get('/' ,[SubscriberController::class , 'getIndex'])->name('subscribers');
            Route::get('/delete/{id}' ,[SubscriberController::class , 'getDelete'])->name('subscribers.delete');
        });

        /**
         * team routes
         */
        Route::prefix('team')->group(function (){
            Route::get('/' ,[TeamController::class , 'getIndex'])->name('team');
            Route::post('/' ,[TeamController::class , 'postIndex']);
            Route::get('/info/{id}' ,[TeamController::class , 'getInfo'])->name('team.info');
            Route::post('/edit/{id}' ,[TeamController::class , 'postEdit'])->name('team.edit');
            Route::get('/delete/{id}' ,[TeamController::class , 'getDelete'])->name('team.delete');

            /**
             * social links
             */
            Route::prefix('links')->group(function (){
                Route::get('/{id}' ,[TeamController::class , 'getIndex'])->name('team.links');
                Route::post('/{id}' ,[TeamController::class , 'postIndex']);
                Route::get('/info/{id}' ,[TeamController::class , 'getInfo'])->name('team.links.info');
                Route::post('/edit/{id}' ,[TeamController::class , 'postEdit'])->name('team.links.edit');
                Route::get('/delete/{id}' ,[TeamController::class , 'getDelete'])->name('team.links.delete');
            });
        });

        /**
         * testimonials routes
         */
        Route::group(['prefix' => 'testimonials'] ,function (){
            Route::get('/' ,[TestimonialController::class , 'getIndex'])->name('testimonials');
            Route::post('/' ,[TestimonialController::class , 'postIndex']);
            Route::get('/info/{id}' ,[TestimonialController::class , 'getInfo'])->name('testimonials.info');
            Route::post('/edit/{id}' ,[TestimonialController::class , 'postEdit'])->name('testimonials.edit');
            Route::get('/delete/{id}' ,[TestimonialController::class , 'getDelete'])->name('testimonials.delete');
        });
        
        /**
         * Blog routes
         */
        Route::group(['prefix' => 'blog'] ,function (){
            Route::get('/' ,[BlogController::class , 'getIndex'])->name('blog');
            Route::post('/' ,[BlogController::class , 'postIndex']);
            Route::get('/info/{id}' ,[BlogController::class , 'getInfo'])->name('blog.info');
            Route::post('/edit/{id}' ,[BlogController::class , 'postEdit'])->name('blog.edit');
            Route::get('/delete/{id}' ,[BlogController::class , 'getDelete'])->name('blog.delete');
        });

        /**
         * services routes
         */
        Route::name('services')->prefix('services')->group(function (){
            Route::get('/' ,[ServiceController::class , 'getIndex']);
            Route::post('/' ,[ServiceController::class , 'postIndex']);
            Route::get('/info/{id}' ,[ServiceController::class , 'getInfo'])->name('.info');
            Route::post('/edit/{id}' ,[ServiceController::class , 'postEdit'])->name('.edit');
            Route::get('/delete/{id}' ,[ServiceController::class , 'getDelete'])->name('.delete');

            /**
             * Gallery
             */
            Route::prefix('gallery')->name('.images')->group(function (){
                Route::get('/{id}' ,[ServiceGalleryController::class , 'getIndex']);
                Route::post('/{id}' ,[ServiceGalleryController::class , 'postIndex']);
                Route::get('/info/{id}' ,[ServiceGalleryController::class , 'getInfo'])->name('.info');
                Route::post('/edit/{id}' ,[ServiceGalleryController::class , 'postEdit'])->name('.edit');
                Route::get('/delete/{id}' ,[ServiceGalleryController::class , 'getDelete'])->name('.delete');
            });

            /**
             * videos
             */
            Route::prefix('videos')->name('.videos')->group(function (){
                Route::get('/{id}' ,[ServiceVideoController::class , 'getIndex']);
                Route::post('/{id}' ,[ServiceVideoController::class , 'postIndex']);
                Route::get('/info/{id}' ,[ServiceVideoController::class , 'getInfo'])->name('.info');
                Route::post('/edit/{id}' ,[ServiceVideoController::class , 'postEdit'])->name('.edit');
                Route::get('/delete/{id}' ,[ServiceVideoController::class , 'getDelete'])->name('.delete');
            });

            /**
             * audio
             */
            Route::prefix('audio')->name('.audio')->group(function (){
                Route::get('/{id}' ,[ServiceAudioController::class , 'getIndex']);
                Route::post('/{id}' ,[ServiceVideoController::class , 'postIndex']);
                Route::get('/info/{id}' ,[ServiceVideoController::class , 'getInfo']);
                Route::post('/edit/{id}' ,[ServiceVideoController::class , 'postEdit']);
                Route::get('/delete/{id}' ,[ServiceVideoController::class , 'getDelete']);
            });

            /**
             * types
             */
            Route::prefix('categories')->name('.types')->group(function (){
                Route::get('/{id}' ,[ServiceTypeController::class , 'getIndex']);
                Route::post('/{id}' ,[ServiceTypeController::class , 'postIndex']);
                Route::get('/info/{id}' ,[ServiceTypeController::class , 'getInfo'])->name('.info');
                Route::post('/edit/{id}' ,[ServiceTypeController::class , 'postEdit'])->name('.edit');
                Route::get('/delete/{id}' ,[ServiceTypeController::class , 'getDelete'])->name('.delete');
            });
        });

        /**
         * downloads routes
         */
        Route::prefix('downloads')->group(function (){
            Route::get('/' ,[DownloadController::class , 'getIndex'])->name('downloads');
            Route::post('/' ,[DownloadController::class , 'postIndex']);
            Route::get('/info/{id}' ,[DownloadController::class , 'getInfo'])->name('downloads.info');
            Route::post('/edit/{id}' ,[DownloadController::class , 'postEdit'])->name('downloads.edit');
            Route::get('/delete/{id}' ,[DownloadController::class , 'getDelete'])->name('downloads.delete');
        });

        /**
         * social_links routes
         */
        Route::prefix('social-links')->group(function (){
            Route::get('/' ,[SocialLinkController::class , 'getIndex'])->name('links');
            Route::post('/' ,[SocialLinkController::class , 'postIndex']);
            Route::get('/info/{id}' ,[SocialLinkController::class , 'getInfo'])->name('links.info');
            Route::post('/edit/{id}' ,[SocialLinkController::class , 'postEdit'])->name('links.edit');
            Route::get('/delete/{id}' ,[SocialLinkController::class , 'getDelete'])->name('links.delete');
        });

        /**
         * videos routes
         */
        Route::prefix('videos')->group(function (){
            Route::get('/' ,[VideoController::class , 'getIndex'])->name('videos');
            Route::post('/' ,[VideoController::class , 'postIndex']);
            Route::get('/info/{id}' ,[VideoController::class , 'getInfo'])->name('videos.info');
            Route::post('/edit/{id}' ,[VideoController::class , 'postEdit'])->name('videos.edit');
            Route::get('/delete/{id}' ,[VideoController::class , 'getDelete'])->name('videos.delete');
        });

        /**
         * events routes
         */
        Route::prefix('events')->group(function (){
            Route::get('/' ,[ArticleController::class , 'getIndex'])->name('articles');
            Route::post('/' ,[ArticleController::class , 'postIndex']);
            Route::get('/info/{id}' ,[ArticleController::class , 'getInfo'])->name('articles.info');
            Route::post('/edit/{id}' ,[ArticleController::class , 'postEdit'])->name('articles.edit');
            Route::get('/delete/{id}' ,[ArticleController::class , 'getDelete'])->name('articles.delete');
        });

        /**
         * clients routes
         */
        Route::prefix('vendors')->group(function (){
            Route::get('/' ,[ClientController::class , 'getIndex'])->name('clients');
            Route::post('/' ,[ClientController::class , 'postIndex']);
            Route::get('/info/{id}' ,[ClientController::class , 'getInfo'])->name('clients.info');
            Route::post('/edit/{id}' ,[ClientController::class , 'postEdit'])->name('clients.edit');
            Route::get('/delete/{id}' ,[ClientController::class , 'getDelete'])->name('clients.delete');
        });

        /**
         * categories routes
         */
        Route::prefix('categories')->group(function (){
            Route::get('/' ,[CategoryController::class , 'getIndex'])->name('categories');
            Route::post('/' ,[CategoryController::class , 'postIndex']);
            Route::get('/info/{id}' ,[CategoryController::class , 'getInfo'])->name('categories.info');
            Route::post('/edit/{id}' ,[CategoryController::class , 'postEdit'])->name('categories.edit');
            Route::get('/delete/{id}' ,[CategoryController::class , 'getDelete'])->name('categories.delete');

            /**
             * projects routes
             */
            Route::group(['prefix' => 'projects'] ,function (){
                Route::get('/{id}' , [ProjectController::class , 'getIndex'])->name('projects');
                Route::post('/{id}' , [ProjectController::class , 'postIndex']);
                Route::get('/info/{id}' , [ProjectController::class , 'getInfo'])->name('projects.info');
                Route::post('/edit/{id}' , [ProjectController::class , 'postEdit'])->name('projects.edit');
                Route::get('/delete/{id}' , [ProjectController::class , 'getDelete'])->name('projects.delete');
            });
        });

        /**
         * about routes
         */
        Route::prefix('about-us')->group(function (){
            Route::get('/' ,[AboutController::class , 'getIndex'])->name('about');
            Route::get('/info/{id}' ,[AboutController::class , 'getInfo'])->name('about.info');
            Route::post('/edit/{id}' ,[AboutController::class , 'postEdit'])->name('about.edit');
        });

        /**
         * banners routes
         */
        Route::prefix('banners')->group(function (){
            Route::get('/' ,[BannerController::class , 'getIndex'])->name('banners');
            Route::get('/info/{id}' ,[BannerController::class , 'getInfo'])->name('banners.info');
            Route::post('/edit/{id}' ,[BannerController::class , 'postEdit'])->name('banners.edit');
        });

        /**
         * pages-content routes
         */
        Route::prefix('pages-content')->group(function (){
            Route::get('/' ,[PageContentController::class , 'getIndex'])->name('pages');
            Route::get('/info/{id}' ,[PageContentController::class , 'getInfo'])->name('pages.info');
            Route::post('/edit/{id}' ,[PageContentController::class , 'postEdit'])->name('pages.edit');
            
            Route::get('/messages' ,[PageContentController::class , 'getMessages'])->name('pages.messages');
            Route::get('/messages/delete/{id}' ,[PageContentController::class , 'getDelete'])->name('pages.messages.delete');

            /**
             * Gallery
             */
            Route::prefix('gallery')->group(function (){
                Route::get('/{id}' ,[PageContentGalleryController::class , 'getIndex'])->name('pages.images');
                Route::post('/{id}' ,[PageContentGalleryController::class , 'postIndex']);
                Route::get('/info/{id}' ,[PageContentGalleryController::class , 'getInfo'])->name('pages.images.info');
                Route::post('/edit/{id}' ,[PageContentGalleryController::class , 'postEdit'])->name('pages.images.edit');
                Route::get('/delete/{id}' ,[PageContentGalleryController::class , 'getDelete'])->name('pages.images.delete');
            });
        });
    });
});

/**
 * front end routes
 */
Route::name('site.')->group(function (){
    /**
     * index route
     */
    Route::get('/' , [HomeController::class , 'getIndex'])->name('index');
    Route::get('/privacy-policy' ,[HomeController::class , 'getPolicy'])->name('privacy');
    Route::get('/mobile-links' ,[HomeController::class , 'getMobileView'])->name('mobile');
    Route::post('/subscribe' ,[HomeController::class , 'postIndex'])->name('subscribe');
    Route::post('/subscribe' ,[HomeController::class , 'postIndex'])->name('subscribe');
    Route::post('/choose-plan' ,[HomeController::class , 'postChoosePackage'])->name('choose.plan');
    
    /**
    * Retailtainment route
    */
    Route::get('/retailtainment' , [RetailtainmentController::class , 'getIndex'])->name('retailtainment');

    /**
    * Gamification route
    */
    Route::get('/gamification' , [GamificationController::class , 'getIndex'])->name('gamification');
    Route::post('/other_form' , [GamificationController::class , 'postIndex'])->name('other_form');

    /**
     * videos route
     */
    Route::get('/videos' , [SiteVideoController::class , 'getIndex'])->name('videos');

    /**
     * about-us route
     */
    Route::get('/our-story' , [SiteAboutController::class , 'getIndex'])->name('about');

    /**
     * services route
     */
    Route::get('/services' , [SiteServiceController::class , 'getIndex'])->name('services');
    Route::get('/services/{slug}' , [SiteServiceController::class , 'getSingleService'])->name('services.single');

    /**
     * team route
     */
    Route::get('/team' , [SiteTeamController::class , 'getIndex'])->name('team');
    Route::post('/join' , [SiteTeamController::class , 'postIndex'])->name('join');
    
    /**
     * articles route
     */
    Route::get('/blog' , [HomeController::class , 'getArticles'])->name('blog');
    Route::get('/blog/{slug}' , [HomeController::class , 'getArticle'])->name('article');

    /**
     * gallery route
     */
    Route::get('/fun-activities-inflatables-in-Egypt' , [GalleryController::class , 'getIndex'])->name('gallery');

    /**
     * cards route
     */
    Route::get('/creative–activities–inflatables-in–Egypt' , [CardController::class , 'getIndex'])->name('cards');

    /**
     * franchising route
     */
    Route::get('/franchising-small-business-home-business–woman-business-inflatables' , [CardController::class , 'getFranchising'])->name('franchising');

    /**
     * contact us route
     */
    Route::get('/theme-parks-beach-resorts–inflatables–birthday-in-Egypt/{service_id?}' , [ContactController::class , 'getIndex'])->name('contact');
    Route::post('/theme-parks-beach-resorts–inflatables–birthday-in-Egypt' , [ContactController::class , 'postIndex']);

    /**
     * custom-your-package routes
     */
    Route::get('/custom-your-package' , [SitePackageController::class , 'getIndex'])->name('packages');
    Route::post('/custom-your-package' , [SitePackageController::class , 'postIndex']);
    Route::post('/projects' , [SitePackageController::class , 'postProject'])->name('projects');
    Route::post('/change-service' , [SitePackageController::class , 'postChangeService'])->name('services.change');
    Route::post('/send-email' , [SitePackageController::class , 'postSendEmail'])->name('package.email');
});


// //Clear Cache facade value:
// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     return '<h1>Cache facade value cleared</h1>';
// });

// //Reoptimized class loader:
// Route::get('/optimize', function() {
//     $exitCode = Artisan::call('optimize');
//     return '<h1>Reoptimized class loader</h1>';
// });

// //Route cache:
// Route::get('/route-cache', function() {
//     $exitCode = Artisan::call('route:cache');
//     return '<h1>Routes cached</h1>';
// });

// //Clear Route cache:
// Route::get('/route-clear', function() {
//     $exitCode = Artisan::call('route:clear');
//     return '<h1>Route cache cleared</h1>';
// });

// //Clear View cache:
// Route::get('/view-clear', function() {
//     $exitCode = Artisan::call('view:clear');
//     return '<h1>View cache cleared</h1>';
// });

// //Clear Config cache:
// Route::get('/config-cache', function() {
//     $exitCode = Artisan::call('config:cache');
//     return '<h1>Clear Config cleared</h1>';
// });



