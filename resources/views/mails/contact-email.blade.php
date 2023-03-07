@extends('layouts.email',['subject'=>'Email phản hồi thành công'])
@section('content')
    <tr>
        <td class="content-block">
            Xin chào Luxury Travel
        </td>
    </tr>
    <tr>
        <td class="content-block">
            <p>Name: {{ $name }}</p>
            <p>Email: {{ $email }}</p>
            <p>Thông điệp của tôi tới Luxury Travel:<br> {{ $content }}</p>
        </td>
    </tr>
@endsection

