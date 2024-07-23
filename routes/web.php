 <?php

use Devio\Pipedrive\Pipedrive;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

Route::get("/", function () {
    return Inertia::render("Welcome", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get("/pipedrive", function() {
        $pipedrive = new Pipedrive(config('services.pipedrive.token'));
        $organizations = $pipedrive->organizations()->all();
        dd($organizations);
});
// Default route for the root URL
Route::middleware([LocaleMiddleware::class])->group(function () {
    Route::get('/', function () {
        return redirect('/' . app()->getLocale());
    });

    // Routes with locale prefix
    Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-z]{2}']], function () {
        Route::get('/', function () {
            return Inertia::render('Welcome', [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]);
        })->name('home');

        Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
            Route::get('/dashboard', function () {
                return Inertia::render('Dashboard');
            })->name('dashboard');
        });

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/{type}/{version}/{options?}/{slug}', [ProductController::class, 'show'])->name('products.show')
        ->where('options', '.*')
        ->where('options', '(.*|no-option)'); // Allow 'no-option' as a valid option
        Route::get('/products/{slug}/pdf', [ProductController::class, 'generateProductPdf'])->name('products.pdf');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/category/{type}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/contact', [ContactController::class, 'contactFormShow'])->name('contacts.form.show');
        Route::get('/get-a-quote', [ContactController::class, 'getQuoteFormShow'])->name('contacts.get.quote.form.show');
        Route::get('/cookie-policy', [PolicyController::class, 'showCookiePolicy'])->name('policy.showCookiePolicy');
        Route::get('/privacy-policy', [PolicyController::class, 'showPrivacyPolicy'])->name('policy.showPrivacyPolicy');
        Route::get('/terms-and-conditions', [PolicyController::class, 'showTermsAndConditions'])->name('policy.showTermsAndConditions');
        Route::get('/imprint', [PolicyController::class, 'showImprint'])->name('policy.showImprint');
    });
});

Route::post('/change-locale/{locale}', function ($locale) {
    if (in_array($locale, ['de', 'dk', 'ee', 'en', 'es', 'fi', 'fr', 'it', 'lu', 'ne', 'no', 'pt', 'se'])) {
        session()->put('locale', $locale);
        App::setLocale($locale);
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false], 400);
})->name('change.locale')->middleware('web');

Route::post('/contact', [ContactController::class,'submit']);
Route::post('/client-request', [ContactController::class, 'submit']);

Route::fallback(function () {
    return redirect(app()->getLocale());
});
