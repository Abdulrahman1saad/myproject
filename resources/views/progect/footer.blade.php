<div class="card-footer border-0 bg-transparent">
    <div class="d-flex text-body-secondary small">
        <div class="d-flex align-items-center me-3">
            <img src="/images/clock.svg" alt="clock" >
            <div class="mms-1">
                {{ $progect->created_at->diffForHumans() }}
            </div>
        </div>
        <div class="d-flex align-items-center me-3">  
            <img src="/images/list-check.svg" alt="list-check.svg" >
        </div>
        <div class="d-flex align-items-center me-auto">
            <form action="/progects{{ $progect->id }}" method="POST" class="hide-submit">
               @csrf
               @method('DELETE')
               <input type="submit" class="btn btn-delete mt-2" value""">
    </div>
</div>
