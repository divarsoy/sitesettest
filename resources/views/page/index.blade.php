@extends('layouts.master')

@section('title', 'Index')

@section('content')
    <h1>List over all pages</h1>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Client</th>
            <th>Site</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>
                    {{isset($page->client->name) ? $page->client->name : '' }}
                </td>
                <td>
                    {{isset($page->site->name) ? $page->site->name : '' }}
                </td>
                <td>{{$page->is_active ? 'active' : 'Not active'}}</td>
                <td>
                    <a href="{{ URL::action('PageController@edit', $page->id) }}">Edit</a> |
                    <a href="{{ URL::action('PageController@destroy', $page->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection