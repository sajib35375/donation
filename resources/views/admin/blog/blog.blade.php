@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="wrap" style="margin: 10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Post</h2>
                </div>
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first() }}</p>
                    @endif
                <div class="card-body">
                    <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""><strong>Title</strong></label>
                            <input name="title" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Tag</strong></label><br>
                            @foreach($tags as $tag)
                            <input name="tag[]" type="checkbox" id="md_checkbox_{{ $tag->id }}" value="{{ $tag->id }}" class="chk-col-success"/>
                            <label for="md_checkbox_{{ $tag->id }}">{{ $tag->tag_name }}</label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Category</strong></label><br>
                            @foreach($categories as $category)
                            <input name="category[]" type="checkbox" id="checkbox_{{ $category->id }}" value="{{ $category->id }}" class="chk-col-success"/>
                            <label for="checkbox_{{ $category->id }}">{{ $category->category_name }}</label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea id="editor1" name="description" rows="10" cols="80">
												This is my textarea to be replaced with CKEditor.
						</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Photo</label>
                            <img id="img" src="" alt="">
                            <input name="photo" class="form-control-file" type="file">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);

                $('img#img').attr('src',url).width('400px').height('300px');
            })
        })

    </script>








@endsection