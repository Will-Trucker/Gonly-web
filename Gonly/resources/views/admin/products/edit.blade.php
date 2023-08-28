@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Edit Products') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">{{ __('Back to Results') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="" method="post" name="productForm" id="productForm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">{{ __('Title') }}</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Title" value="{{ $product->title }}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">{{ __('Slug') }}</label>
                                            <input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                                placeholder="Description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">{{ __('Media') }}</h2>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>{{ __('Drop files here or click to upload') }}<br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="product-gallery">
                           @if ($productImages->isNotEmpty())
                               @foreach ($productImages as $image)
                               <div class="col-md-3" id="image-row-{{ $image->id }}"> 
                                  <div class="card">
                                    <input type="hidden" name="image_array[]" value="{{ $image->id }}">
                                      <img src="{{ asset('uploads/product/small/'.$image->image) }}" class="card-img-top" alt="">
                                         <div class="card-body">
                                           <a href="javascript::void(0)" onclick="deleteImage({{ $image->id }})" class="btn btn-danger">{{__('Delete')}}</a>
                                         </div>
                                    </div>
                                </div>
                               @endforeach
                           @endif
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">{{ __('Pricing') }}</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">{{ __('Price') }}</label>
                                            <input type="text" name="price" id="price" class="form-control"
                                                placeholder="{{ __('Price') }}" value="{{ $product->price }}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">{{ __('Compare at Price') }}</label>
                                            <input type="text" name="compare_price" id="compare_price"
                                                class="form-control" placeholder="{{ __('Compare at Price') }}" value="{{ $product->compare_price }}">
                                            <p class="text-muted mt-3">
                                                {{ __('To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">{{ __('Inventory') }}</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">{{ __('SKU (Stock Keeping Unit)') }}</label>
                                            <input type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{ $product->sku }}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">{{ __('Barcode') }}</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control"
                                            placeholder="Barcode" value="{{ $product->barcode }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="hidden" name="track_qty" value="No">
                                                <input class="custom-control-input" type="checkbox" id="track_qty"
                                                    name="track_qty" value="Yes" {{ ($product->track_qty == 'Yes') ? 'checked' : '' }}>
                                                <label for="track_qty"
                                                    class="custom-control-label">{{ __('Track Quantity') }}</label>
                                                <p class="error"></p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" min="0" name="qty" id="qty"
                                                class="form-control" placeholder="Qty" value="{{ $product->qty }}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">{{ __('Product status') }}</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option {{($product->status == 1) ? 'selected' : ''}} value="1">{{ __('Active') }}</option>
                                        <option {{($product->status == 0) ? 'selected' : ''}} value="0">{{ __('Block') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="h4  mb-3">{{ __('Product category') }}</h2>
                                <div class="mb-3">
                                    <label for="category">{{ __('Category') }}</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">{{ __('Select a Category') }}</option>
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option {{($product->category_id == $category->id) ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="category">{{ __('Sub Category') }}</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">{{ __('Select a Sub Category') }}</option>
                                        @if ($subCategories->isNotEmpty())
                                        @foreach ($subCategories as $subCategory)
                                            <option {{($product->sub_category_id == $subCategory->id) ? 'selected' : ''}} value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">{{ __('Product brand') }}</h2>
                                <div class="mb-3">
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">{{ __('Select a Product Brand') }}</option>
                                        @if ($brands->isNotEmpty())
                                            @foreach ($brands as $brand)
                                                <option {{($product->brand_id == $brand->id) ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">{{ __('Featured product') }}</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured" class="form-control">
                                        <option {{($product->is_featured == 'No') ? 'selected' : ''}} value="No">{{ __('No') }}</option>
                                        <option {{($product->is_featured == 'Yes') ? 'selected' : ''}} value="Yes">{{ __('Yes') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">{{ __('Cancel') }}</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
    <script>
        $('#title').change(function() {
            element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route("getSlug") }}',
                type: 'get',
                data: {title: element.val()},
                dataType: 'json',
                success: function(response) {
                    if (response["status"] == true) {
                        $("button[type=submit]").prop('disabled', false);
                        $("#slug").val(response["slug"]);
                    }
                }
            });
        });

        $("#productForm").submit(function(event) {
            event.preventDefault()
            var formArray = $(this).serializeArray();
            $("button[type='submit']").prop('disabled',true)
            $.ajax({
                url: '{{ route("products.update",$product->id) }}',
                type: 'put',
                data: formArray,
                dataType: 'json',
                success: function(response) {
                    $("button[type='submit']").prop('disabled',true)
                    if (response['status'] == true) {
                        $(".error").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select, input[type='number']").removeClass('is-invalid')
                        
                        window.location.href = "{{ route('products.index')}}";
                    } else {
                        var errors = response['errors'];

                        //   if (errors['title']){
                        //      $("#title").addClass('is-invalid')
                        //      .siblings('p')
                        //      .addClass('invalid-feedback')
                        //      .html(errors['title']);
                        //   } else {
                        //      $("#title").removeClass('is-invalid')
                        //      .siblings('p')
                        //      .removeClass('invalid-feedback')
                        //      .html("");
                        //   }

                        $(".error").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select, input[type='number']").removeClass('is-invalid')

                        $.each(errors, function(key,value) {
                          $(`#${key}`).addClass('is-invalid')
                          .siblings('p')
                          .addClass('invalid-feedback')
                          .html(value)
                        });

                    }
                },
                error: function() {
                    console.log("Something wrong has happened / Algo ocurrio de manera incorrecta");
                }
            });
        });

        $("#category").change(function() {
            var category_id = $(this).val();
            $.ajax({
                url: '{{ route("product-subcategories.index") }}',
                type: 'get',
                data: {category_id: category_id},
                dataType: 'json',
                success: function(response) {
                    $("#sub_category").find("option").not(":first").remove();
                    $.each(response["subCategories"], function(key, item) {
                        $("#sub_category").append(`<option value='${item.id}'>${item.name}</option>`)
                    });

                },
                error: function() {
                    console.log("Something wrong has happened / Algo ocurrio de manera incorrecta");
                }
            });
        })

     Dropzone.autoDiscover = false;
     const dropzone = new Dropzone("#image", { 
     url:  "{{ route('product-images.update') }}",
     maxFiles: 6,
     paramName: 'image',
     params: {'product_id': '{{ $product->id }}'},
     addRemoveLinks: true,
     acceptedFiles: "image/jpeg,image/png,image/gif",
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     success: function(file, response){
        //$("#image_id").val(response.image_id);
        //console.log(response)

        var html = `<div class="col-md-3" id="image-row-${response.image_id}"> <div class="card">
          <input type="hidden" name="image_array[]" value="${response.image_id}">
          <img src="${response.ImagePath}" class="card-img-top" alt="">
            <div class="card-body">
              <a href="javascript::void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">{{__('Delete')}}</a>
            </div>
          </div>
        </div>`;

        $("#product-gallery").append(html);


        
       },
       complete: function (file){
          this.removeFile(file)
       }
    });

    function deleteImage(id){
      $("#image-row-"+id).remove();
      if (confirm("{{__('Are you sure you want to delete this image?')}}")) {
        $.ajax({
            url: '{{ route("product-images.destroy") }}',
            type: 'delete',
            data: {id:id},
            success: function(response){
                if(response.status == true){
                    alert(response.message);
                } else {
                    alert(response.message);
                }
            }
        }); 
      }
    };
    </script>
@endsection
