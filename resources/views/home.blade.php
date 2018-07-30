@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="content">            
        <form action="/approved" method="post">
        @csrf
            <ul class="">
                
                @if( !empty( $notapproved ) )
                @foreach ($notapproved as $forapproved)
                <li>
                    <input type="hidden" value="{{ $forapproved->id }}"  id="id"  name="id" >
                    <div class="form-group">
                        <label for="username">User ID</label>
                        <input type="text" name="username" class="form-control" id="username" value="{{ $forapproved->user_name }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="idea">Your Idea</label>
                        <textarea class="form-control" name="shoutidea" id="" cols="" rows="5" value="">{{ $forapproved->shout_idea }}</textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="approved" value="approved">Approve</button>
                        <button class="btn btn-danger" type="submit"  name="cancel" value="cancel">Block</button>
                    </div>         
                </li>
                @endforeach
                @else

                <div class="text-center">
                    <p>No New ideas</p>
                </div>
                @endif
            </ul>
        </form>   
    </div>
</div>


<div class="container topspace">
    <h4 class="text-center">Rejected ideas</h4>
    <ul class="">                
        @if( !empty( $rejected ) )
        @foreach ($rejected as $reject)
        <li>
            <input type="hidden" value="{{ $reject->id }}"  id="id"  name="id" >
            <div class="form-group">
                <label for="username">User ID</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ $reject->user_name }}">
            </div>
            
            <div class="form-group">
                <label for="idea">Your Idea</label>
                <textarea class="form-control" name="shoutidea" id="" cols="" rows="5" value="">{{ $reject->shout_idea }}</textarea>
            </div> 
        </li>
        @endforeach
        @else

        <div class="text-center">
            <p>No Rejected ideas</p>
        </div>
        @endif
    </ul>
</div>

@endsection
