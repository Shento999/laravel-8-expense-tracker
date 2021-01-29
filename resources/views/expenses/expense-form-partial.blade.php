@csrf
<input type="hidden" name="id" value="{{$expense->id}}" />
<div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description', $expense->description)}}">
    <div class="invalid-feedback">{{$errors->first('description')}}</div>
</div>

<div class="form-group">
    <label for="date">Date</label>
    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date', $expense->date)}}">
    <div class="invalid-feedback">{{$errors->first('date')}}</div>
</div>

<div class="form-group">
    <label for="amount">Amount</label>
    <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{old('amount', $expense->amount)}}">
    <div class="invalid-feedback">{{$errors->first('amount')}}</div>
</div>

<div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control @error('category') is-invalid @enderror">
        @foreach($categories as $cat)
            <option value="{{$cat}}" {{($expense->category == $cat) ? 'selected' : null}}>{{$cat}}</option>
        @endforeach()
    </select>
    <div class="invalid-feedback">{{$errors->first('category')}}</div>
</div>

<div class="form-group">
    <label for="Payment">Payment</label>
    <select name="payment_method" class="form-control @error('payment_method') is-invalid @enderror">
        @foreach($paymentsMethods as $payment)
            <option value="{{$payment}}" {{($expense->payment_method == $payment) ? 'selected' : null}}>{{$payment}}</option>
        @endforeach()
    </select>
    <div class="invalid-feedback">{{$errors->first('payment_method')}}</div>
</div>