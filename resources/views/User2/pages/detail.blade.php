@extends('user2/master')
@section('content')


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Trang chủ</a>
                        </li>
                        <li><a href="#">Thiết bị</a>
                        </li>
                        <li><a href="#">Sản phẩm</a>
                        </li>
                        <li></li>
                    </ul>

                </div>

                <div class="col-md-3">

                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body"> 
                            <?php 
                                $active='';
                            ?>
                            @foreach($menu_cate as $item_menu_cate)
                                <?php
                                    if($item_menu_cate->id==$product_detail->cate_id) 
                                        $active='active';
                                    else
                                        $active='';
                                ?>
                               
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="{!! $active !!}">
                                   
                                    <a href="category.html">{!! $item_menu_cate->name !!}<span class="badge pull-right"></span></a>
                                    <ul>
                                        <!--
                                        <li><a href="category.html">T-shirts</a>
                                        </li>
                                        <li><a href="category.html">Skirts</a>
                                        </li>
                                        <li><a href="category.html">Pants</a>
                                        </li>
                                        <li><a href="category.html">Accessories</a>
                                        </li>
                                        -->
                                    </ul>
                                </li>
                               
                            </ul>
                            @endforeach
                        </div>
                    </div>
                   

                    <!-- *** MENUS AND FILTERS END *** -->
                    <!-- Quang Cao 
                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                    // Quang Cao -->
                </div>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="{!!asset('resources/upload/'.$product_detail->image)!!}" alt="" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center">{!!$product_detail->name!!}</h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">xem chi tiết bên dưới</a>
                                </p>
                                <p class="price">{!!number_format($product_detail->price,0,',','.')!!} VND</p>

                                <p class="text-center buttons">
                                    <a href="{!!url('mua-hang',[$product_detail->id])!!}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                    <a href="{!!url('mua-hang',[$product_detail->id])!!}" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                @foreach($image as $item_image)
                                <div class="col-xs-4">
                                    <a href="{!!asset('resources/upload/detail/'.$item_image->image)!!}" class="thumb">
                                        <img src="{!!asset('resources/upload/detail/'.$item_image->image)!!}" alt="" class="img-responsive">
                                    </a>
                                </div>
                               @endforeach
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        {!!$product_detail->content!!}
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Sản phẩm cùng loại</h3>
                            </div>
                        </div>

                        @foreach($product_cate as $item_product_cate)
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{!!url('chi-tiet-san-pham',[$item_product_cate->id])!!}">
                                                <img src="{!!asset('resources/upload/'.$item_product_cate->image)!!}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{!!url('chi-tiet-san-pham',[$item_product_cate->id])!!}">
                                                <img src="{!!asset('resources/upload/'.$item_product_cate->image)!!}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{!!url('chi-tiet-san-pham',[$item_product_cate->id])!!}" class="invisible">
                                    <img src="{!!asset('resources/upload/'.$item_product_cate->image)!!}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>{!!$item_product_cate->name!!}</h3>
                                    <p class="price">{!!number_format($item_product_cate->price,0,',','.')!!} VND</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach
                        

                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Sản phẩm gợi ý</h3>
                            </div>
                        </div>

                         @foreach($product_cate as $item_product_cate)
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{!!url('chi-tiet-san-pham',[$item_product_cate->id])!!}">
                                                <img src="{!!asset('resources/upload/'.$item_product_cate->image)!!}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{!!url('chi-tiet-san-pham',[$item_product_cate->id])!!}">
                                                <img src="{!!asset('resources/upload/'.$item_product_cate->image)!!}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{!!url('chi-tiet-san-pham',[$item_product_cate->id])!!}" class="invisible">
                                    <img src="{!!asset('resources/upload/'.$item_product_cate->image)!!}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>{!!$item_product_cate->name!!}</h3>
                                    <p class="price">{!!number_format($item_product_cate->price,0,',','.')!!} VND</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach

                        

                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


     

    </div>
    <!-- /#all -->





@endsection