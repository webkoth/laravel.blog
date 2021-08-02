@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Теги') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('Теги') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Теги</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('tags.update', $tag ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label  for="title">{{ __('Название тега') }}</label>
                            <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $tag->title }}">
                            @error('title')
                            <span class="error invalid-feedback">
                            {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label  for="slug">{{ __('Slug') }}</label>
                            <input id="slug" type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $tag->slug }}">
                            @error('slug')
                            <span class="error invalid-feedback">
                            {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Редактировать') }}</button>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
