<div>
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12 text-center my-5">
                <h1>Payment simulation</h1>
                <p>Pick an outcome:</p>
            </div>
        </div>
        <div class="row justify-content-center p-5">
    
            <div class="col-sm-6 text-center">
                <form method="post" action="{{  route('order.update', ['order'=>$order])  }}">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="user_paid" value="{{false}}">
                    <button class="btn btn-lg btn-danger p-5">Unsuccessful</button>
                </form>
            </div>
    
            <div class="col-sm-6 text-center">

                <form method="post" action="{{  route('order.update', ['order'=>$order])  }}">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="user_paid" value="{{true}}">
                    <button class="btn btn-lg btn-success p-5">Successful</button>
                </form>
    
            </div>
    
        </div>
    </div>
</div>
