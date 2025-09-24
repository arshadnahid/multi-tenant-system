<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Admin\HouseOwnerController;
use App\Http\Controllers\Admin\TenantController as AdminTenantController;
use App\Http\Controllers\Owner\FlatController;
use App\Http\Controllers\Owner\BillCategoryController;
use App\Http\Controllers\Owner\BillController;
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
Route::get('my-logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Auth::routes(['register' => false]);
Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin routes (session-authenticated)
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('owners', HouseOwnerController::class)->names('owners');

        Route::get('tenants', [AdminTenantController::class, 'index'])->name('tenants.index');
        Route::post('tenants', [AdminTenantController::class, 'store'])->name('tenants.store');
        Route::get('tenants/{tenant}', [AdminTenantController::class, 'show'])->name('tenants.show');
        Route::delete('tenants/{tenant}', [AdminTenantController::class, 'destroy'])->name('tenants.destroy');
    });

    // House Owner routes (session-authenticated)
    Route::middleware('role:owner')->prefix('owner')->name('owner.')->group(function () {
        Route::get('flats', [FlatController::class, 'index'])->name('flats.index');
        Route::post('flats', [FlatController::class, 'store'])->name('flats.store');
        Route::put('flats/{flat}', [FlatController::class, 'update'])->name('flats.update');
        Route::delete('flats/{flat}', [FlatController::class, 'destroy'])->name('flats.destroy');

        Route::get('bill-categories', [BillCategoryController::class, 'index'])->name('bill_categories.index');
        Route::post('bill-categories', [BillCategoryController::class, 'store'])->name('bill_categories.store');
        Route::put('bill-categories/{billCategory}', [BillCategoryController::class, 'update'])->name('bill_categories.update');
        Route::delete('bill-categories/{billCategory}', [BillCategoryController::class, 'destroy'])->name('bill_categories.destroy');

        Route::get('bills', [BillController::class, 'index'])->name('bills.index');
        Route::post('bills', [BillController::class, 'store'])->name('bills.store');
        Route::post('bills/{bill}/mark-paid', [BillController::class, 'markPaid'])->name('bills.mark_paid');
    });
});

