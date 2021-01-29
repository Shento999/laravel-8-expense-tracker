@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5">
                <div class="card">
                    <div class="card-header">
                        View Expense
                    </div>
                    <div class="card-body">
                        <form action="{{route('expense.update')}}" method="post">
                            @include('expenses.expense-form-partial')
                            <button type="submit" class="btn btn-primary">Update Expense</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()