@extends('layouts.master')

@section('title', 'Join the many members')

@section('content')
    <div class='top-header'>
        <h2>
            Signup to Gigs for Bands
        </h2>
        <p>
            Select your appropriate membership style
        </p>
    </div>

    <div class="tiers">
        <div class="box artist">
            <div class="title">artist</div>
            <div class="benefits">
                <ul>
                    <li><i class="fas fa-check"></i>Upload Music</li>
                    <li><i class="fas fa-check"></i>Artist Profile</li>
                </ul>
            </div>
            <div class="create-btn">
                <a href="/signup/artist" class="lg-btn">Create</a>
            </div>
        </div>

        <div class="box manager">
            <div class="title">Manager</div>
            <div class="benefits">
                <ul>
                    <li><i class="fas fa-check"></i>Ability to select users managed</li>
                    <li><i class="fas fa-check"></i>Edit Artist profiles you manage</li>
                    <li><i class="fas fa-check"></i>Upload music for artist</li>
                </ul>
            </div>
            <div class="create-btn">
                <a href="/signup/manager" class="lg-btn">Create</a>
            </div>
        </div>

        <div class="box event">
            <div class="title">Event Coordinator</div>
            <div class="benefits">
                <ul>
                    <li><i class="fas fa-check"></i>Post events for musicians for hire</li>
                </ul>
            </div>
            <div class="create-btn">
                <a href="/signup/event" class="lg-btn">Create</a>
            </div>
        </div>
    </div>
@endsection