@extends('layouts.app')

@section('title', 'Monthly Payment Report')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Monthly Payment Report</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Paid Month</th>
                                <th>Payment Amount</th>
                                <th>Expired Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authenticate_user_monthly_reports as $key => $user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ date("F", strtotime($user->created_at)) }}</td>
                                    <td>$ {{ $user->amount }}</td>
                                    <td>{{ $user->deactivated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
