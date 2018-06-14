@extends('admin/master')
@section('content')
<style>
	.img_current{width:150px;}
	.img_detail{width:150px;}
	.icon_del{position:relative;width:50px;height: 50px;top:-20px;left:50px;}
	#insert{margin-top:20px;}
</style>
<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
		@include('admin.blocks.errors')
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}"   />
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category Parent</label>
				<div class="col-sm-9">
					<select name="sltParent" class="col-xs-10 col-sm-5">
                         <option value="0">Please Choose Category</option>
                         <?php  cate_parent($cate,0,"--",$product["cate_id"]) ?>
                     </select>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1" name="txtName">Category Name</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1"  name="txtName" value="{!!  old('txtName',isset($product) ? $product['name']:null ) !!}" placeholder="Please Enter Username" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Price</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" name="txtPrice"  value="{!!  old('txtPrice',isset($product) ? $product['price']:null ) !!}" placeholder="Please Enter Price" class="col-xs-10 col-sm-5" />
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Intro</label>
				<div class="col-sm-9">
					<textarea class="form-control" rows="3" name="txtIntro"   id="editor1" class="ckeditor">{!!  old('txtIntro',isset($product) ? $product['intro']:null ) !!}</textarea>
					<script type="text/javascript">
                            CKEDITOR.replace( 'editor1' );
                	</script>
				</div>
				
			</div>	

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Content</label>
				<div class="col-sm-9">
					<textarea class="form-control" rows="3" name="txtContent" id="editor2" class="ckeditor">{!!  old('txtContent',isset($product) ? $product['content']:null ) !!}</textarea>
					<script type="text/javascript">
                            CKEDITOR.replace( 'editor2' );
                	</script>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image Current</label>
				<img src="{!!asset('resources/upload/'.$product['image'])!!}" class="img_current" />
				<input type="hidden" name="img_current" value="{!!$product['image']!!}">
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>
				<div class="col-sm-9">
					<input type="file" id="form-field-1" name="fImages" placeholder="Image" class="col-xs-10 col-sm-5" />
				</div>
			</div>	

			@foreach($product_image as $key => $item_product_image)
			<div class="form-group" id="{!! $key !!}">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
				<div>
					<img src="{!!asset('resources/upload/detail/'.$item_product_image['image'])!!}" class="img_detail" idHinh="hinh{!! $item_product_image['id'] !!}" id="{!! $key !!}"/>
					<a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
				</div>
			</div>	
						
			@endforeach

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
					<div class="col-sm-9">
						
						<button type="button" class=class="col-xs-10 col-sm-5"  id="addImages">Add Image</button>
						<div id="insert"></div>
					</div>
			</div>
						

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Keywords</label>
				<div class="col-sm-9">
					<textarea name="txtKeywords"  id="form-field-1" placeholder="Please Enter Keywords" class="col-xs-10 col-sm-5" rows="3">{!!  old('txtKeywords',isset($product) ? $product['keywords']:null ) !!}</textarea>

				</div>
			</div>	

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Description</label>
				<div class="col-sm-9">
					<textarea name="txtDescription" id="form-field-1" placeholder="Please Enter  Description" class="col-xs-10 col-sm-5" rows="3">{!!  old('txtDescription',isset($product) ? $product['description']:null ) !!}</textarea>
				</div>
			</div>	
			
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="Submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
							Product Add
					</button>

						&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
							Reset
					</button>
				</div>
			</div>	
		</form>

								
<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
<script type="text/javascript" src="{{url('admin/assets/js/myscript.js')}}"></script>				
@endsection