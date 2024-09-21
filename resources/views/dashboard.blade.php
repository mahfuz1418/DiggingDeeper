<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card" >
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                          <h2 class="card-title text-center">Post </h5>
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="title">Post Title</label>
                                  <input type="text" id="title" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter Title">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content" cols="30" rows="5"></textarea>
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
