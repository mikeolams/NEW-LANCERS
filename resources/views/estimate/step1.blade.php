@extends('layouts.app')
<!-- Select Project -->

@section('styles')
<link rel="stylesheet" href="{{asset('css/step1.css')}}"/>
@endsection


@section('content')
<div class="contaner">

<header style="border-bottom: 2px solid rgb(223, 223, 223);">
        <nav style="display: flex; ">
            <a href="#"  @click.prevent="$router.push('/estimate')" class="column-1">
                <img
                    src="https://res.cloudinary.com/mide358/image/upload/v1570621469/clear_24px_rasbwc.png"
                    alt="navIcon"
                    />
            </a>

            <div class="column-2">Create Estimate</div>
            <a href="#" @click.prevent="next" id="upperNext" class="column-3 float-right" style="border: 1px solid gray;
               background: #0ABAB5 !important;">NEXT</a>
        </nav>
    </header>


    <h1 class="">What project are you estimating?</h1>
    <h1 style="color:red;">@if(null !== session('error')) {{session('error')}} @endif</h1>
    <form method="post" action="/estimate/create/step2">
        @csrf
        <div class="row ml-auto mr-auto box justify-content-center">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">A previously created project</h5>
                        <p style="padding-bottom: 10px;" class="card-text">Find estimate for a previously created project, by doing so the
                            estimate
                            gets populated with some of the data.
                        </p>
                        <div class="contents dropdown">
                            <select class="dropbtn form-control" name="old_project" id="projectSelect">
                                <option selected value="">Select</option>
                                @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->title}}</option>
                                @endforeach
                            </select>
                            <!-- <i class="fa fa-caret-down"></i> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">A new project</h5>
                        <p class="card-text">Create a new estimate and set up a new project based on the
                            information.
                        </p>
                        <input type="text" name="new_project" id="name" placeholder="Project Name">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- @if(session('success'))<p><span class="alert alert-success">{{session('success')}}</span></p>
            @elseif(session('error'))<p><span class="">{{session('error')}}</span></p> @endif -->
        </div>
        <button type="submit" id="formNext" class="btn dark">NEXT</button>
    </form>
</div>

@endsection

@section('script')

@endsection
