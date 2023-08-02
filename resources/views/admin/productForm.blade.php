
@if (isset($product))
{!!Form::model($product,[
    'route'=>['update.product',$product->id],
    'mehtod'=>'post',
    'enctype'=>'multipart/form-data',
    'id'=>'productForm',
    'name'=>'productForm'
])
!!}
@else
{!!Form::model([
    'route'=>'add.product',
    'mehtod'=>'post',
    'enctype'=>'multipart/form-data',
    'id'=>'productForm',
    'name'=>'productForm'
])
!!}
    
@endif

<div class="d-flex justify-content-start align-items-center">
    <i style="margin-right: 4px" class="fa-solid fa-arrow-left"></i>
    <div class="user-title">
        {{$title}}
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
                     {!! Form::text('product_title',null,['class'=>'form-control','placeholder'=>'eg: Biscuits']) !!}
                     <span class="text-danger">
                        @error('product_title')
                            {{$message}}
                        @enderror
                    </span>
                 </div>
                 <div class="p-2">
                     {!! Form::label('','Product Description',['style'=>'font-weight:600; font-size:15px']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::textarea('product_description',null,['class'=>'form-control','id'=>'editor']) !!}
                     <span class="text-danger">
                        @error('product_description')
                            {{$message}}
                        @enderror
                    </span>
                 </div>
            </div>
            {{-- Item 2 --}}
            <div class="col bg-white rounded-3 mt-3">
                <div class="p-2">
                     {!! Form::label('','Selling Price',['style'=>'font-weight:600; font-size:15px']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::number('selling_price',null,['class'=>'form-control', 'min'=>'0']) !!}
                     <span class="text-danger">
                        @error('selling_price')
                            {{$message}}
                        @enderror
                    </span>
                 </div>
                <div class="p-2">
                     {!! Form::label('','Crossed Price',['style'=>'font-weight:600; font-size:15px;text-decoration:line-through']) !!}
                     {!! Form::number('crossed_price',null,['class'=>'form-control', 'min'=>'0']) !!}
                 </div>
                <div class="p-2">
                     {!! Form::label('','Cost Per Item',['style'=>'font-weight:600; font-size:15px']) !!}
                     {!! Form::number('cost_per_item',null,['class'=>'form-control', 'min'=>'0']) !!}
                 </div>
            </div>
            {{-- Item 3 --}}
            <div class="col bg-white rounded-3 mt-3">
                <div class="p-2">
                     {!! Form::label('','Quantity',['style'=>'font-weight:600; font-size:15px']) !!}
                     {!! Form::number('product_quantity',null,['class'=>'form-control', 'min'=>'0']) !!}
                 </div>
            </div>
            {{-- Item 4 --}}
            <div class="col bg-white rounded-3 mt-3">
                <div class="p-2">
                     {!! Form::label('','Status',['style'=>'font-weight:600; font-size:15px']) !!}
                     <span style="color: red">*</span> <br>
                     {!! Form::select('status', ['active' => 'Active', 'draft' => 'Draft'],null,['class'=>'form-control']); !!}
                     <span class="text-danger">
                        @error('status')
                            {{$message}}
                        @enderror
                    </span>
                 </div>
            </div>
        </div>
      {{-- Column 1 End --}}

      {{-- Column 2 --}}
      <div class="col col-md-6">
        <div class="bg-white rounded-3 p-2">

             {{-- Dropzone Js Start --}}
             {!! Form::label('','Product Image',['style'=>'font-weight:600; font-size:15px']) !!}
             <div id="imageDropzone" class="dropzone dz-clickable">
                <div class="dz-message needsclick">
                    <i class="fa-solid fa-cloud-arrow-up" style="font-size:60px"></i>    
                    <br>Drop files here or click to upload.<br><br>                                            
                </div>
            </div>
            <div id="image-wrapper" class="row">
                @if (isset($productImage))
                @foreach ($productImage as $image)
                    <div class="col-md-3 my-1" id="product-image-row-{{$image->id}}">
                        <div class="card image-card border-0">
                            <i onclick="deleteImageProduct({{$image->id }});" style="float:right;color:red;position: absolute;right: 8px;font-size:20px;cursor:pointer;background-color:white" class="fa-solid fa-xmark mt-1"></i>
                            <img src="{{asset('uploads/products/'.$image->name)}}" alt="" class="w-100 card-img-top">
                            <input type="hidden" name="image_id[]" value="{{$image->id}}"/>
                        </div>
                    </div>
                    
                @endforeach
                @endif
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



{!! Form::submit($btn,['class'=>'add-product-submit','id'=>'updateBtn']) !!}


{!! Form::close()!!}

<script>

                // Select 2
                $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
</script>