@extends('admin/master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
		@include('admin.blocks.errors')
		<form class="form-horizontal" action="{!! route('admin.product.getAdd') !!}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}"   />
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category Parent</label>
				<div class="col-sm-9">
					<select name="sltParent" class="col-xs-10 col-sm-5">
                         <option value="0">Please Choose Category</option>
                         <?php  cate_parent($cate,0,"--",old('sltParent')); ?>
                     </select>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1" name="txtName">Category Name</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1"  name="txtName" placeholder="Please Enter Username" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Price</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" name="txtPrice" placeholder="Please Enter Price" class="col-xs-10 col-sm-5" />
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Intro</label>
				<div class="col-sm-9">
					<textarea class="form-control" rows="3" name="txtIntro" id="editor1" class="ckeditor"></textarea>
					<script type="text/javascript">
                            CKEDITOR.replace( 'editor1' );
                	</script>
				</div>
				
			</div>	

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Content</label>
				<div class="col-sm-9">
					<textarea class="form-control" rows="3" name="txtContent" id="editor2" class="ckeditor"></textarea>
					<script type="text/javascript">
                            CKEDITOR.replace( 'editor2' );
                	</script>
				</div>
			</div>	

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>
				<div class="col-sm-9">
					<input type="file" id="form-field-1" name="fImages" placeholder="Image" class="col-xs-10 col-sm-5" />
				</div>
			</div>	

			@for($i=1;$i<=3;$i++)
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Hình{!!$i!!}</label>
				<div class="col-sm-9">
					<input type="file" id="form-field-1" name="fProductDetail[]" placeholder="Image" class="col-xs-10 col-sm-5" />
				</div>
			</div>	
			@endfor

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Keywords</label>
				<div class="col-sm-9">
					<textarea name="txtKeywords" id="form-field-1" placeholder="Please Enter Keywords" class="col-xs-10 col-sm-5" rows="3"></textarea>
				</div>
			</div>	

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Description</label>
				<div class="col-sm-9">
					<textarea name="txtDescription" id="form-field-1" placeholder="Please Enter  Description" class="col-xs-10 col-sm-5" rows="3"></textarea>
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
					
@endsection