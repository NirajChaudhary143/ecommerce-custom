@extends('admin.adminPanel')
@section('main-section')
    <div class="productForm">
        @include('admin.productForm')
    </div>

    <script>
        Dropzone.autoDiscover = false;    
  const dropzone = $("#imageDropzone").dropzone({ 

      url:  "{{ route('temp-images.create') }}",
      maxFiles: 10,
      paramName: 'image',
      addRemoveLinks: true,
      acceptedFiles: "image/jpeg,image/png,image/gif",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }, success: function(file, response){
        //   $("#image_id").val(response.image_id);
        var html = `<div class="col-md-3 my-1 " id="product-image-row-${response.image_id}">
                            <div class="card image-card border-0">
                                <i onclick="deleteImage(${response.image_id})" style="float:right;color:red;position: absolute;right: 8px;font-size:20px;cursor:pointer;background-color:white" class="fa-solid fa-xmark mt-1"></i>
                                <img src="${response.imagePath}" alt="" class="w-100 card-img-top">
                                <input type="hidden" name="image_id[]" value="${response.image_id}"/>
                            </div>
                        </div>`;
        $('#image-wrapper').append(html);
          this.removeFile(file);            
      }
  });

  function deleteImage(id){
  if(confirm("Are you sure to delete image")){
    $("#product-image-row-"+id).remove();
    var URL = "{{ route('delete-temp-images','ID') }}";
    newUrl =URL.replace('ID',id);
  $.ajax({
    url:newUrl,
    data:{},
    method:'delete',
    dataType:'json',
    headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(response){
              
            }
  });
}

}

        </script>
@endsection