@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Главная') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('Главная') }}</li>
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
                    <h3 class="card-title">Категории</h3>

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
                    <form action="{{ route('categories.update', $category ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">{{ __('Название категории') }}</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $category->title }}">
                            @error('title')
                            <span class="error invalid-feedback">
                            {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">{{ __('Slug') }}</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $category->slug }}">
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
