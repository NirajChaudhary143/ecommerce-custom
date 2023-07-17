@extends('admin.adminPanel')

@section('main-section')
    <div class="category-container">
        <div class="user-title">
            Store Categories
        </div>
        {{-- Add Link --}}
            <div class="category-add-link">
                <button id="add-category">Add Category</button>
            </div>
        {{-- Add Link Ends --}}
    </div>
    <div class="category-table">
        <table width="100%" id="category-table">
            <thead>
                <tr>
                    <th width="50px">S.N.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tr>
                    <td width="50px">1</td>
                    <td>Fruits</td>
                    <td><a style="color: rgb(237, 84, 84)" href="">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>

        </table>
        {{-- <div class="add-category">
            <div class="add-category-container-1">
                <div class="user-title">Add Category</div>
                <div class="close-icon"><i class="fa fa-window-close" aria-hidden="true"></i></div>
            </div>
            <div class="category-form-container">
                <form action="">
                    @csrf
                    <div class="category-label">
                        <label for="" style="font-weight: 500">Category Name</label>
                        <span style="color: red">*</span>
                        <br>
                        <input type="text">
                    </div>
                    <div class="category-image">
                        <label for="" style="font-weight: 500">Category Image</label>
                        <span style="color: red">*</span> <br>
                        <input type="file" id="image-upload" hidden>
                    </div>
                    <div class="upload-image-container">                        
                        <i style="color: rgb(85, 77, 77); font-size:30px" class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <div class="uploaded-image-category">
                        
                    </div>
                    <div id="submit-btn">
                        <input id="save-btn-category" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div> --}}
    </div>

    <script>
        document.getElementById('add-category').onclick = function(e) {
            e.preventDefault();
            console.log(e.target);
            var categoryDisplay = document.getElementById('add-category');
            categoryDisplay.classList.toggle('display-category');
            // var addCategory = document.querySelector('.add-category-popup');
            var Newcontent = '';

            if(e.target.classList.contains('display-category')){
                // console.log('I have display category');


                    document.querySelector('.category-popup').classList.add('add-category-popup');
                    var addCategory = document.querySelector('.add-category-popup');
                    addCategory.innerHTML = '<div class="add-category">   <div class="add-category-container-1">        <div class="user-title">Add Category</div>          <div class="close-icon"><i class="fa fa-window-close" aria-hidden="true"></i></div>            </div>            <div class="category-form-container">                <form action="{{route('add.category')}}" method="POST" enctype="multipart/form-data">                    @csrf                    <div class="category-label">                        <label for="" style="font-weight: 500">Category Name</label>                        <span style="color: red">*</span>                        <br>                        <input name="category" placeholder="eg. fruits" type="text">                    </div>                    <div class="category-image">                        <label for="" style="font-weight: 500">Category Image</label>                        <span style="color: red">*</span> <br>                        <input name="image" type="file" id="image-upload" hidden>                    </div>                    <div class="upload-image-container">            <i style="color: rgb(85, 77, 77); font-size:30px" class="fa-solid fa-cloud-arrow-up"></i>                   </div>               <div class="uploaded-image-category">                       </div>                 <div id="submit-btn">                        <input id="save-btn-category" type="submit" value="Save">                   </div>               </form>            </div>        </div>';
                    document.querySelector('.add-category-popup').onclick = function(e) {
                        // console.log(e.target.classList.contains('add-category-popup'));
                        if(e.target.classList.contains('add-category-popup')){
                            addCategory.classList.remove('add-category-popup');
                            document.querySelector('.add-category').remove();
                            categoryDisplay.classList.remove('display-category');
    
    
                        }
                        // Image Upload and preview
                        if(document.querySelector('.upload-image-container')){
                            document.querySelector('.upload-image-container').onclick = function(e) {
                                console.log(e.target);
                            var defaultBtn = document.querySelector('#image-upload');
                            var customBtn = document.querySelector('.upload-image-container');
                            defaultBtn.click();

                            defaultBtn.addEventListener('change',function(){
                                // console.log("this".this);
                                const file = this.files[0];
                                if(file){
                                    var reader = new FileReader();
                                    console.log(reader);
                                    var parent = document.querySelector('.uploaded-image-category');
                                    parent.innerHTML = '<img id="uploaded-image" src="" alt="">';
                                    customBtn.remove();
                                    var img = document.querySelector('#uploaded-image');
                                    reader.onload = function() {
                                        const result = reader.result;
                                        img.src = result;
                                    }
                                    reader.readAsDataURL(file);
                                }
                            });
                        }

                        
                    // Close The pop up when click on close btn
                    if(document.querySelector('.close-icon'))
                        document.querySelector('.close-icon').onclick = function(e) {
                        console.log(e.target);
                        addCategory.classList.remove('add-category-popup');
                        document.querySelector('.add-category').remove();
                        categoryDisplay.classList.remove('display-category');

                     }


                    // Close The pop up when click on close btn End
                     }
                    //  Image Upload And preview End

 
                    }

            }
            // addCategory.innerHTML = Newcontent;
        };

    </script>
    
@endsection