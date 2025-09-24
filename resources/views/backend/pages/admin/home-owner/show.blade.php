@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        {{ $title ?? get_phrase('Owner Details') }}
                    </div>
                    <div class="actions">
                        <a href="{{ route('admin.owners.create') }}" class="btn btn-sm green">
                            <i class="fa fa-plus"></i> {{ get_phrase('Add House Owner') }}
                        </a>
                        @if(isset($owner))
                            <a href="{{ route('admin.owners.edit', $owner) }}" class="btn btn-sm yellow">
                                <i class="fa fa-edit"></i> {{ get_phrase('Edit') }}
                            </a>
                        @endif
                        <a href="{{ route('admin.owners.index') }}" class="btn btn-sm default">
                            <i class="fa fa-list"></i> {{ get_phrase('Back to list') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @if(isset($owner))
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 240px;">{{ get_phrase('ID') }}</th>
                                    <td>{{ $owner->id }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Name') }}</th>
                                    <td>{{ $owner->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Email') }}</th>
                                    <td>{{ $owner->email }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Building Name') }}</th>
                                    <td>{{ $owner->building_name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Building Address') }}</th>
                                    <td>{{ $owner->building_address ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Created At') }}</th>
                                    <td>{{ optional($owner->created_at)->format('Y-m-d H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ get_phrase('Updated At') }}</th>
                                    <td>{{ optional($owner->updated_at)->format('Y-m-d H:i') }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>{{ get_phrase('No owner data found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


