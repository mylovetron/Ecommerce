<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="index.html" class="act">Trang chủ</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<?php 
											$menu_level1=DB::table('cates')->where('parent_id',0)->get();
									?>
									@foreach($menu_level1 as $item_level1)
									<div class="col-sm-3">
									
										<ul class="multi-column-dropdown">
											<h6>{!!$item_level1->name!!}</h6>
											<?php
												$menu_level2=DB::table('cates')->where('parent_id',$item_level1->id)->get();
											?>
											@foreach($menu_level2 as $item_level2)
											<li><a href="products.html">{!!$item_level2->name!!}</a></li>
											@endforeach
										</ul>
										
									</div>
									@endforeach

									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<li><a href="about.html">Liên Hệ</a></li> 
						<li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="icons.html">Web Icons</a></li>
								<li><a href="codes.html">Short Codes</a></li>     
							</ul>
						</li>  
						<li><a href="mail.html">Mail Us</a></li>
					</ul>
				</div>
			</nav>
		</div>
</div>