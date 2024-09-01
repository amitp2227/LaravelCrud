@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @session('status')
                   <div class="alert alert-success">
                    {{ session('status') }}
                   </div>
                @endsession
                <div class="card">
                    <div class="card-header">
                        <h4>Category List
                            <a href="{{ url('category/create') }}" class="btn btn-primary float-end">Add</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>  
                        <tbody> 
                        <tr>
                        @foreach($categories as $category)
                            <td>{{  $category->id  }}</td>
                            <td>{{  $category->name  }}</td>
                            <td>{{  $category->description  }}</td>
                            <td>{{  $category->status  }}</td>                        
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('category.show',$category->id) }}" class="btn btn-info">Show</a>
                                <form action="{{ route('category.destroy',$category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <!-- <a href="">Delete</a> -->
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection