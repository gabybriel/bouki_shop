<?php

use App\Http\Controllers\AirtelController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CategoriePageController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandeListController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\MtnController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\subcategorieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UpdateStatutController;
use App\Http\Controllers\UsercgvController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\VendorArticleController;
use App\Http\Controllers\VendorDashController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WhatsappController;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Ticket;

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

Route::get('/auth-login', [AuthLoginController::class, 'index'])->name('authlogin');

// User Routes  middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard',  [UserDashController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/edit/{id}',  [UserDashController::class, 'edit'])->name('profile.edit');
    Route::post('/dashboard/update/{id}',  [UserDashController::class, 'update'])->name('profile.update');
    Route::get('/liste-commandes', [CommandeListController::class, 'index'])->name('commandelist');


    Route::resource('/', WelcomeController::class);
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
    Route::get('/articles/details/{id}', [WelcomeController::class, 'show'])->name('details');



    Route::get('/autres', [Controller::class, 'plus'])->name('autres.plus');

    Route::get('/search', [ArticleController::class, 'search'])->name('search');



    //Pannier
    Route::post('/ajout/panier', [CartController::class, 'store'])->name('cart.store');
    Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/panier/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/panier/{rowId}', [CartController::class, 'update'])->name('cart.update');
    Route::patch('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');


    //Paiements MOMO
    Route::get('/paiement/mtn', [MtnController::class, 'index'])->name('mtn');
    Route::get('/paiement/airtel', [AirtelController::class, 'index'])->name('airtel');

    Route::get('/confirmation', [ConfirmController::class, 'index'])->name('confirm.index');

    Route::get('/conditions/generales', [UsercgvController::class, 'index'])->name('user.cgv');

    Route::get('/commander', [CartController::class, 'create'])->name('cart.create');
    Route::post('/valider/commande', [CommandeController::class, 'store'])->name('commande.store');
    Route::get('/valider/commande', [CommandeController::class, 'store'])->name('commande.store');


    //Filtre Categories
    Route::get('/filtres', [CategoriePageController::class, 'show'])->name('catepage.show');
    //Route::get('/articles/{category}/{subcategory}', [CategoriePageController::class, 'show'])->name('catepage.show');
});

// Admin Routes middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', [DashController::class, 'index'])->name('admin-dashboard')->middleware('admin');


    Route::resource('articles', ArticleController::class)->middleware('admin');
    Route::post('articles', [ArticleController::class, 'edit'])->middleware('admin');
    Route::post('articles', [ArticleController::class, 'update'])->name('articles.upadte')->middleware('admin');
    Route::post('articles/{id}', [ArticleController::class, 'update'])->name('articles.upadte')->middleware('admin');

    Route::get('details/article/{id}', [ArticleController::class, 'show'])->name('details.article')->middleware('admin');

    Route::get('ajout/article', [ArticleController::class, 'create'])->name('ajout.article')->middleware('admin');
    Route::post('ajout/article', [ArticleController::class, 'store'])->name('articles.store')->middleware('admin');


    Route::resource('categories', CategorieController::class)->middleware('admin');
    Route::resource('sous-categories', subcategorieController::class)->middleware('admin');

    Route::resource('users', UserController::class)->middleware('admin');
    Route::resource('conditions', ConditionController::class)->middleware('admin');

    Route::resource('orders', OrderController::class)->parameters(['orders' => 'commande'])->middleware('admin');
    Route::resource('tickets', TicketController::class)->parameters(['tickets' => 'commande'])->middleware('admin');


    Route::resource('rapports', RapportController::class)->middleware('admin');
    Route::resource('slider-config', SliderController::class)->middleware('admin');
    Route::resource('formations', FormationController::class)->middleware('admin');

    Route::post('update-status', [ArticleController::class, 'updateStatus'])->name('updateStatus')->middleware('admin');


    //Variants
    Route::put('articles/{article}/variants', [ProductVariantController::class, 'store'])->name('variants.store');
    Route::get('articles/{article}/variants', [ProductVariantController::class, 'store'])->name('variants.store');
    Route::post('articles/{article}/variants', [ProductVariantController::class, 'store'])->name('variants.store');
    Route::put('variants/{variant}', [ProductVariantController::class, 'update'])->name('variants.update');
    Route::delete('variants/{variant}', [ProductVariantController::class, 'destroy'])->name('variants.destroy');



    Route::resource('marchands', Controller::class);
    Route::get('/marchands', [Controller::class, 'marchand'])->name('marchand.index');

    Route::resource('whatsapp', WhatsappController::class);

    Route::resource('finances', \App\Http\Controllers\FinanceController::class);

});


// vendor Routes  middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/vendor/dashboard',  [VendorDashController::class, 'index'])->name('vendor-dashboard');
    Route::get('/vendor/articles', [VendorArticleController::class, 'index'])->name('mes-articles');
    Route::get('/vendor/articles/details/{id}', [VendorArticleController::class, 'show'])->name('mes-articles.details');
    Route::resource('vendors', \App\Http\Controllers\VendorAllController::class)->parameters(['orders' => 'commande']);
    Route::resource('portefeuille', \App\Http\Controllers\VendorFinanceController::class);
});
