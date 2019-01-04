
@if(count($order))
  @foreach($order as $o => $ord)
      <div class="col-md-3">
        <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <div class="row">
              <div class="col-7">
                <div class="card-text">{{ $ord->buyer }}</div>
              <div class="h4">{{ $ord->total }}</div>
              </div>
              <div class="col-5">
                <div class="h6 text-center">Total Item</div>
                <div class="h3 text-center">4</div>
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-4">
                <button data-toggle="modal" data-target="#view{{ $o }}" style="border-radius: 0" class="btn btn-secondary btn-block">View</button>
              </div>
              <div class="col-8">
                @if ($ord->status == 'queue')
                  <a href="{{ route('cook', ['id' => $ord->id]) }}" style="border-radius: 0" class="btn btn-primary btn-block">Cook</a>
                @elseif ($ord->status == 'cooking')
                  <a href="{{ route('finish', ['id' => $ord->id]) }}" style="border-radius: 0" class="btn btn-success btn-block">Finish</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal view-->
        <div id="view{{ $o }}" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Order</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <table class="table table-hover">
                  <tr>
                    <th>Dari</th>
                    <td colspan="2">{{ $ord->buyer }}</td>
                  </tr>
                  <tr>
                  <th>Item (s)</th>
                    <td>{{ $ord->items }}</td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td>Total <h2>Rp. {{ $ord->total }}</h2></td>
                  </tr>
                </table>

                <hr>

                  <div class="form-group">
                    <label>Pesan</label>
                    <textarea class="form-control" disabled="true">{{ $ord->pesan }}</textarea>
                  </div>

                  <div class="form-group">
                    <a href="{{ route('tolak.pesanan', ['id' => $ord->id]) }}" class="btn btn-danger btn-block">Tolak Pesanan</a>
                  </div>
              </div>
            </div>

          </div>
        </div> <!-- Akir modal -->
  @endforeach
@else
  <div class="col-3"></div>
  <div class="col-6">
    <div class="blank-page">
      Order Kosong <br> <i class="fa fa-frown"></i>
    </div>
  </div>
  <div class="col-3"></div>
@endif