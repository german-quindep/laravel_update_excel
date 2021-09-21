<?php
//RUTAS PARA SUBIR EXCEL
Route::get('/', 'UploadExcel@index')->name('index');
Route::post('upload', 'UploadExcel@uploadFile')->name('uploadFile');

