<div class="album py-5">
    <div class="container">

      <div class="row">
      @if(count($snack)) 
       @foreach ($snack as $sn => $s)

          <div class="col-md-3 product-list">
            <div class="card mb-4 shadow-sm">
              <img class="card-img-top" src="{{ asset('images/products\/') }}{{ $s->gambar }}">
              <div class="card-body">
                <div class="row">
                  <div class="col-7">
                    <div class="card-text">{{ $s->nama_produk }}</div>
                  <div class="h4">{{ $s->harga }}</div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    @if($s->stok == 'habis')
                      <a href="" class="btn btn-sm btn-outline-secondary">Habis</a>
                    @else
                      <a href="{{ route('keep.product', ['id_produk' => $s->id, 'nama_produk' => $s->nama_produk, 'harga' => $s->harga, 'seller' => $s->seller_id]) }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-cart-plus"></i></a>
                    @endif
                    </div>
                  </div>
                  </div>
                  <div class="col-5">
                    <div class="h6 text-center">Stok</div>
                    @if($s->stok == 'tersedia')
                      <div class="h6 text-center text-success">{{ ucwords($s->stok) }}</div>
                    @else
                      <div class="h6 text-center text-danger">{{ ucwords($s->stok) }}</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

        @endforeach
        @else
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="blank-page">
              Yha, snack sedang kosong <br> 
              <button onclick="window.history.back()" class="btn btn-secondary" style="width: 50%">Cek yang lain.</button>
            </div>
          </div>
          <div class="col-md-3"></div>
        @endif
        
      </div>
    </div>
</div>