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

//admin route
Route::group(['prefix' => 'admin'], function (){

    Route::get('peminjaman','AdminController@peminjaman')->name('peminjaman');
    Route::post('detail_peminjaman/{id}', 'AdminController@peminjamanD')->name('peminjamanD');

    Route::get('dashboard', [
        'uses' => 'AdminController@index',
        'as' => 'admin.dashboard'
    ]);

    Route::group(['prefix' => 'ruang'], function (){
        Route::get('/',[
            'uses' => 'AdminController@Ruang',
            'as' => 'admin.ruang'
        ]);
        Route::get('approval/{id}/{status}',[
            'uses' => 'AdminController@approvalRuang',
            'as' => 'admin.ruang.approval'
        ]);
        Route::get('{id}/detail',[
            'uses' => 'AdminController@detailRuang',
            'as' => 'admin.ruang.detail'
        ]);
    });

    Route::group(['prefix' => 'mobil'], function (){
        Route::get('/',[
            'uses' => 'AdminController@Mobil',
            'as' => 'admin.mobil'
        ]);
        Route::get('approval/{id}/{status}',[
            'uses' => 'AdminController@approvalMobil',
            'as' => 'admin.mobil.approval'
        ]);
        Route::get('{id}/detail',[
            'uses' => 'AdminController@detailMobil',
            'as' => 'admin.mobil.detail'
        ]);
    });

    Route::group(['prefix' => 'rumah'], function (){
        Route::get('/',[
            'uses' => 'AdminController@Rumah',
            'as' => 'admin.rumah'
        ]);
        Route::get('approval/{id}/{status}',[
            'uses' => 'AdminController@approvalRumah',
            'as' => 'admin.rumah.approval'
        ]);
        Route::get('{id}/detail',[
            'uses' => 'AdminController@detailRumah',
            'as' => 'admin.rumah.detail'
        ]);
    });

    Route::group(['prefix' => 'komplain'], function (){
        Route::get('/',[
            'uses' => 'AdminController@komplain',
            'as' => 'admin.komplain'
        ]);
        Route::get('{id}/detail',[
            'uses' => 'AdminController@detailkomplain',
            'as' => 'admin.komplain.detail'
        ]);
    });

//    Route::group(['prefix' => 'barang'], function (){
//        Route::get('/',[
//            'uses' => 'AdminController@barang',
//            'as' => 'admin.barang'
//        ]);
//        Route::get('tambah',[
//            'uses' => 'AdminController@tambahbarang',
//            'as' => 'admin.barang.tambah'
//        ]);
//        Route::get('tambah',[
//            'uses' => 'AdminController@addbarang',
//            'as' => 'admin.barang.submit'
//        ]);
//        Route::get('{id}/updatebarang',[
//            'uses' => 'AdminController@updatebarang',
//            'as' => 'admin.barang.update'
//        ]);
//        Route::get('{id}/aksibarang',[
//            'uses' => 'AdminController@hapusbarang',
//            'as' => 'admin.barang.hapus'
//        ]);
//    });
    Route::get('barang', 'AdminController@barang')->name('barang');
    Route::get('barang/{id}', 'AdminController@delbarang')->name('delbarang');
    Route::get('tambah_barang', 'AdminController@tambahbarang')->name('tambarang');
    Route::post('tambah_barang','AdminController@addbarang')->name('addbarang');
    Route::get('update_barang/{id}', 'AdminController@updatebarang')->name('updatebarang');
    Route::match(['get','post'],'update_barang/{id}', 'AdminController@barangU')->name('barangU');
    Route::get('user', 'AdminController@user')->name('user');
    Route::get('user/{id}', 'AdminController@deluser')->name('deluser');
    Route::get('tambah_user', 'AdminController@userT')->name('userT');
    Route::post('tambah_user','AdminController@adduser')->name('adduser');
});


//user route
Route::get('/user_dashboard', 'UserController@index')->name('user.dashboard');
Route::get('/listpinjam', 'UserController@list')->name('listpinjam');
Route::get('/detailpinjam', 'UserController@listD')->name('detailpinjam');
Route::group(['prefix' => 'komplain'], function (){

    Route::get('info', [
        'uses' => 'UserController@infokomplain',
        'as' => 'info.komplain'
    ]);

    Route::get('ajukan', [
        'uses' => 'UserController@komplain',
        'as' => 'ajukan.komplain'
    ]);

    Route::post('ajukan', [
        'uses' => 'UserController@addkomplain',
        'as' => 'ajukan.komplain.submit'
    ]);

});

Route::get('/ruang', 'UserController@ruang')->name('ruang');
Route::post('/ruang', 'UserController@addruang')->name('addruang');
Route::get('list_ruang', 'UserController@list_ruang')->name('listruang');
Route::get('/mobil','UserController@mobil')->name('mobil');
Route::post('/mobil','UserController@addmobil')->name('addmobil');
Route::get('list_mobil', 'UserController@list_mobil')->name('listmobil');
Route::get('/vidcon', 'UserController@vidcon')->name('vidcon');
Route::get('/rumah','UserController@rumah')->name('rumah');
Route::post('/rumah','UserController@addrumah')->name('addrumah');
Route::get('list_rumah', 'UserController@list_rumah')->name('listrumah');
Route::get('/ajukanpinjam', 'UserController@ajukan')->name('ajukanpinjam');
Route::get('barang', 'UserController@barang')->name('baranguser');


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
/*pindahan*/
/*Route::get('/', function () {return view('Login');});*/
/*Route::get('/register', function () {return view('auth.register');})->name('register');*/


//Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function(){
//    Route::resource('/', 'AdminController');
//});
