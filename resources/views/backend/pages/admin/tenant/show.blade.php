@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        {{ $title ?? get_phrase('Tenant Details') }}
                    </div>
                    <div class="actions">
                        <a href="{{ route('admin.tenants.edit', $tenant) }}" class="btn btn-sm yellow">
                            <i class="fa fa-edit"></i> {{ get_phrase('Edit') }}
                        </a>
                        <a href="{{ route('admin.tenants.index') }}" class="btn btn-sm default">
                            <i class="fa fa-list"></i> {{ get_phrase('Back to list') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @if(isset($tenant))
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 240px;">{{ get_phrase('ID') }}</th>
                                    <td>{{ $tenant->id }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Name') }}</th>
                                    <td>{{ $tenant->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Email') }}</th>
                                    <td>{{ $tenant->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Contact') }}</th>
                                    <td>{{ $tenant->contact ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('House Owner') }}</th>
                                    <td>{{ optional($tenant->owner)->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Created At') }}</th>
                                    <td>{{ optional($tenant->created_at)->format('Y-m-d H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Updated At') }}</th>
                                    <td>{{ optional($tenant->updated_at)->format('Y-m-d H:i') }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>{{ get_phrase('No tenant data found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


