

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
                     {!! Form::number('crossed_price',0,['class'=>'form-control', 'min'=>'0']) !!}
                 </div>
            </div>
            {{-- Item 3 --}}
            <div class="col bg-white rounded-3 mt-3">
                <div class="p-2">
                     {!! Form::label('','Quantity',['style'=>'font-weight:600; font-size:15px']) !!}
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
        <div class="bg-white rounded-3 p-2">
            {{-- <div class="p-2">
                 {!! Form::label('','Product Image',['style'=>'font-weight:600; font-size:15px']) !!}
                 <span style="color: red">*</span> <br>
                 {!! Form::file('product_image',['name'=>'images[]','multiple','accept'=>'image/*','hidden','id'=>'multiple-image']) !!}
                <div class="multiple-image-upload">            
                    <i style="color: rgb(143, 68, 235); font-size:30px" class="fa-solid fa-cloud-arrow-up"></i>
                </div> 
             </div> --}}

             {{-- Dropzone Js Start --}}
             {!! Form::label('','Product Image',['style'=>'font-weight:600; font-size:15px']) !!}
             <div id="imageDropzone" class="dropzone dz-clickable">
                <div class="dz-message needsclick">    
                    <br>Drop files here or click to upload.<br><br>                                            
                </div>
            </div>

             {{-- Dropzone js End --}}
             <div >
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
Dropzone.autoDiscover = false;    
  const dropzone = $("#imageDropzone").dropzone({ 
			uploadprogress: function(file, progress, bytesSent) {
          $("button[type=submit]").prop('disabled',true);
      },
      url:  "{{ route('temp-images.create') }}",
      maxFiles: 10,
      paramName: 'image',
      addRemoveLinks: true,
      acceptedFiles: "image/jpeg,image/png,image/gif",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }, success: function(file, response){
          $("#image_id").val(response.image_id);
          this.removeFile(file);            
      }
  });
</script>

<script>
                // Select 2
                $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
</script>


{!! Form::submit('Save Product',['class'=>'add-product-submit']) !!}


{!! Form::close()!!}