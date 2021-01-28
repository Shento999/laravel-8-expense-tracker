@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5">
                <div class="card">
                    <div class="card-header">
                        Add Expense
                    </div>
                    <div class="card-body">
                        <form action="{{route('expense.save')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">
                                <div class="invalid-feedback">{{$errors->first('description')}}</div>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}">
                                <div class="invalid-feedback">{{$errors->first('date')}}</div>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{old('amount')}}">
                                <div class="invalid-feedback">{{$errors->first('amount')}}</div>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                    @foreach($expenseCategory as $category)
                                        <option value="{{$category}}">{{$category}}</option>
                                    @endforeach()
                                </select>
                                <div class="invalid-feedback">{{$errors->first('category')}}</div>
                            </div>

                            <div class="form-group">
                                <label for="Payment">Payment</label>
                                <select name="payment_method" class="form-control @error('payment_method') is-invalid @enderror">
                                    @foreach($paymentMethod as $payment)
                                        <option value="{{$payment}}">{{$payment}}</option>
                                    @endforeach()
                                </select>
                                <div class="invalid-feedback">{{$errors->first('payment_method')}}</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Expense</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()