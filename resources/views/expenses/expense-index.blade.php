@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
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
                            <td>{{$expense->date}}</td>
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