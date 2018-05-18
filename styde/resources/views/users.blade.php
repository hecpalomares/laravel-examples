@include('header')
<div class="container">
    <div class="row mt-3">
        <div class="col-8">
            <h2>Users</h1>
    
            @if(!empty($users))
                <ul>
                    @foreach ($users as $user)
                        <li>{{$user}}</li>
                    @endforeach
                </ul>
            @else 
                <p>No users registered.</p>
            @endif
        </div>
        <div class="col-4">
            @include('sidebar')
        </div>
    </div>
</div>
@include('footer')