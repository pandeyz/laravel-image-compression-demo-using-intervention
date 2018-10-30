<!DOCTYPE html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<body>
	<div class="panel panel-primary">
	 <div class="panel-heading">Laravel Intervention upload image after resize</div>
	  <div class="panel-body"> 
	    @if (count($errors) > 0)
	    <div class="alert alert-danger">
	        @foreach ($errors->all() as $error)
	          <p class="error_item">{{ $error }}</p>
	        @endforeach
	    </div>
	    @endif
	    @if (Session::get('success'))
	    
	    <div class="row">
	        <div class="col-md-12">
	        <div class="col-md-4">
	            <strong>Image Before Resize:</strong>
	        </div>
	        <div class="col-md-8">    
	            <img src="{{asset('uploads/normal_images/'.Session::get('imagename')) }}" />
	        </div>
	        </div>
	        <div class="col-md-12" style="margin-top:10px;">
	        <div class="col-md-4">
	            <strong>Image after Resize:</strong>
	        </div>
	        <div class="col-md-8">    
	            <img src="{{asset('uploads/thumbnail_images/'.Session::get('imagename')) }}" />
	        </div>
	        </div>
	    </div>
	    @endif
	    <form method="post" action="{{ url('intervention-resizeImage') }}" enctype="multipart/form-data">
	        <div class="row">
	            <div class="col-md-6">
	                <br/>
	                {!! csrf_field() !!}
	                <input type="file" name="photo" class="form-control">
	            </div>
	            <div class="col-md-6">
	                <br/>
	                <button type="submit" class="btn btn-primary">Upload Image</button>
	            </div>
	        </div>
	    </form>
	 </div>
	</div>
</body>

</html>