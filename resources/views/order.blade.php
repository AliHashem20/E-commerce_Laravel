{{-- we use here -> instead of [''] since $products here is object class not array (DB returns object) --}}

@extends('master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Amount</td>
                        <td>{{ $totalOrder }} $</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>0 $</td>
                    </tr>
                    <tr>
                        <td>Delivery</td>
                        <td>10 $</td>
                    </tr>
                    <tr>
                        <td>Totaal Amount</td>
                        <td>{{ $totalOrder + 10 }} $</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <form action="/order_address" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="address" type="email" placeholder="enter your address" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Payment Method</label> <br><br>
                        <input type="radio" value="online" name="payment"> <span>Online paymnet</span> <br><br>
                        <input type="radio" value="emi" name="payment"> <span>EMI paymnet</span> <br><br>
                        <input type="radio" value="delivery" name="payment"> <span>Payment on Delivery</span>
                    </div>
                    <button type="submit" class="btn btn-success">Order Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
