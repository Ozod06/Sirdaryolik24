@extends('layouts.adminLayauts')

@section('title')
    Create tag
@endsection

@section('content')
    @include('admin.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">

                        <div class="card-header">
                            <h4>Create tags</h4>
                        </div>
                        <form action="{{ route('admin.tag.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tag (uz)</label>
                                    <input type="text" class="form-control" name="name_uz">
                                </div>
                                <div class="form-group">
                                    <label>Tag (ru)</label>
                                    <input type="text" class="form-control" name="name_ru">
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

