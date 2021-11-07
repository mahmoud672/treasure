<?php

Route::group(['middleware'=>'auth','prefix'=>'treasure-dashboard','namespace'=>'SEO'],function (){

    //----------------------------------------------------------------------\\
    //----------------------------- seo routes ------------------------------\\

    Route::get('/seo/open-graph','OpenGraphController@index');
    Route::get('/seo/open-graph/edit/{id}','OpenGraphController@edit');
    Route::put('/seo/open-graph/edit/{id}','OpenGraphController@update');

    Route::get('/seo/website-pages','PagesController@index');
    Route::get('/seo/website-pages/edit/{id}','PagesController@edit');
    Route::put('/seo/website-pages/edit/{id}','PagesController@update');

    //-------------------- -------------------------------- --------------------\\
    //---------------------------------------------------------------------------\\
});
