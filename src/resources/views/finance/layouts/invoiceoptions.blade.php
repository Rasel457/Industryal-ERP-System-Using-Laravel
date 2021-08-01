<div class="card border-warning mb3" style="height:600px;width:250px">
                <div class="card-header">Invoice Options</div>
                    <div class="card-body">
                        <table align="left">
                        <div class="btn-group-vertical">
                            <a class="btn btn-info text-left" href="{{route('finance.invoice.listcustomer')}}"><i class="fas fa-list"></i> Customer Invoices</a>
                            <a class="btn btn-info text-left" href="{{route('finance.invoice.listsupplier')}}"><i class="fas fa-list"></i> Supplier Invoices</a>
                            <a class="btn btn-info text-left" href="{{route('finance.invoice.customer')}}"><i class="fas fa-plus"></i> New Customer Invoice</a>
                            <a class="btn btn-info text-left" href="{{route('finance.invoice.supplier')}}"><i class="fas fa-plus"></i> New Supplier Invoice</a>
                        </div>
                        </table>
                    </div>
                </div>