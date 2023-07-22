

{!!Form::model([
    'route'=>'add.product',
    'mehtod'=>'post',
    'enctype'=>'multipart/form-data',
])
!!}
<div class="d-flex justify-content-start align-items-center">
    <i style="margin-right: 4px" class="fa-solid fa-arrow-left"></i>
    <div class="user-title">
        Add Product
    </div>
</div>
{{-- Row Container Start --}}
<div class="row gx-2 mt-2">
    {{-- Column 1 --}}
   
        <div class="col col-md-6">
            {{-- Item 1 --}}
            <div class=" col bg-white rounded-3">
                <div class="p-2">
                     {!! Form::label('','Product Title',['style'=>'font-weight:600; font-size:15px']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::text('product_name',null,['class'=>'form-control','placeholder'=>'eg: Biscuits']) !!}
                 </div>
                 <div class="p-2">
                     {!! Form::label('','Product Description',['style'=>'font-weight:600; font-size:15px']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::textarea('product_description',null,['class'=>'form-control','id'=>'editor']) !!}
                 </div>
            </div>
            {{-- Item 2 --}}
            <div class="col bg-white rounded-3 mt-3">
                <div class="p-2">
                     {!! Form::label('','Selling Price',['style'=>'font-weight:600; font-size:15px']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::number('selling_price',0,['class'=>'form-control', 'min'=>'0']) !!}
                 </div>
                <div class="p-2">
                     {!! Form::label('','Crossed Price',['style'=>'font-weight:600; font-size:15px;text-decoration:line-through']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::number('crossed_price',0,['class'=>'form-control', 'min'=>'0']) !!}
                 </div>
            </div>
            {{-- Item 3 --}}
            <div class="col bg-white rounded-3 mt-3">
                <div class="p-2">
                     {!! Form::label('','Quantity',['style'=>'font-weight:600; font-size:15px']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::number('product_quantity',0,['class'=>'form-control', 'min'=>'0']) !!}
                 </div>
            </div>
            {{-- Item 4 --}}
            <div class="col bg-white rounded-3 mt-3">
                <div class="p-2">
                     {!! Form::label('','Status',['style'=>'font-weight:600; font-size:15px']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::select('status', ['active' => 'Active', 'draft' => 'Draft'],null,['class'=>'form-control']); !!}
                 </div>
            </div>
        </div>
      {{-- Column 1 End --}}

      {{-- Column 2 --}}
      <div class="col col-md-6">
        <div class="bg-white rounded-3">
            <div class="p-2">
                 {!! Form::label('','Product Image',['style'=>'font-weight:600; font-size:15px']) !!}
                 <span style="color: red">*</span> <br>
                 {!! Form::file('product_image',['name'=>'images[]','multiple','accept'=>'image/*','hidden','id'=>'multiple-image']) !!}
                <div class="multiple-image-upload">            
                    <i style="color: rgb(143, 68, 235); font-size:30px" class="fa-solid fa-cloud-arrow-up"></i>
                </div> 
             </div>
             <div class="p-2">
                 {!! Form::label('','Product Category',['style'=>'font-weight:600; font-size:15px']) !!}
                 <span style="color: red">*</span> <br>
                 {!! Form::select('category_id',$categories->pluck('name','id'),null,['class'=>'js-example-basic-multiple','style'=>'width:100%']); !!}
             </div>

            </div>
        </div>
      {{-- Column 2 End --}}
</div>
{{-- Row COntainer End --}}

<script>
    var ImageUpload = document.querySelector('.multiple-image-upload');
    var defaultBtn = document.querySelector('#multiple-image');

    ImageUpload.onclick = (e) => {
        if (e.target) {
            defaultBtn.click();

            defaultBtn.onchange = () => {
                if(document.querySelector('.multiple-image-container')){
                // Convert the FileList to an array using Array.from()
                console.log(defaultBtn.files);
                 var filesArray = Array.from(defaultBtn.files);

                // Loop through the selected image files
                filesArray.forEach((file) => {
                    var reader = new FileReader();

                    // Closure to capture the file information.
                    reader.onload = (function (imgFile) {
                        return function (e) {
                            // Create an image element for each file and set its source to the data URL
                            var imgElement = document.createElement('img');
                            imgElement.src = e.target.result;
                            imgElement.classList.add('thumbnail');
                            document.querySelector('.multiple-image-container').appendChild(imgElement);
                        };
                    })(file);

                // Read the image file as a data URL.
                reader.readAsDataURL(file);
            });
                }
                else{
                    var imageContainer = document.createElement('div');
                    imageContainer.classList.add('multiple-image-container');
                    ImageUpload.insertAdjacentElement('afterend', imageContainer);
                console.log(defaultBtn.files);
                
                    // Convert the FileList to an array using Array.from()
                    var filesArray = Array.from(defaultBtn.files);
    
                    // Loop through the selected image files
                    filesArray.forEach((file) => {
                        var reader = new FileReader();
    
                        // Closure to capture the file information.
                        reader.onload = (function (imgFile) {
                            return function (e) {
                                // Create an image element for each file and set its source to the data URL
                                var imgElement = document.createElement('img');
                                imgElement.src = e.target.result;
                                imgElement.classList.add('thumbnail');
                                imageContainer.appendChild(imgElement);
                            };
                        })(file);
    
                        // Read the image file as a data URL.
                        reader.readAsDataURL(file);
                    });

                }
            };
        }
    };
</script>

<script>
                // Select 2
                $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
</script>


{!! Form::submit('Save Product',['class'=>'add-product-submit']) !!}


{!! Form::close()!!}