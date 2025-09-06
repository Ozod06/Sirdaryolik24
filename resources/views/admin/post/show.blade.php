@extends('layouts.adminLayauts')

@section('title')
    Post show
@endsection

@section('content')
    @include('admin.sidebar')
    <div class="main-content">
        <section class="section">
            <h1>Posts</h1>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>posts</h4>
                            <a href="{{ route('admin.post.index') }}" class="btn btn-success">Back</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Title (uz)</th> <td>{{ $post->title_uz }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Title (ru)</th> <td>{{ $post->title_ru }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Body (uz)</th> <td>{!! $post->body_uz !!}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Body (ru)</th> <td>{!! $post->body_ru !!}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Category (uz)</th> <td>{{ $post->category->name_uz ?? "Boglanmadi"}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Tags</th> <td> @foreach($post->tags as $tag)
                                          {{ $tag->name_uz }}
                                    @endforeach</td>
                                </tr>
                                <tr>
                                    <th scope="col">Img</th>
                                    <td> <img src="/admin/images/{{ $post->image }}" alt="" width="70px"></td>

                                </tr>
                                <tr>
                                    <th scope="col">Slug</th> <td>{{ $post->slug }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Action</th>
                                </tr>

                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


