@extends('user2/master')
@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="">Trang chủ</a>
                        </li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="">

                            <h1>Giỏ hàng</h1>
                            <p class="text-muted">Có (3) sản phẩm</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Giảm giá</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form>
                                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" ></input>
                                        @foreach($content as $item)
                                        <tr>
                                            <td>
                                                <a href="#">

                                                    <img src="{!! asset('resources/upload/'.$item->options->img) !!}" alt="">
                                                </a>
                                            </td>
                                            <td><a href="#">{!!$item->name!!}</a>
                                            </td>
                                            <td>
                                                <input type="number" value='{!!$item->qty!!}' class="form-control qty" />
                                            </td>
                                            <td>{!!number_format($item->price,0,',','.')!!} VND</td>
                                            <td>$0.00</td>
                                            <td>{!!number_format($item->price*$item->qty,0,',','.')!!} VND</td>
                                           
                                            <td><a href="" class="updatecart" id="{!!$item->rowId!!}"><i class="fa fa-refresh"></i></a><a href="{!!url('xoa-san-pham',$item->rowId) !!}"><i class="fa fa-trash-o"></i></a>
                                            </td>

                                        </tr>
                                        @endforeach
                                        </form>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Tổng cộng</th>
                                            <th colspan="2">{!! number_format($subtotal,0,'.','.')!!} VND</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Tiếp tục mua hàng</a>
                                </div>
                                <div class="pull-right">
                                    <!--
                                    <button class="btn btn-default"><i class="fa fa-refresh"></i> Cập nhật giỏ hàng</button>
                                    <button type="submit" class="btn btn-primary">Thanh toán <i class="fa fa-chevron-right"></i></button> -->
                                    <a href="{!!url('dat-hang')!!}" class="btn btn-primary">Mua hàng<i class="fa fa-chevron-right"></i> </a>
                                        
                                    
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->


                    <div class="row same-height-row">
                        <!-- Goi y san pham
                        -->
                    </div>


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Thông tin đơn hàng</h3>
                        </div>
                        <p class="text-muted">Phí vận chuyển có thể thay đổi tùy theo khu vực</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Tạm tính</td>
                                        <th>{!!number_format($subtotal,0,'.','.')!!} VND</th>
                                    </tr>
                                    <tr>
                                        <td>Phí giao hàng</td>
                                        <th>0.00VND</th>
                                    </tr>
                                    <tr>
                                        <td>Thuế VAT</td>
                                        <th>{!!number_format($tax,0,'.','.')!!} VND</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Tổng cộng</td>
                                        <th>{!!number_format($total,0,'.','.')!!}  VND</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="box">
                        <div class="box-header">
                            <h4>Mã giảm giá</h4>
                        </div>
                        <p class="text-muted">Nếu bạn có mã giả giá, vui lòng nhập vào đây</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

					<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				    </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
 
    </div>
    <!-- /#all -->


 


@endsection