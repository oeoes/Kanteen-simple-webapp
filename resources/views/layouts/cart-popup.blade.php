<!-- Modal Checkout -->
<div class="modal fade" id="cart-shop" tabindex="-1" role="dialog" aria-labelledby="webBasic" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="webBasic">Your Cart</h5>
            <button type="button" class="close" data-dismiss="modal" aria-lable="Close">
            <span aria-hidden="true"> &times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                    @if(Auth::check())
                        @if(Session::has('items'))
                        @for ($i=0; $i < count($cart['items']); $i++)
                            <tr>
                            <td>{{ $cart['items'][$i][0] }}</td>
                            <td>{{ $cart['harga'][$i][0] }}</td>
                            <td><a class="" href="{{ route('delete.item', ['id' => $i]) }}"><i class="fa fa-times"></i></a></td>
                            </tr>
                        @endfor
                            <tr>
                            <!-- Button modal checkout -->
                            <td colspan="3"><button data-toggle="modal" data-target="#checkout" class="btn btn-primary btn-block">CheckOut</button></td>
                            </tr>
                        @else
                            <div class="h3 text-center">Cart Empty</div>
                        @endif
                    @endif
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    </div> <!-- Akhir Modal Checkout -->

    <!-- Modal Confirm-->
    <div id="checkout" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <table class="table table-hover">
            @if(Session::has('items'))
                @for ($i=0; $i < count($cart['items']); $i++)
                <tr>
                    <td>{{ $cart['items'][$i][0] }}</td>
                    <td>x1</td>
                    <td>{{ $cart['harga'][$i][0] }}</td>
                </tr>
                @endfor
                <tr>
                    <td colspan="2"></td>
                    <td>Total <h2>Rp. {{ $total }}.00</h2></td>
                </tr>
            @endif
            </table>

            <hr>
        @if(Auth::check() && Session::has('items'))
            <form method="POST" action="{{ route('submit.order') }}">
            {{ csrf_field() }}
                <label>Pesan</label>
                <input name="total" type="hidden" value="{{ $total }}">
                <input type="hidden" name="seller_id" value="{{ $cart['seller'] }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <textarea name="pesan" class="form-control" required placeholder="Tulis pesan anda untuk penjual..."></textarea>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-block">Confirm</button>
            </div>
            </form>
        @endif
        </div>

    </div>
    </div> <!-- Akir modal -->