@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>Payment Method</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <td>{{$expense->id}}</td>
                            <td>{{$expense->description}}</td>
                            <td>{{$expense->amount}}</td>
                            <td>{{$expense->category}}</td>
                            <td>{{$expense->payment_method}}</td>
                            <td>{{$expense->date}}</td>
                            <td>
                                <a href="{{ route('expense.view', $expense->id) }}" class="mr-3">View</a>
                                <a href="{{ route('expense.delete', $expense->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
            {{$expenses->render()}}
            </div>
        </div>
    </div>

@endsection()