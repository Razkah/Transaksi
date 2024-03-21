@extends('template.layout')

@push('style')
    <style>
    </style>
@endpush
@section('content')
<div class="container">
    <div class="d-flex gap-5">
        <div class="card" style="flex-basis: 70%">
            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
                <h5 class="card-title">Pilih Menu</h5>
                <ul class="list-group">
                    @foreach ($jenis as $j)
                    <li class="list-group-item">{{ $j->name }}
                        <ul class="list-group menu-item mb-4">
                         @foreach ($j->menu as $menu)
                        <li class="list-group-item" data-harga="{{$menu->harga}}" data-id="{{$menu->id}}">{{ $menu->nama_menu }}</li>
                        
                        @endforeach
    </ul>
</li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div class="card" style="flex-basis: 30%">
            <div class="card-body">
                <div class="card-title">
                    <tr>
                    <td class="right-column" style="text-align: left;">
                        <div class="item content">
                            <h5>Order</h5>
                            <ul class="ordered-list">
                            </ul>
                            <p class="right">total bayar: <span id="total">0</span></p>
                            <div class="right">
                                <button class="btn btn-primary" id="btn-bayar">bayar</button>
                            </div>
                        </div>
                        <br>
                        <div class="footer ">@coffeshop</div>
                    </td>
                </tr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(function(){
        //inisialisasi
        const orderedList = []
        let total = 0

        const sum = () => {
            return orderedList.reduce((accumulator, object) => {
                return accumulator + (object.harga * object.qty);
            }, 0)
        };

        //ubah di array
        const changeQty = (el,inc) => {
            console.log('orderedList');
            const id = $(el).closest('li')[0].dataset.id;
            const index = orderedList.findIndex(list => list.menu_id == id)

            orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc
        

            //ubah qty dan subtotal
            const txt_subtotal =$(el).closest('li').find('.subtotal')[0];
            const txt_qty =$(el).closest('li').find('.qty-item')[0]
   
            txt_qty.value = parseInt(txt_qty.value) == 1  && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
            txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;


            // ubah jumlah  total
            $('#total').html(sum())
        }
        
        
        $(".menu-item li").click(function(){
            //mengambil data
            const menu_clicked = $(this).text();
            const data = $(this)[0].dataset;
            const harga = parseFloat(data.harga);
            const id = parseInt(data.id)

            if(orderedList.every(list => list.menu_id !== id)){
                let dataN = {'menu_id': id, 'menu' : menu_clicked, 'harga': harga, 'qty': 1}
                orderedList.push(dataN);
                let listOrder = ` <li data-id="${id}"><h3 class='fs-6'>${menu_clicked}</h3>`
                    listOrder += `Sub Total : Rp.` +harga 
                    listOrder += `<button class='btn btn-primary remove-item btn-sm mr-7'>hapus</button>
                                <button class="btn-dec btn-sm"> - </button>`
                    listOrder += `<input class="qty-item"
                                    type="number"   
                                    value="1"
                                    style="width:30px"
                                    readonly
                                    /> 
                                <button class="btn-inc btn-sm" >+</button><h2>
                                <span class="subtotal fs-6">${harga * 1}</span>
                                </li>`
                $('.ordered-list').append(listOrder);
            }
            $('#total').html(sum());       
     });
        $('.ordered-list').on('click', '.btn-dec', function(){changeQty(this, -1)})

        $('.ordered-list').on('click', '.btn-inc', function(){changeQty(this, 1)})

        $('.ordered-list').on('click', '.remove-item', function(){
            
        const item = $(this).closest('li')[0];
        let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id))
        orderedList.splice(index, 1)

        $(item).remove();
        $('#total').html(sum())
     })

         $('#btn-bayar').on('click', function(){

            $.ajax({
                    url: "{{ route('transaksi.store')}}",
                    method: "post",

                    data: {
                        "_token": "{{ csrf_token() }}",
                        orderedList: orderedList,
                        total: sum()
                    },
                    success: function(data){
                        console.log(data)

                        Swal.fire({
                            title: data.message,
                            showDenyButton: true,
                            confirmButtonText: "Cetak Nota",
                            denyButtonText: 'Ok'

                        }).then((result)=>{
                            if (result.isConfirmed){
                                window.open("{{ url('nota')}}/"+data.noTrans)    
                            } else if (result.isDenied){
                                location.reload
                            }
                        });
                    },
                });
        })
        
              
    });
            
        

</script>
@endpush
