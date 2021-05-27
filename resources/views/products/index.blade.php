@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD Example</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('products.create') }}" class="btn btn-success">Create New Peoduct</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $v)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $v->name }}</td>
                <td> {{$v->detail}} </td>
                <td>
                    <form action="{{route('products.destroy', $v->id)}}" method="POST">
                        <a href="{{route('products.show', $v->id)}}" class="btn btn-info">Show</a>
                        <a href="{{route('products.edit', $v->id)}}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $products->links() !!}

@endsection