@include('sales.layouts.header')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="form_container">
            <h2>Send Email</h2> 
            <p> Please send your message below. We will get back to you at the earliest! </p>
            <form role="form" method="post" id="reused_form">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="name"> Email:</label>
                        <input type="email" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message"> Message:</label>
                        <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" class="btn btn-outline-info btn-lg btn-default pull-right float-right" ><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
            <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your message successfully!</h3> </div>
            <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
        </div>
    </div>
</div>
@include('sales.layouts.footer')