@extends('admin/master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
		@include('admin.blocks.errors')
		<form class="form-horizontal" action="{!! route('admin.cate.getAdd') !!}" method="POST">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category Parent</label>
				<div class="col-sm-9">
					<select name="sltParent" class="col-xs-10 col-sm-5">
                         <option value="0">Please Choose Category</option>
                         <?php cate_parent($parent); ?>
                     </select>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category Name</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1"  name="txtCateName" placeholder="Username" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category Order</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" name="txtOrder" placeholder="Order" class="col-xs-10 col-sm-5" />
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category Keywords</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" name="txtKeywords" placeholder="Username" class="col-xs-10 col-sm-5" />
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category Description</label>
				<div class="col-sm-9">
					<textarea name="txtDescription" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" rows="3"></textarea>
				</div>
			</div>	
			
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="Submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
							Submit
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