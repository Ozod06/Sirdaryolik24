@extends('layouts.adminLayauts')

@section('title')
    Create post
@endsection

@section('content')
    @include('admin.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        @foreach($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach

                        <div class="card-header">
                            <h4>Create posts</h4>
                        </div>
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title (uz)</label>
                                    <input type="text" class="form-control" name="title_uz" @error('title_uz is-invalid') @enderror>
                                    @error('title_uz') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Title (ru)</label>
                                    <input type="text" class="form-control" name="title_ru" @error('title_ru is-invalid') @enderror>
                                    @error('title_ru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Body (uz)</label>
                                    <textarea type="text" class="form-control ckeditor" name="body_uz" @error('body_uz is-invalid') @enderror></textarea>
                                    @error('body_uz') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Body (ru)</label>
                                    <textarea type="text" class="form-control ckeditor" name="body_ru" @error('body_ru is-invalid') @enderror></textarea>
                                    @error('body_ru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" @error('image is-invalid') @enderror>
                                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select name="tags[]" id="" class="form-control" multiple style="height: 100px">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name_uz }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Muhummi?</div>
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="is_special" value="1" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Muhim postmi? Asosiyda ko'rinadi</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Meta title</label>
                                    <input type="text" class="form-control" name="meta_title">
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <input type="text" class="form-control" name="meta_description">
                                </div>
                                <div class="form-group">
                                    <label>Meta keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords">
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
       document.querySelectorAll('.ckeditor').forEach(editor =>{
           ClassicEditor.create(editor, {
               ckfinder: {
                   uploadUrl: "{{ route('admin.ckeditor.upload') . '?_token=' . csrf_token() }}"
               }
           })
               .catch(error => {
                   console.error(error);
               });
       });

    </script>

@endsection

