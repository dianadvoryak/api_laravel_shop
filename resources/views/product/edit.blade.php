@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="title"  value="{{ $product->title }}" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description"  value="{{ $product->description }}" class="form-control" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content">{{ $product->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price"  value="{{ $product->title }}"  class="form-control" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <input type="text" name="count"  value="{{ $product->count }}" class="form-control" placeholder="Count">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Select a file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected" disabled>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id === $product->category_id) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;">
                            <option selected="selected" disabled>Select tags</option>
                            @foreach($tags as $tag)
                                @foreach($productTags as $productTag)
                                    <option value="{{ $tag->id }}"  @if($tag->id === $productTag->tag_id) selected @endif>{{ $tag->title }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select Colors" style="width: 100%;">
                            <option selected="selected" disabled>Select colors</option>
                            @foreach($colors as $color)
                                @foreach($colorProducts as $colorProduct)
                                    <option value="{{ $color->id }}" @if($color->id === $colorProduct->color_id) selected @endif>{{ $color->title }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
