@extends('layouts.adminLayauts')

@section('title')
    Create Ads
@endsection

@section('content')
    @include('admin.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">

                        <div class="card-header">
                            <h4>Create ads</h4>
                        </div>
                        <form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Image (top)</label>
                                    <input type="file" class="form-control" name="image_top">
                                </div>
                                <div class="form-group">
                                    <label>Title (top)</label>
                                    <input type="text" class="form-control" name="title_top">
                                </div>
                                <div class="form-group">
                                    <label>Url (top)</label>
                                    <input type="text" class="form-control" name="url_top">
                                </div>

                                <div class="form-group">
                                    <label>Image (side)</label>
                                    <input type="file" class="form-control" name="image_side">
                                </div>
                                <div class="form-group">
                                    <label>Title (side)</label>
                                    <input type="text" class="form-control" name="title_side">
                                </div>
                                <div class="form-group">
                                    <label>Url (side)</label>
                                    <input type="text" class="form-control" name="url_side">
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

