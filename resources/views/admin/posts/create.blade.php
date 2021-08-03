@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Сатьи') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('Статьи') }}</li>
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
                    <h3 class="card-title">Сатьи</h3>

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
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Название поста') }}</label>
                            <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Введите название тега">
                            @error('title')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __("Цитата") }} </label>
                            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter text">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">{{ __('Контент') }}</label>
                            <textarea id="content" name="content" class="form-control" rows="5" placeholder="Enter text">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ __('Категория') }}</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @forelse($categories as $key => $category)
                                    <option value="{{ $key }}">{{ $category }}</option>
                                @empty
                                    Категорий нет
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">{{ __('Теги') }}</label>
                            <select id="tags" name="tags[]" class="select2" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;">
                                @forelse($tags as $key => $tag)
                                    <option value="{{ $key }}">{{ $tag }}</option>
                                @empty
                                    Категорий нет
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('Изображение') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="thumbnail" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">File upload</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Создать</button>
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
