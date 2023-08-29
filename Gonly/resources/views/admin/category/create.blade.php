@extends('admin.layouts.app')

@section('content')
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>{{__('Create Category')}}</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('categories.index')}}" class="btn btn-primary">{{__('Back to Results')}}</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="" method="post" id="categoryForm" name="categoryForm">
						
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
											<label for="slug">{{__('Slug')}}</label>
											<input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug">	
										    <p></p>
                                        </div>
									</div>		
									<div class="col-md-6">
										<div class="mb-3">
											<input type="hidden" name="image_id" id="image_id" value="">
											<label for="image">{{__('Image')}}</label>
											<div id="image" class="dropzone dz-clickable">
												<div class="dz-message needsclick">    
													<br>{{__('Drag the files or press the button.')}}<br><br>                                            
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="status">{{__('Status')}}</label>
											<select name="status" id="status" class="form-control">
                                                <option value="1">{{__('Active')}}</option>
                                                <option value="0">{{__('Not Available')}}</option>
                                            </select>
										</div>
									</div>									
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">{{__('Create')}}</button>
							<a href="{{route('categories.index')}}" class="btn btn-outline-dark ml-3">{{__('Cancel')}}</a>
						</div>
                        </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customJs')
  <script>
    $("#categoryForm").submit(function(event){
       event.preventDefault();
       var element = $(this);
	   $("button[type=submit]").prop('disabled',true);
	   
       $.ajax({
          url: '{{route("categories.store")}}',
          type: 'post',
          data: element.serializeArray(),
          dataType: 'json',
          success: function(response){
            if(response["status"] == true){

			window.location.href="{{ route('categories.index') }}";
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
             console.log("Algo ocurrio de manera incorrecta / An error has ocurred ");
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

Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#image", { 
    init: function() {
        this.on('addedfile', function(file) {
            if (this.files.length > 1) {
                this.removeFile(this.files[0]);
            }
        });
    },
    url:  "{{ route('temp-images.create') }}",
    maxFiles: 1,
    paramName: 'image',
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/png,image/gif",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(file, response){
        $("#image_id").val(response.image_id);
        //console.log(response)
    }
});

  </script>
@endsection