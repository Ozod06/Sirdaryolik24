@extends('layouts.adminLayauts')

@section('title')
    Create category
@endsection

@section('content')
    @include('admin.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">

                        <div class="card-header">
                            <h4>Create category</h4>
                        </div>
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category (uz)</label>
                                <input type="text" class="form-control" name="name_uz">
                            </div>
                            <div class="form-group">
                                <label>Category (ru)</label>
                                <input type="text" class="form-control" name="name_ru">
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
