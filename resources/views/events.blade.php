<?php
/**
 * Created by PhpStorm.
 * User: Darkdady
 * Date: 04/19/18
 * Time: 21:12
 */
?>

@extends('layouts.headAndFoot')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading text-uppercase">évènements</h1>
            <p class="lead text-muted mb-0">Liste complète des évènements a venir</p>
        </div>
    </section>

    <div class="container">
        <div class="row" id="event-container">
        </div>
        <div class="col-12">
            <nav aria-label="...">
                <ul id="pagination" class="pagination">

                </ul>
            </nav>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/event-list.js') }}"></script>
@endsection