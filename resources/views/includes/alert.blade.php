
@if($message = session("success"))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                <strong>Success</strong> {{ $message }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
@endif

@if($message = session("error"))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
@endif

@if($message = session("info"))
    <div class="row">
        <div class="col-md-12">
            <div class="alert bg-pink">
                <strong>Notice!</strong> {{ $message }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
@endif

@if($message = session("warning"))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning">
                <strong>Warning!</strong> {{ $message }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
@endif