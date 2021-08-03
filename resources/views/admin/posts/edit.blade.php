@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Редактирование Статьи') }}</h1>
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
                    <form action="{{ route('posts.update', $post ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label  for="title">{{ __('Название статьи') }}</label>
                            <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">
                                @error('title')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label  for="slug">{{ __('Slug') }}</label>
                            <input id="slug" type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $post->slug }}">
                            @error('slug')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __("Цитата") }} </label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Enter text">{{ $post->description }}</textarea>
                            @error('description')
                            <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for=content">{{ __("Контент") }} </label>
                            <textarea id="description" name="content" class="form-control @error('content') is-invalid @enderror" rows="5" placeholder="Enter text">{{$post->content}}</textarea>
                            @error('description')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ __('Категория') }}</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @forelse($categories as $key => $category)
                                    <option value="{{ $key }}"  {{ $key == $post->category_id ? 'selected' : ''}}>
                                        {{ $category }}
                                    </option>
                                @empty
                                    Категорий нет
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">{{ __('Теги') }}</label>
                            <select id="tags" name="tags[]" class="select2" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;">
                                @forelse($tags as $key => $tag)
                                    <option value="{{ $key }}" {{ in_array($key, $post->tags->pluck('id')->all()) ? 'selected' : ''}}>{{ $tag }}</option>
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
                        <div class="row m-3">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="image" class="img-thumbnail" width="300">
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
