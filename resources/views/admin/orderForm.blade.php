
{!!Form::model([
    'route'=>"#",
    'mehtod'=>'post',
    'enctype'=>'multipart/form-data',
    'id'=>'productForm',
    'name'=>'productForm'
])
!!}

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


{!! Form::submit('Update') !!}


{!! Form::close() !!}