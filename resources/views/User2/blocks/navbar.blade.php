  <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                    <img src="{{url('user/obaju/img/logo2.png')}}" alt="Obaju logo" class="hidden-xs">
                    <img src="{{url('user/obaju/img/logo-small2.png')}}" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">
                <?php 
                        $menu_level1=DB::table('cates')->where('parent_id',0)->get();
                        $active="active";
                ?>
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="{!!url('/') !!}">Trang chủ</a>
                    </li>
                    @foreach($menu_level1 as $item_level1)
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">{!!$item_level1->name!!} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <?php
                                        $menu_level2=DB::table('cates')->where('parent_id',$item_level1->id)->get();
                                    ?>
                                    <div class="row">
                                        @foreach($menu_level2 as $item_level2)
                                        <div class="col-sm-3">
                                            <h5>{!!$item_level2->name!!}</h5>
                                            <!--
                                            <ul>
                                                <li><a href="category.html">dang mục sản phẩm 1</a>
                                                </li>
                                                <li><a href="category.html">dang mục sản phẩm 2</a>
                                                </li>
                                                <li><a href="category.html">dang mục sản phẩm 3</a>
                                                </li>
                                                <li><a href="category.html">dang mục sản phẩm 4</a>
                                                </li>
                                            </ul>
                                            -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    @endforeach
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="{{url('user/obaju/img/bg2.jpg')}}" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{url('user/obaju/img/bg2.jpg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{url('user/obaju/img/bg3.jpg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{url('user/obaju/img/bg3.jpg')}}" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>


        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->
