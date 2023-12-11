<?php

use App\Http\Controllers\admin\CerificateController;
use App\Http\Controllers\admin\NewsfeedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\users\HomeController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BarangayPositionController;
use App\Http\Controllers\BlotterController;
use App\Http\Controllers\NewscommentController;
use App\Http\Controllers\NewsfeedscommentController;
use App\Http\Controllers\OfficialsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Users\MyRequestController;
use App\Http\Controllers\GenerateCertificateController;
use App\Models\Blotter;
use App\Models\Newscomment;
use App\Models\Newsfeedscomment;
use App\Models\NewsfeedsImagesModel;
use App\Models\NewsfeedsModel;
use App\Models\Official;
use App\Models\Post;
use App\Models\Request_list;
use App\Models\Services;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/postview/{id}', function ($id) {
    $post = NewsfeedsModel::findOrFail($id);

    return view('postview', [
        'post' => $post,
        'images' => NewsfeedsImagesModel::where('newsfeed_id', "=", $id)->get(),
        'comments' => Newsfeedscomment::where('newsfeeds_id', "=", $id)->with('relation')->get(),
    ]);
});
Route::get('/newsview/{slug}', function ($slug) {
    $news = Post::where('slug', $slug)->first();
    if ($news) {
        return view('newsview', [
            'news' => $news,
            'comments' => Newscomment::where('news_id', "=", $news->id)->with('relation')->get(),
        ]);
    }
    return redirect(404);
});


// Route::get('/ss', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/news', 'news')->name('news');
    Route::get('/annoucement', 'annoucement')->name('annoucement');
    Route::get('/activities', 'activities')->name('activities');
    Route::POST('/users/getPost', 'getPost')->name('users.getpost');
    Route::POST('/users/getAnnoucement', 'getAnnouncement')->name('users.annoucement');
    Route::POST('/users/getActivities', 'getActivities')->name('users.activities');
    Route::POST('/users/getPostImages', 'getPostImages')->name('users.getPostImages');
});

Route::post('/convertdate', [NotificationController::class, 'timeForHumans'])->name('convert.date');
Route::POST('/comments/news_comment', [NewscommentController::class, 'getNewsComment'])->name('newscomment.comment');
Route::POST('/newsfeedscomments/news_comment', [NewsfeedscommentController::class, 'getNewsfeedsComment'])->name('newsfeedscomment.comment');

