@if(count($product))
  @foreach ($product as $pr => $p)

  <div class="col-md-3">
    <div class="card mb-4 shadow-sm product-list">
      <img class="card-img-top" src="{{ asset('images/products\/') }}{{ $p->gambar }}">
      <div class="card-body">
        <div class="row">
          <div class="col-7">
            <div class="card-text">{{ $p->nama_produk }}</div>
          <div class="h4">Rp {{ $p->harga }}</div>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button data-toggle="modal" data-target="#delete-item{{ $pr }}" type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-trash-o"></i></button>
              <button data-toggle="modal" data-target="#edit-item{{ $pr }}" type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-gears"></i></button>
            </div>
          </div>
          </div>
          <div class="col-5">
            <div class="h6 text-center">Stok</div>
            @if($p->stok == 'tersedia')
              <div class="h6 text-center text-success">{{ ucwords($p->stok) }}</div>
            @else
              <div class="h6 text-center text-danger">{{ ucwords($p->stok) }}</div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Delete Item -->
  <div class="modal fade" id="delete-item{{ $pr }}" tabindex="-1" role="dialog" aria-labelledby="delete-item" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="webBasic">Delete Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-lable="Close">
            <span aria-hidden="true"> &times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="h3 text-center">Are you sure to delete this item?</div>
        </div>
        <div class="modal-footer">
          <a href="{{ route('delete.product', ['id_produk' => $p->id]) }}" class="btn btn-danger btn-block">Yes</a>
        </div>
      </div>
    </div>
  </div> <!-- Akhir Modal Delete -->

  <!-- Modal Edit Item -->
  <div class="modal fade" id="edit-item{{ $pr }}" tabindex="-1" role="dialog" aria-labelledby="edit-item" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="webBasic">Update Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-lable="Close">
            <span aria-hidden="true"> &times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('update.product', ['id' => $p->id]) }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="item">Nama Item</label>
                    <input type="text" name="nama_produk" value="{{ $p->nama_produk }}" class="form-control" id="item" placeholder="Nama item...">
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" value="{{ $p->harga }}" class="form-control" id="harga" placeholder="Harga (Rp)">
                </div>

                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  {{ Form::select('kategori', ['food' => 'Makanan', 'beverage' => 'Minuman', 'dessert' => 'Makanan Penutup', 'snack' => 'Makanan Ringan'], $p->kategori, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    {{ Form::select('stok', ['tersedia' => 'Tersedia', 'habis' => 'Habis'], $p->stok, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary btn-block">Update</button>
            </div>
            </form>
      </div>
    </div>
  </div> <!-- Akhir Modal Edit -->

  @endforeach
@else
  <div class="col-3"></div>
  <div class="col-6">
    <div class="blank-page">
      Siap berjualan <br> <i class="fa fa-smile"></i> <br> <a style="width: 50%" href="{{ route('add.product') }}" class="btn btn-primary">Ya!</a>
    </div>
  </div>
  <div class="col-3"></div>
@endif