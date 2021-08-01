@include('finance.layouts.header');
<center>
<table>
    <tr>
        <td align="center" style="padding-top:100px;">
            <div class="card border-info mb3" style="height:600px;width:600px;">
                <div class="card-header">People from Organization</div>
                <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>#SR</th>
                                <th>Client Name</th>
                                <th>Select</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td><button class="btn btn-outline-primary" name="chat_button" id="chat_button">Chat</button></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                    <div class="card-footer"></div>
            </div>
        </td>
        <td align="center" style="padding-top:100px;">
            <div class="card border-info mb3" style="height:600px;width:800px;">
                <div class="card-header">My Chats</div>
                    <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table" table-borderless id="my_chats">
                            <tr>
                                <td></td>
                                <td><div class="card text-white bg-primary mb-3"><div class="card-body"><p class="card-text">Hello</p></div></td>
                            </tr>
                            <tr>
                                <td><div class="card text-white bg-secondary mb-3"><div class="card-body"><p class="card-text">Hello</p></div></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                    <div class="card-footer"><input class="form-control" type="text" name="chat_box" id="chat_box"><button class="btn btn-success">Send</button></div>
            </div>
        </td>
    </tr>
</table>
</center>
@include('finance.layouts.footer');