Route::middleware('auth')->group(function () {


    Route::controller(NewscommentController::class)->group(function () {
        Route::POST('/comments/store', 'store')->name('newscomment.store');
    });
    Route::controller(NewsfeedscommentController::class)->group(function () {
        Route::POST('/newsfeedscomments/store', 'store')->name('newsfeedscomment.store');
    });
    Route::post('/users/make_request', [HomeController::class, 'create'])->name('users.make.request');
    Route::controller(MyRequestController::class)->group(function () {
        Route::get('/users/myrequest/{request_id?}/{notification_id?}', 'index')->name('myrequest');
    });


    Route::controller(ProfileController::class, 'index')->group(
        function () {
            Route::get('/profile', 'index')->name('profile');
            Route::get('/profile/update', 'show')->name('profile.show');
            Route::POST('/profile/update/save', 'update')->name('profile.update');
        }
    );

    Route::get('/changepass', function () {
        return view('users.changepass');
    })->name('changepass');

    Route::middleware('admin')->group(function () {

        Route::get('/admin', function () {

            $services = Services::select('service_name', DB::raw('COUNT(request_list.service_id) as count'))
                ->join('request_list', 'services.id', '=', 'request_list.service_id')
                ->groupBy('request_list.service_id', 'service_name')
                ->orderByDesc('count')
                ->limit(5)
                ->get();

            // Prepare the data for the chart
            $labels = $services->pluck('service_name')->toArray();
            $values = $services->pluck('count')->toArray();
            return view(
                'admin.index',
                [
                    'labels' => $services->pluck('service_name')->toArray(),
                    '$values' => $services->pluck('count')->toArray(),
                    'users' => User::get()->count() - 1,
                    'officials' => Official::get()->count(),
                    'news' => Post::get()->count(),
                    'feeds' => NewsfeedsModel::get()->count(),
                    'activeBlotters' => Blotter::where('status', "=", 1)->get()->count(),
                    'settledBlotters' => Blotter::where('status', "=", 2)->get()->count(),
                    'pendingRequests' => Request_list::where('status', "=", 0)->get()->count(),
                    'completedRequests' => Request_list::where('status', "=", 3)->get()->count(),
                ]
            );
        })->name('dashboard');

        Route::controller(ServicesController::class)->group(function () {
            Route::get('/admin/services/', 'index')->name('services.index');
            Route::get('/admin/services/create', 'create')->name('services.create');
            Route::POST('/admin/services/store', 'store')->name('services.store');
            // Route::get('/admin/officials/{id}/toggle', 'toggle')->name('officials.toggle');
            Route::get('/admin/officials/{service}/edit', 'show')->name('services.edit');
            // Route::POST('/admin/officials/update/{official}', 'update')->name('officials.update');
        });
        Route::controller(OfficialsController::class)->group(function () {
            Route::get('/admin/officials/', 'index')->name('officials.index');
            Route::get('/admin/officials/create', 'create')->name('officials.create');
            Route::POST('/admin/officials/store', 'store')->name('officials.store');
            Route::get('/admin/officials/{id}/toggle', 'toggle')->name('officials.toggle');
            Route::get('/admin/officials/{id}/edit', 'show')->name('officials.edit');
            Route::POST('/admin/officials/update/{official}', 'update')->name('officials.update');
        });
        Route::controller(BlotterController::class)->group(function () {
            Route::get('/admin/blotter/', 'index')->name('blotter.index');
            Route::get('/admin/blotter/create', 'create')->name('blotter.create');
            Route::get('/admin/blotter/{id}/show', 'show')->name('blotter.show');
            Route::get('/admin/blotter/{id}/delete', 'delete')->name('blotter.delete');
            Route::POST('/admin/blotter/store', 'store')->name('blotter.store');
            Route::get('/admin/blotter/{id}/settled', 'settled')->name('blotter.settled');
            Route::get('/admin/blotter/{id}/edit', 'edit')->name('blotter.edit');
            Route::POST('/admin/blotter/update/{blotter}', 'update')->name('blotter.update');
        });

        // Route::controller(CerificateController::class)->group(function () {
        //     Route::get('/admin/certificate/', 'index')->name('certificate.index');
        //     Route::POST('/admin/certificate/indigency', 'indigency')->name('certificate.indigency');
        //     Route::get('/admin/certificate/indigency/pdf', 'indigencyPdf')->name('certificate.indigency.pdf');
        // });
        Route::prefix('/admin/certificate')->group(function () {
            Route::get('/', [CerificateController::class, 'index'])->name('certificate.index');
            Route::post('/indigency', [CerificateController::class, 'indigency'])->name('certificate.indigency');
            Route::get('/certificate/indigency', 'CerificateController@indigencyWithQr')->name('certificate.indigency');
            Route::post('/indigency-with-qr', [CerificateController::class, 'indigencyWithQr'])->name('certificate.indigency.with.qr');
        });

        Route::controller(NewsfeedController::class)->group(function () {
            Route::get('/admin/newsfeed/', 'index')->name('newsfeed');
            Route::get('/admin/newsfeed/create', 'create')->name('newsfeed.create');
            Route::get('/admin/newsfeed/{id}/show', 'show')->name('newsfeed.show');
            Route::post('/admin/newsfeed/store', 'store')->name('newsfeed.store');
            Route::post('/admin/newsfeed/update/{feed}', 'update')->name('newsfeed.update');
            Route::get('/admin/newsfeed/{id}/delete', 'delete')->name('newsfeed.delete');
            Route::get('/admin/newsfeed/delete/{id}', 'deleteImages')->name('newsfeed.delete.image');
        });
        Route::controller(AssetsController::class)->group(function () {
            Route::get('/admin/assets/', 'index')->name('assets');
            Route::post('/admin/assets/store', 'store')->name('assets.store');
        });
        Route::controller(PostController::class)->group(function () {
            Route::get('/admin/post/', 'index')->name('post');
            Route::get('/admin/post/edit/{id}', 'edit')->name('form.edit.post');
            Route::post('/admin/post/update', 'update')->name('update.post');
            Route::get('/admin/post/{id}/toggle', 'toggle')->name('post.toggle');
            Route::get('/admin/post/create', 'create')->name('create_post');
            Route::get('/admin/post/{id}delete', 'delete')->name('post.delete');
            Route::post('/admin/post/store', 'store')->name('store.post');
        });


        Route::controller(UsersController::class)->group(function () {
            Route::get('/admin/users/', 'index')->name('users.index');
            Route::get('/admin/users/{id}/{id_status}/toggle', 'toggle')->name('users.toggle');
        });

        Route::controller(RequestController::class)->group(function () {
            Route::get('/admin/request/{request_id?}/{notification_id?}', 'index')->name('request');
        });

        Route::controller(GenerateCertificateController::class)->group(function () {
            Route::get('/admin/generate_certificate/', 'view')->name('generate_certificate.view');
            Route::get('/admin/generate_certificate/{user_id}/{request_id}/{service_name}/', 'show')->name('generate_certificate.show');
        });
        // Route::get('/admin/request/', 'cert_indigency')->name('request.cert_indigency');
        // Route::get('/admin/request/cert_indigency', 'RequestController@cert_indigency')->name('request.cert_indigency');

        Route::resource('request', RequestController::class)->only(['cert_indigency']);

        Route::get('admin/barangay_positions', [BarangayPositionController::class, 'index'])
            ->name('barangay_positions.index');

        Route::get('admin/barangay_positions/create', [BarangayPositionController::class, 'create'])
            ->name('barangay_positions.create');

        Route::post('admin/barangay_positions', [BarangayPositionController::class, 'store'])
            ->name('barangay_positions.store');

        Route::get('admin/barangay_positions/{barangayPosition}/edit', [BarangayPositionController::class, 'edit'])
            ->name('barangay_positions.edit');

        Route::put('admin/barangay_positions/{barangayPosition}', [BarangayPositionController::class, 'update'])
            ->name('barangay_positions.update');

        Route::delete('admin/barangay_positions/{barangayPosition}', [BarangayPositionController::class, 'destroy'])
            ->name('barangay_positions.destroy');
    });

    Route::controller(NotificationController::class)->group(function () {
        Route::post('/getnotifications', 'getUserNotifations')->name('get.notifications');
        Route::get('/admin/notifaction/{user_id}/{request_id}/{status}', 'createNotification')->name('admin.createNotifaction');
    });
});

require __DIR__ . '/auth.php';
