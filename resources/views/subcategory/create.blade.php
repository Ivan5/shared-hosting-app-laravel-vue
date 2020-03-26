@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="inline-block">
                        Dashboard
                    </div>
                    <div>
                      <a class="btn btn-warning" href="{{route('home')}}">Back</a>
                    </div>
                </div>

                <div class="card-body">
                  Add new subcategory|
                  <form action="{{route('subcategory.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="">Select Category</label>
                      <select name="category_id" class="form-control" id="">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryname}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group mt-4">
                      <label for="subcategory">Enter a Subcategory</label>
                      <input type="text" class="form-control" name="subcategoryname">
                      @error('subcategoryname')
                        <div class="error text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Submit the subcategory</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
