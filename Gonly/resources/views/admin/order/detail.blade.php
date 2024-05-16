@extends('admin.layouts.app')

@section('content')
    				<!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid my-2">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Orden: #{{$orders->id}}</h1>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="{{route('orders.index')}}" class="btn btn-primary">Regresar</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header pt-3">
                                            <div class="row invoice-info">
                                                <div class="col-sm-4 invoice-col">
                                                <h1 class="h5 mb-3">Detalle de Orden</h1>
                                                <address>
                                                    <strong>{{$orders->cliente}}</strong><br>
                                                    {{$orders->direccion}}<br>
                                                    {{-- San Francisco, CA 94107<br>
                                                    Phone: (804) 123-5432<br> --}}
                                                    {{$orders->correo}}
                                                </address>
                                                </div>



                                                <div class="col-sm-4 invoice-col">
                                                    {{-- <b>Invoice #007612</b><br> --}}
                                                    <br>
                                                    <b>Order #:</b> {{$orders->id}}<br>
                                                    <b>Total: $</b> {{$orders->total}}<br>
                                                    <b>Estado:</b>
                                                    @if($orders->status == 'confirmado')
                                                        <span class="text-danger">Confirmado</span>
                                                    @elseif ($order->status == 'enviado')
                                                        <span class="text-info">Enviado</span>
                                                    @else
                                                    <span class="text-success">Entregado</span>
                                                    @endif
                                                    {{-- <span class="text-success">Delivered</span> --}}
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th># Producto</th>
                                                        <th width="100">Precio</th>
                                                        <th width="100">Cantidad</th>
                                                        <th width="100">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orderItems as $item)
                                                    <tr>


                                                        <td>{{$item->name}}</td>
                                                        <td>${{$item->price}}</td>
                                                        <td>{{$item->qty}}</td>
                                                        <td>${{$item->total}}</td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="3" class="text-right">Subtotal:</th>
                                                        <td>${{$orders->subtotal}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="3" class="text-right">Envio:</th>
                                                        <td>${{$orders->tax}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Total a pagar:</th>
                                                        <td>${{$orders->total}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                      <form action="" method="post" name="changeOrderStatusForm" id="changeOrderStatusForm"></form>
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Estado de Orden</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="confirmado"{{($orders->status == 'confirmado') ? 'selected' : ''}}>Confirmado</option>
                                                    <option value="enviado"{{($orders->status == 'enviado') ? 'selected' : ''}}>Enviado</option>
                                                    <option value="entregado"{{($orders->status == 'entregado') ? 'selected' : ''}}>Entregado</option>
                                                    <option value="cancelado"{{($orders->status == 'cancelado') ? 'selected' : ''}}>Cancelado</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Fecha de Envio</label>
                                                <input type="text" name="shipped_date" id="shipped_date" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Enviar Notificacion</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Cliente</option>
                                                    <option value="">Admin</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary">Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.content -->
@endsection

@section('customJs')
   <script>
       $(document).ready(function(){
            $('#shipped_date').datetimepicker({
                // options here
                format:'Y-m-d H:i:s',
            });
        });

        $('#changeOrderStatusForm').submit(function(){
            event.preventDefault();

            $.ajax({
                url: '',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response){

                }
            });
        });
   </script>
@endsection
