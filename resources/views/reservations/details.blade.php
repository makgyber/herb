<div class="panel panel-primary reserve-details">
   <div class="panel-heading">
       <form class="form-inline" method="get" action="{{url('reservations')}}">
           <div class="form-group">
               <label for="reservecode">Reservation Code</label>
               <div class="input-group input-group-sm">
                    <input type="text" name="reservecode" class="form-control" id="reservecode" value="{{$reservation->reserve_code or ''}}" />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
               </div>
           </div>
       </form>
   </div>
   <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Rooms To Reservation
                        <button class="btn btn-xs pull-right" id="removerooms"><span class="glyphicon glyphicon-trash"></span></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr><th>#</th><th>Room</th><th>In</th><th>Out</th></tr>
                        </thead>
                        <tbody id="rroomlist">
                        <tr><td colspan="4">Select rooms to add</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Reserved Rooms
                        <button class="btn btn-xs pull-right" id="removerooms"><span class="glyphicon glyphicon-trash"></span></button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr><th>#</th><th>Room</th><th>In</th><th>Out</th></tr>
                        </thead>
                        <tbody>
                        @foreach($reservation->reserveRooms as $reserveRoom)
                            <tr>
                                <td><input type="checkbox" name="current_reserve_room" value="{{$reserveRoom->rr_id}}"></td>
                                <td>{{$reserveRoom->room_id}}</td>
                                <td>{{$reserveRoom->checkin}}</td>
                                <td>{{$reserveRoom->checkout}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Guest Details
                        <button class="btn btn-xs pull-right">Delete</button>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group form-group-sm">
                                <label for="inputPassword" class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="First Name" value="{{$reservation->guest->firstname or ''}}">
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="inputPassword" class="col-sm-4 control-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="Last Name" value="{{$reservation->guest->lastname or ''}}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Particulars

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group form-group-sm">
                                <label for="inputPassword" class="col-sm-4 control-label">No. of Pax</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control"  name="pax" id="pax" placeholder="No. of Pax" value="{{$reservation->pax or ''}}">
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="pickupTime" class="col-sm-4 control-label">Pickup Time</label>
                                <div class="col-sm-8">
                                    <input type="time" class="form-control" name="pickupTime" id="pickupTime" placeholder="Pickup Time" value="{{$reservation->pickup_time or ''}}">
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="pickupLocation" class="col-sm-4 control-label">Pickup Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pickupLocation" id="pickupLocation" placeholder="Location" value="{{$reservation->pickup_location or ''}}">
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="notes" class="col-sm-4 control-label">Notes</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="notes" id="notes">{{$reservation->notes or ''}}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Deposit/Fee
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                        <div class="form-group form-group-sm">
                            <label for="reserve_fee" class="col-sm-4 control-label">Amount</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="reserve_fee" name="reserve_fee" value="{{$reservation->reserve_fee or ''}}">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="payment_type" class="col-sm-4 control-label">Payment Type</label>
                            <div class="col-sm-8">
                                <label>
                                    <input type="radio"  id="payment_type" name="payment_type" value="Cash" @if($reservation->payment_type=='Cash') checked @endif> Cash
                                </label>
                                <label>
                                    <input type="radio"  id="payment_type" name="payment_type" value="Card" @if($reservation->payment_type=='Card') checked @endif> Card
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-group-sm">
                            <label for="reserve_fee" class="col-sm-4 control-label">Card Type</label>
                            <div class="col-sm-8">
                                <select id="cardType" class="form-control"
                                        name="cardType">
                                    @foreach($cardTypes as $cardType)
                                        <option @if($reservation->card_type == $cardType) selected @endif>{{$cardType}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="reserve_fee" class="col-sm-4 control-label"></label>
                            <div class="col-sm-8">
                                <label>
                                    <input type="checkbox"  id="is_debit" name="is_debit" @if($reservation->is_debit) checked @endif> Debit/ATM
                                </label>
                            </div>
                        </div>
                            <div class="form-group form-group-sm">
                                <label for="reserve_fee" class="col-sm-4 control-label"></label>
                                <div class="col-sm-8">
                                    <label>
                                        <input type="checkbox"  id="wtax" name="wtax" @if($reservation->wtax) checked @endif> WTAX
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Partner Information

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group form-group-sm">
                                <label for="reserve_date" class="col-sm-4 control-label">Date Booked</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="reserve_date" name="reserve_date" value="{{$reservation->reserve_date or ''}}">
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="partner" class="col-sm-4 control-label">Partner</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="partner" id="partner">
                                        @foreach($partners as $partner)
                                            <option value="" @if($partner->partner_name == $reservation->Partner) selected @endif>
                                                {{$partner->partner_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="partner" class="col-sm-4 control-label">Booking Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="partner" name="partner" value="{{$reservation->partnerTransactions->booking_number or ''}}">
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="partner" class="col-sm-4 control-label">Commission</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="partner" name="partner" value="{{$reservation->partnerTransactions->payable or ''}}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
   </div>
</div>
