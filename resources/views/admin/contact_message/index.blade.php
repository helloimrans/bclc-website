@extends('admin.layouts.master')
@section('title', 'Show Contact Message')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Show Contact Message</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Show Contact Message
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>mobile</th>
                                            <th>email</th>
                                            <th>subject</th>
                                            <th>message</th>
                                            <th>Status </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contact_messages as $contact_message)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $contact_message->name }}</td>
                                                <td>{{ $contact_message->mobile }}</td>
                                                <td>{{ $contact_message->email }}</td>
                                                <td>{{ $contact_message->subject }}</td>
                                                <td>{{ $contact_message->message }}</td>    
                                                
                                                

                                                
                                               <td>                                                
                                                    <span class=" "></span>
                                              
                                                </td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
