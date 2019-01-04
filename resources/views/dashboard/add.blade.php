<div class="container">
	<div style="width: 70%; padding: 1rem 5rem; margin: 0 auto;" class="card shadow-sm">
		<form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="h1 text-center">Add Item</div>
			<div class="form-group">
                <label for="item">Nama Item</label>
                <input name="nama_produk" type="text" class="form-control" id="item" placeholder="Nama item...">
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input name="harga" type="number" class="form-control" id="harga" placeholder="Harga (Rp)">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" class="form-control">
                    <option value="food">Makanan</option>
                    <option value="beverage">Minuman</option>
                    <option value="dessert">Makanan Penutup</option>
                    <option value="snack">Makanan Ringan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <select id="stok" name="stok" class="form-control">
                    <option value="tersedia">Tersedia</option>
                    <option value="habis">Habis</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gambar">Upload gambar</label>
                <input class="form-control" id="gambar" type="file" name="gambar">
            </div>
            
			<input type="submit" class="btn btn-primary" value="Add">
		</form>
	</div>
</div>