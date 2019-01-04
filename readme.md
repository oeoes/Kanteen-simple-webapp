# Kan_teen Web App Using Laravel Framework
<p>
    Sesuai namanya, kan_teen merupakan aplikasi berbasis web yang bergerak dalam bidang
    layanan pengantaran dan penjualan makanan. Pengguna aplikasi ini ditargetkan khusus untuk kantin, baik yang ada dikampus ataupun instansi lainya. 
</p>

### Brief Explanation
<p>Untuk user, dalam aplikasi ini terdiri dari dua:</p>
<ol>
    <li>Visitor a.k. Buyer</li>
    <li>Seller</li>
</ol>

### Features
<ul>
    <li>Visitor / Buyer :</li>
    <ol>
        <li>Explore products by seller</li>
        <li>Add item(s) to Cart</li>
        <li>Checkout items and make an order</li>
        <li>Status tab (to see your order status process): {Queue, Cooking, Finish, Cancel}</li>
    </ol>
    <li>Seller:</li>
    <ol>
        <li>CRUD (Create, Read, Update, Delete) functionality</li>
        <li>Accept orders, or refuse them</li>
    </ol>
</ul>

### How To Use
* Clone project
* buat database dengan nama sesuai keinginan
* rename file _.env.example_ ke _.env_
* di dalam file .env, ganti line berikut dengan 
```php
DB_DATABASE=namaDbyangTelahDibuat
DB_USERNAME=usernameDb
DB_PASSWORD=passwordDb
```
* buka terminal atau cmd. Asumsi composer sudah terinstall, bila belum silahkan install terlebih dahulu
* masuk ke directory project kanteen ini, melalui terminal (exp: cd /user/kan_teen)
* ketik command _php artisan migrate_
* Welldone! Aplikasi siap digunakan
