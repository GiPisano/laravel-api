@extends('layouts.app')

@section('title', 'projects')

@section('content')

    <div class="container my-3">

        <div class="text-center mt-4">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Return to the list</a>
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">Edit project</a>
        </div>
        <h1 class="my-4 text-center">{{ $project->title }}</h1>
        <div class="row">

            @if (!empty($project->image))
                <div class="col">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="">
                </div>
            @endif

            @if ($project->video)
                <div class="mt-3">
                    <video width="320" height="240" controls>
                        <source src="{{ asset('storage/' . $project->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endif

            <div class="col-12">
                <h2 class="h4">Author</h2>
                <p>{{ $project->user->name }}</p>
            </div>

            <div class="col-12">
                <h2 class="h4">Type</h2>
                <p>{!! $project->type->getBadge() !!}</p>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="h4">Description</h2>
                <p>{{ $project->description }}</p>
            </div>
            <div class="col-12">
                <h2 class="h4">Technologies</h2>
                @foreach ($project->technologies as $technology)
                    {!! $technology->getTechnologyBadge() !!}
                @endforeach
            </div>
        </div>
    </div>

@endsection
