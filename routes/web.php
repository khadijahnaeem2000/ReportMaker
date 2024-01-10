<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportModule\TemplatesController;

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

Route::get('/', function () {
    return view('test');
});


Route::get('IdCard/{folderid}/{id?}',[TemplatesController::class, 'IdCard'])->name("IDCard");
Route::get('template/Delete/{id}',[TemplatesController::class, 'deletetemplate'])->name("TemplateDelete");
Route::get('/TemplateFolder',[TemplatesController::class, 'TemplateFolders'])->name("folders");
Route::get('/Templates/{id}',[TemplatesController::class, 'Templates'])->name("templates");

Route::get('/TemplateFolderCreate',[TemplatesController::class, 'TemplateFoldersCreate'])->name("foldercreate");
Route::post('/TemplateFolderStore',[TemplatesController::class, 'storeTemplate'])->name('folderstore');
Route::get('/viewTemplate/{id}/{templateid}',[TemplatesController::class, 'viewtemplate'])->name("viewtemplate");

Route::get('/pdfdownload', [TemplatesController::class, 'downloadPDF']);
Route::post('store', [TemplatesController::class, 'store'])->name("store");
