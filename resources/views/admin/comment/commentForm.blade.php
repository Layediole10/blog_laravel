{{-- @extends('template.user')
@section('title', "Add Article")

@section("content")
<main class="col-md-9 m-auto col-lg-10 w-100">
    <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    
    <div class="card mx-auto shadow" style="width: 25rem;">
        <div class="card">
            <div class="card-body">
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    <div class="row my-2 p-2">
                        <div class="col">
                            <div class="form-group pb-1">
                                <input type="text" class="form-control" name="first_name" placeholder="first name">
                            </div>
                            <div class="form-group pb-1">
                                <input type="text" class="form-control" name="last_name" placeholder="last name">
                            </div>
                            <div class="form-group pb-1">
                                <input type="email" class="form-control" name="email" placeholder="email">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-floating">
                            <textarea class="form-control" name="comment" placeholder="Leave a comment here"></textarea>                            
                        </div>
                    </div>

                    <button class="btn btn-md btn-primary"> <i class="bi bi-plus-circle"></i> Save</button>
                </form>
            
            </div>
        </div>
    </div>

</main>
@endsection --}}