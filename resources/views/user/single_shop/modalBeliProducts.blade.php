<!-- Modal -->
<div class="modal fade" id="modalBeli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pembelian {{$DataProduk->name}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/transaksi/buy" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row ">
                <input name="user_id" type="hidden" class="form-control col m-2" value="{{auth()->user()->id}}">
                <input name="produk_id" type="hidden" class="form-control col m-2" value="{{$DataProduk->id}}" readonly>
                <input name="harga" type="hidden" class="form-control col m-2" value="{{$DataProduk->harga}}" id="harga" oninput="hitung()" readonly>
            </div>
            <label for="">Jumlah</label>
            <input type="number" name="qty" class="form-control" id="qty" oninput="hitung()">
            @error('qty')
                <span class="text-danger" style="font-size:1rem;"><i>*{{ $message }}</i></span>
            @enderror
            <label for="" class="mt-2">Deskripsi Pesanan</label>
            <textarea type="text" name="deskripsi" class="form-control" style="height: 10em" placeholder="Masukan deskripsi mengenai pesanan anda"></textarea>
            @error('deskripsi')
                <span class="text-danger" style="font-size:1rem;"><i>*{{ $message }}</i></span>
            @enderror
            @if ($transaksi->sum('promosi_id') < 1)
                <label for="" class="mt-2">Diskon</label>
                <div class="row" style="border: 1px solid green; border-radius: 5px; margin: 2px">
                    <div class="col-8">
                        Anda mempunyai Diskon {{$getDiskon->sum('diskon')}}%
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            @foreach ($getDiskon as $diskon)
                                <input name="promosi_id" class="form-check-input" type="hidden" value="{{$diskon->id}}">
                                <input name="diskon" class="form-check-input" type="checkbox" value="{{$diskon->diskon}}" id="qty_diskon" onclick="hitung()">
                            @endforeach
                            <label class="form-check-label" for="diskon">
                                Pakai
                            </label>
                        </div>
                    </div>
                </div>
            @else
                <input name="diskon" class="form-check-input" type="hidden" value="0" id="qty_diskon" onclick="hitung()">
            @endif

          
            @error('deskripsi')
                <span class="text-danger" style="font-size:1rem;"><i>*{{ $message }}</i></span>
            @enderror
            <hr>
            <p >SubTotal : <span id="subtotal"></span></p>
            <input class="form-control" name="subtotal" type="hidden" id="subtotalInput">
            <p >Diskon : <span id="diskon"></span></p>
            <input class="form-control" name="potongan" type="hidden" id="diskonInput">
            <p >Total : <span id="total"></span></p>
            <input class="form-control" name="total" type="hidden" id="totalInput">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Buy</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function hitung() {
        // Ambil nilai dari input harga, input qty, dan checkbox diskon
        var harga = parseFloat(document.getElementById("harga").value);
        var qty = parseFloat(document.getElementById("qty").value);
        var useDiskon = document.getElementById("qty_diskon").checked;

        // Hitung subtotal
        var subtotal = harga * qty;

        // Hitung potongan diskon
        var potongan = 0;
        var promosi_id = ""; // Initialize promosi_id as an empty string
        if (useDiskon) {
            var diskonPercentage = parseFloat(document.getElementById("qty_diskon").value);
            potongan = (subtotal * diskonPercentage) / 100;

            // If the diskon checkbox is checked, and there are no previous discounts applied
            @if ($transaksi->sum('promosi_id') < 1 && $transaksi->sum('promosi_id' == 0))
                promosi_id = {{$diskon->id}}; // Set promosi_id based on the selected diskon
            @endif
        } else {
            // If the diskon checkbox is not checked, and there are no previous discounts applied
            @if ($transaksi->sum('promosi_id') < 1 && $transaksi->sum('promosi_id' == 0))
                promosi_id = ""; // Set promosi_id to 0 indicating no discount
            @endif
        }


        // Hitung total setelah diskon
        var total = subtotal - potongan;

        // Tampilkan hasil di elemen dengan id "subtotal", "diskon", dan "total"
        document.getElementById("subtotal").innerText = subtotal;
        document.getElementById("diskon").innerText = potongan;
        document.getElementById("total").innerText = total;

        // Isi nilai subtotal ke input
        document.getElementById("subtotalInput").value = subtotal;
        document.getElementById("diskonInput").value = potongan;
        document.getElementById("totalInput").value = total;

        // Set the value of promosi_id in the form
        document.getElementsByName("promosi_id")[0].value = promosi_id;
    }
</script>


