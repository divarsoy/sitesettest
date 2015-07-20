@extends('layouts.master')

@section('title', 'Show ' . $page->title)

@section('content')
    <h1>Showing {{$page->title}}</h1>
    <table class="table">
        <tr>
            <td>Title</td>
            <td>
                {{$page->title}}
            </td>
        </tr>
        <tr>
            <td>Content</td>
            <td>
                {{ $page->content }}
            </td>
        </tr>
        <tr>
            <td>
                Client
            </td>
            <td>
                {{ isset($page->client->name) ? $page->client->name : '' }}
            </td>
        </tr>
        <tr>
            <td>
                Site
            </td>
            <td>
                {{ isset($page->site->name) ? $page->site->name : '' }}
            </td>
        </tr>
    </table>
    <a href="{{ URL::action('PageController@index') }}">Back to index</a>
@endsection