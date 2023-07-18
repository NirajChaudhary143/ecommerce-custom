

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
   
        <div class="col ">
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
                     {!! Form::select('size', ['active' => 'Active', 'draft' => 'Draft'],null,['class'=>'form-control']); !!}
                 </div>
            </div>
        </div>
      {{-- Column 1 End --}}

      {{-- Column 2 --}}
      <div class="col ">
        <div class="bg-white rounded-3">
            <div class="p-2">
                 {!! Form::label('','Product Title',['style'=>'font-weight:600; font-size:15px']) !!}
                 <span style="color: red">*</span> <br>
                 {!! Form::text('product_title',null,['class'=>'form-control','placeholder'=>'eg: Biscuits']) !!}
             </div>
             <div class="p-2">
                 {!! Form::label('','Product Description',['style'=>'font-weight:600; font-size:15px']) !!}
                 <span style="color: red">*</span> <br>
                 {!! Form::textarea('product_title',null,['class'=>'form-control','id'=>'editor']) !!}
             </div>

            </div>
        </div>
      {{-- Column 2 End --}}
</div>
{{-- Row COntainer End --}}


{!! Form::close()!!}