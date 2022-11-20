@extends('app.app')

@section('content')



<!-- Masthead-->
<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Servies!</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>
        </br>

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Messages</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table w-auto">
                <thead>
                    <tr>
                        <th class="w-auto">id</th>
                        <th class="w-auto">name</th>
                        <th class="w-auto">email</th>
                        <th class="w-auto">Phone</th>
                        <th class="w-auto">message</th>
                        <th class="w-auto">Actions</th>
                    </tr>
                </thead>
                <tbody>
        @foreach($contacts as $contact)

                    <tr>
                        <td class="w-auto"> {{ $contact->id }}</td>
                        <td class="w-auto"> {{ $contact->name }}</td>
                        <td class="w-auto"> {{ $contact->email }}</td>
                        <td class="w-auto"> {{ $contact->phone }}</td>
                        <td class="w-auto"> {{ $contact->message }}</td>
                        <td align="center">
                                <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                        </td>
                    </tr>
        @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
