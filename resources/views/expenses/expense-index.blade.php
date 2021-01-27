@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Description</td>
                        <td>Amount</td>
                        <td>Category</td>
                        <td>Payment Method</td>
                        <td>Created Date</td>
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
                        <td>{{$expense->created_at}}</td>
                    </tr>
                    @endforeach()
                </tbody>
            </table>
            {{$expenses->render()}}
            </div>
        </div>
    </div>

@endsection()