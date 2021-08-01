@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.importexportoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">Import</div>
                    <div class="card-body">
                        <h2 align="center" style="color:green; font-size:20px;">Select a valid JSON file:</h2>
                        <input class="form-control" type="file" name="importfile" id="importfile" accept="*/*"><span id="err_importfile" style="color:red;">{{$errors->first('importfile')}}</span>
                    </div>
                    <div class="card-footer"><input type="submit" name="submit-button" class="btn btn-success" value="Import"></div>
                </div>
                </form>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')