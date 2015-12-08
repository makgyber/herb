<div class="panel panel-danger">
    <div class="panel-heading">
        Deposit/Fee
    </div>
    <div class="panel-body row">
        <div class="form form-horizontal">
            <div class="form-group form-group-sm row col-sm-12">
                <label for="reserve_fee" class="col-sm-5 control-label">Amount</label>
                <div class="col-sm-7">
                    <input type="number" class="form-control" id="reserve_fee" name="reserve_fee" value="{{$reservation->reserve_fee or ''}}">
                </div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <label for="batch_number" class="col-sm-5 control-label">Batch Number</label>
                <div class="col-sm-7">
                    <input type="number" class="form-control" id="batch_number" name="batch_number" value="{{$reservation->batch_number or ''}}">
                </div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <label for="approval_code" class="col-sm-5 control-label">Approval Code</label>
                <div class="col-sm-7">
                    <input type="number" class="form-control" id="approval_code" name="approval_code" value="{{$reservation->approval_code or ''}}">
                </div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <label for="card_suffix" class="col-sm-5 control-label">Card Suffix</label>
                <div class="col-sm-7">
                    <input type="number" class="form-control" id="card_suffix" name="card_suffix" value="{{$reservation->card_suffix or ''}}">
                </div>
            </div>
            <div class="form-group form-group-sm row  col-sm-12">
                <label for="payment_type" class="col-sm-5 control-label">Payment Type</label>
                <div class="col-sm-6">
                    <label>
                        <input type="radio"  id="payment_type" name="payment_type" value="Cash" @if($reservation->payment_type=='Cash') checked @endif> Cash
                    </label>
                    <label>
                        <input type="radio"  id="payment_type" name="payment_type" value="Card" @if($reservation->payment_type=='Card') checked @endif> Card
                    </label>
                </div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <label for="reserve_fee" class="col-sm-5 control-label">Card Type</label>
                <div class="col-sm-5">
                    <select id="cardType" class="form-control"
                            name="cardType">
                        <option></option>
                        @foreach($cardTypes as $cardType)
                            <option @if($reservation->card_type == $cardType) selected @endif>{{$cardType}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <div class="col-sm-6">
                    <label>
                        <input type="checkbox"  id="is_debit" name="is_debit" @if($reservation->is_debit) checked @endif> Debit/ATM
                    </label>
                </div>
                <div class="col-sm-6">
                    <label>
                        <input type="checkbox"  id="wtax" name="wtax" @if($reservation->wtax) checked @endif> WTAX
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>