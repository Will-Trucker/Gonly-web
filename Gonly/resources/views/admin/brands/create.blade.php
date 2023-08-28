@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('Create Brands')}}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('brands.create') }}" class="btn btn-primary">{{__('Back to Results')}}</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" name="createBrandForm" id="createBrandForm" method="post">
        <div class="card">
            <div class="card-body">								
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email">{{__('Slug')}}</label>
                            <input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug">	
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email">{{__('Status')}}</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">{{__('Active')}}</option>
                                <option value="0">{{__('Not Available')}}</option>
                            </select>
                            <p></p>
                        </div>
                    </div>									
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
            <a href="{{route('brands.index')}}" class="btn btn-outline-dark ml-3">{{__('Cancel')}}</a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

@section('customJs')
  <script>
    $("#createBrandForm").submit(function(event){
       event.preventDefault();
       var element = $(this);
	   $("button[type=submit]").prop('disabled',true);
	   
       $.ajax({
          url: '{{route("brands.store")}}',
          type: 'post',
          data: element.serializeArray(),
          dataType: 'json',
          success: function(response){
            $("button[type=submit]").prop('disabled',false);

            if(response["status"] == true){

			  window.location.href="{{ route('brands.index') }}";
		      $("#name").removeClass('is-invalid')
			  .siblings('p')
			  .removeClass('invalid-feedback').html("");

              $("#slug").removeClass('is-invalid')
			  .siblings('p')
			  .removeClass('invalid-feedback').html("");

			} else {  

            var errors = response['errors'];
            if(errors['name']){
			  $("#name").addClass('is-invalid')
			  .siblings('p')
			  .addClass('invalid-feedback').html(errors['name']);
		     } else {
			  $("#name").removeClass('is-invalid')
			  .siblings('p')
			  .removeClass('invalid-feedback').html("");
		    }
		   if(errors['slug']){
			  $("#slug").addClass('is-invalid')
			  .siblings('p')
			  .addClass('invalid-feedback').html(errors['slug']);
		   } else {
			  $("#slug").removeClass('is-invalid')
			  .siblings('p')
			  .removeClass('invalid-feedback').html("");
		   }
			}
          }, error: function(jqXHR, exception){
             console.log("Algo ocurrio de manera incorrecta / Something wrong has ocurred");
          }
       });
    });

    $('#name').change(function(){
		element = $(this);
        $("button[type=submit]").prop('disabled',true); 
    $.ajax({
              url: '{{route("getSlug")}}',
              type: 'get',
              data: {title: element.val()},
              dataType: 'json',
    		  success: function(response){
                if(response["status"] == true){
                    $("button[type=submit]").prop('disabled',false); 
					$("#slug").val(response["slug"]);
				}
    		  }
    	});    
    });
  </script>
@endsection