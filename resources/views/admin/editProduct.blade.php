@extends('admin.adminPanel')


@section('main-section')
    @include('admin.productForm')

    <script>

        // Edit Product Dropzone js start
        Dropzone.autoDiscover = false;
   var product_id ={{$product->id}}; 
  const dropzone = $("#imageDropzone").dropzone({ 
     
      url:  "{{ route('product-image.store') }}",
      params:{product_id:product_id},
      maxFiles: 10,
      paramName: 'image',
      addRemoveLinks: true,
      acceptedFiles: "image/jpeg,image/png,image/gif",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }, success: function(file, response){
        var html = `<div class="col-md-3 my-1 " id="product-image-row-${response.image_id}">
                            <div class="card image-card border-0">
                                <i onclick="deleteImage(${response.image_id})" style="float:right;color:red;position: absolute;right: 8px;font-size:20px;cursor:pointer;background-color:white" class="fa-solid fa-xmark mt-1"></i>
                                <img src="${response.imagePath}" alt="" class="w-100 card-img-top">
                                <input type="hidden" name="image_id[]" value="${response.image_id}"/>
                            </div>
                        </div>`;
            $("#image-wrapper").append(html);
          this.removeFile(file);            
      }
  });
  var imageIdsToDelete = []; // Array to store the IDs of images to delete

function deleteImageProduct(id) {
    if (confirm("Are you sure you want to delete this image?")) {
        // Remove the image div from the HTML
        $("#product-image-row-" + id).remove();

        // Add the ID of the image to delete to the array
        imageIdsToDelete.push(id);
    }
}

$("#updateBtn").on("click", function() {
    if (imageIdsToDelete.length > 0) {
        var URL = "{{ route('product-image.delete', 'ID') }}";

        // Loop through the array and send separate AJAX requests to delete each image
        imageIdsToDelete.forEach(function(imageId) {
            var newUrl = URL.replace('ID', imageId);

            // Send AJAX request to delete the file
            $.ajax({
                url: newUrl,
                method: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(response) {
                    // Handle the success response here
                },
                error: function(xhr, status, error) {
                    // Handle the error response here
                }
            });
        });

        // Clear the array after deletion
        imageIdsToDelete = [];
    }
});


        // Edit Product Dropzone js end
    </script>
@endsection