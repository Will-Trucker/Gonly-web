@extends('admin.layouts.app')

@section('content')
    				<!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid my-2">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Order: #{{$orders->id}}</h1>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="{{route('orders.index')}}" class="btn btn-primary">Back</a>
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
                                                <h1 class="h5 mb-3">Shipping Address</h1>
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
                                                    <b>Order ID:</b> {{$orders->id}}<br>
                                                    <b>Total: $</b> {{$orders->total}}<br>
                                                    <b>Status:</b>
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
                                                        <th>Product</th>
                                                        <th width="100">Price</th>
                                                        <th width="100">Qty</th>
                                                        <th width="100">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orderItems as $item)
                                                    <tr>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->price}}</td>
                                                        <td>{{$item->qty}}</td>
                                                        <td>${{$item->total}}</td>
                                                    </tr>
                                                    @endforeach
                                                    {{-- <tr>
                                                        <td>Call of Duty</td>
                                                        <td>$10.00</td>
                                                        <td>2</td>
                                                        <td>$20.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Call of Duty</td>
                                                        <td>$10.00</td>
                                                        <td>2</td>
                                                        <td>$20.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Call of Duty</td>
                                                        <td>$10.00</td>
                                                        <td>2</td>
                                                        <td>$20.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Call of Duty</td>
                                                        <td>$10.00</td>
                                                        <td>2</td>
                                                        <td>$20.00</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th colspan="3" class="text-right">Subtotal:</th>
                                                        <td>${{$orders->total}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="3" class="text-right">Shipping:</th>
                                                        <td>${{$orders->tax}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Grand Total:</th>
                                                        <td>$85.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Order Status</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Pending</option>
                                                    <option value="">Shipped</option>
                                                    <option value="">Delivered</option>
                                                    <option value="">Cancelled</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Send Inovice Email</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Customer</option>
                                                    <option value="">Admin</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary">Send</button>
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
