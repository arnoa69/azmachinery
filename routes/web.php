 <?php

use Devio\Pipedrive\Pipedrive;
use Gemini\Data\Candidate;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Http;
use OpenAI\Client;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Log;

Route::get("/", function () {
    return Inertia::render("Welcome", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get('/chatgpt', function() {
    // Sample slug
    $slug = 'az-ramp-star-8t-standard-gal-e-rl-zr';

    // Parse the slug
    $parts = explode('-', $slug);
    $name = $parts[0] . '-' . $parts[1] . '-' . $parts[2]; // az-ramp-star
    $capacity = $parts[3]; // 8t
    $version = $parts[4]; // standard
    $options = array_slice($parts, 5); // ['gal', 'e', 'rl', 'zr']

    // Define the options map
    $optionsMap = [
        'zr' => 'zone-refuge',
        'rl' => 'side-railings',
        'e' => 'electric',
        'ff' => 'fork-slider',
        'gal' => 'full-galvanized',
        'tb' => 'tarpaulin-tunnel',
    ];

    // Build the options description
    $optionsDescription = array_map(function($option) use ($optionsMap) {
        return $optionsMap[$option] ?? $option;
    }, $options);

    // Construct the prompt
    $prompt = "It is a mobile loading ramp for capacities up to $capacity. It is the $version version and has the following options: " . implode(', ', $optionsDescription) . ".";

    // Add the instruction for Gemini to generate plain text content with a max of 550 characters
    $instruction = "Generate plain text content for a product detail page with a maximum length of 450 characters. Do not include any titles, headings, or lists.";

    // Generate content using GeminiPro
    $result = Gemini::geminiPro()->generateContent($instruction . ' ' . $prompt);

    $content = trim(strip_tags($result->candidates[0]->content->parts[0]->text));
    dd($content);
});

Route::get("/pipedrive", function() {
        $pipedrive = new Pipedrive(config('services.pipedrive.token'));
        $fields = $pipedrive->organizationFields()->all();
        $dealFields = $pipedrive->dealFields()->all();
                        // $response = $pipedrive->organizationFields()->all();

                        // if ($response->isSuccess()) {
                        //     $fields = $response->getData();
                        //     foreach ($fields as $field) {
                        //         if ($field->key === 'label') {
                        //             $options = $field->options;
                        //             foreach ($options as $option) {
                        //                 logger("Label: {$option->label}, ID: {$option->id}");
                        //             }
                        //             break;
                        //         }
                        //     }
                        // } else {
                        //     logger()->error('Failed to fetch organization fields: ' . $response->getErrorMessage());
                        // }

                        //$organizations = $pipedrive->organizations()->all();


        foreach ($dealFields as $field) {
            if ($field->name === 'Deal source') {
                logger("Deal source: {$field->key}");
                break;
            } else {
                logger("Field: niet amgio");
            }
        }

// gugus@sugus.com

        dd($dealFields);
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
        Route::get('/products/{type}', [ProductController::class, 'list'])->name('products.list');
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
    if (in_array($locale, ['de', 'dk', 'ee', 'en', 'es', 'fi', 'fr', 'it', 'lu', 'nl', 'no', 'pt', 'se'])) {
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
