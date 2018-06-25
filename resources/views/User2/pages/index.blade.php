@extends('user2/master')
@section('content')
             <div id="hot">
<!-- -->
                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Sản phẩm mới</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        
                    @foreach($product as $item)
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="{!!asset('resources/upload/'.$item->image)!!}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="{{url('user/obaju/img/product1_2.jpg')}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="{{url('user/obaju/img/product1.jpg')}}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html">{!!$item->name!!}</a></h3>
                                    <p class="price">{!!number_format($item->price,0,',','.')!!} VNDs</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                    @endforeach
                      
                    </div>
                    <!-- /.product-slider -->
                </div>

<!-- -->
                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Sảm phẩm HOT</h2>
                        </div>
                    </div>
                </div>

               <div class="container">
                    <div class="product-slider">
                        
                    @foreach($product as $item)
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="{!!asset('resources/upload/'.$item->image)!!}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="{{url('user/obaju/img/product1_2.jpg')}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="{{url('user/obaju/img/product1.jpg')}}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html">{!!$item->name!!}</a></h3>
                                    <p class="price">{!!number_format($item->price,0,',','.')!!} VNDs</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                    @endforeach
                      
                    </div>
                    <!-- /.product-slider -->
                </div>


                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

@endsection