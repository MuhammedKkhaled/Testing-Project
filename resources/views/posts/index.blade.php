@extends('app')

@section('page_title' , 'Index Page')

@section('content')
    <div class="m-4">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td> {{ $post->title }} </td>
                    <td> {{ $post->author }} </td>
                </tr>     
                @empty
                    <tr>
                        <td colspan="2"> {{ _('No Posts') }} </td>
                    </tr>
                @endforelse
                  
            </tbody>
        </table>
        
    </div>
        
@endsection