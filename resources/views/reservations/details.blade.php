<div class="panel panel-primary reserve-details">
   <div class="panel-heading">
       <form class="form-inline" method="get" action="{{url('reservations')}}">
           <div class="form-group">
               <label for="reservecode">Reservation Code</label>
               <div class="input-group input-group-sm">
                    <input type="text" name="reservecode" class="form-control" id="reservecode" />
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
                        Reserved Rooms
                        <button class="btn btn-xs pull-right"><span class="glyphicon glyphicon-trash"></span></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr><th>#</th><th>Room</th><th>In</th><th>Out</th></tr>
                        </thead>
                        <tbody id="rroomlist">
                        <tr><td colspan="3">Select rooms to add</td></tr>
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
                                    <input type="text" class="form-control" id="inputPassword" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="inputPassword" class="col-sm-4 control-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="Last Name">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Payment Details
                        <button class="btn btn-xs pull-right">Save</button>
                    </div>
                    <div class="panel-body">

                    </div>

                </div>

            </div>
        </div>
   </div>
</div>
