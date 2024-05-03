@extends('admin.layouts.app')

@section('content')
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @include('admin.message')
            <div class="card">
                <form action="" method="get">
                    <div class="card-header">
                      <div class="card-title">
                        <button type="button" onclick="window.location.href='{{route('orders.index')}}'" class="btn btn-default btn-sm">{{__('Reset')}}</button>
                      </div>
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" value="{{ Request::get('keyword') }}" name="keyword" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </div>
                              </div>
                        </div> 
                    </div>
                </form>
                <div class="card-body table-responsive p-0">								
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">Order#</th>
                                <th>Customer</th>
                                <th>E-mail</th>
                                <th>Address</th>
                                <th>Credit Card NO.</th>
                                <th>Caducidad</th>
                                <th>cvc</th>
                                <th>Monto</th>
                                <th>Status</th>
                                <th>Fecha de Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->isNotEmpty())
                                @foreach ($orders as $order)
                                     <tr>
                                <td><a href="{{route('orders.detail',[$order->id])}}">{{ $order->id }}</a></td>
                                
                                <td>{{ $order->cliente }}</td>
                                <td>{{ $order->correo }}</td>
                                <td>{{ $order->direccion }}</td>
                                <td>{{ $order->tarjeta}}</td>	
                                <td>{{ $order->caducidad}}</td>	
                                <td>{{ $order->cvc }}</td>		
                                <td>$ {{ $order->total }}</td>							
                                <td>
                                    @if($order->status == 'confirmado')
                                        <span class="badge bg-success">Confirmado</span>
                                    @elseif ($order->status == 'enviado')
                                        <span class="badge bg-info">Enviado</span>
                                    @else
                                    <span class="badge bg-info">Entregado</span>
                                    @endif
                                    {{-- @if ($order->status == 1)
                                          <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @else
                                    <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @endif --}}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}
                                </td>
                            </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>{{__('Records not found')}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>										
                </div>
                <div class="card-footer clearfix">
                    {{ $orders->links() }}
            {{--       <ul class="pagination pagination m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul> ---}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
      function deleteProduct(id){
        var url = '{{ route("products.delete","ID") }}';
        var newUrl = url.replace("ID",id);
        
        if (confirm("{{__('Are you sure you want to delete this?')}}")){
            $.ajax({
            url: newUrl,
            type: 'delete',
            data: {},
            dataType: 'json',
            success: function(response){
              if (response["status"] == true){
                window.location.href="{{ route('products.index') }}";   
              } else {
                window.location.href="{{ route('products.index') }}";
              }
            }
        });
      }
    }
    </script>
@endsection