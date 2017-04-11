@extends('app')

@section('content')
    <form method="POST" action="{{url('subscribers')}}">
        {{csrf_field()}}

        <div class="row">
            <div class="column medium-6">

                <div class="column medium-6">
                    <label>File Name:</label>
                    <input type="text" name="file_name"/>
                </div>

                <div class="column medium-6">
                    <label>File Type:</label>
                    <select name="file_type">
                        <option value="csv" selected>CSV</option>
                        <option value="xml">XML</option>
                    </select>
                </div>

                <div class="column medium-6">
                    <label>Transfer Type:</label>
                    <select name="transfer_type">
                        <option value="sftp" selected>SFTP</option>
                        <option value="scp">SCP</option>
                    </select>
                </div>

                <div class="column medium-6">
                    <div class="submit-align">
                        <input type="submit" class="button small" value="Import"/>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection