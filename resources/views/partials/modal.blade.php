@push('css')
    <style>
        footer{
            /* background-color: rgb(189, 224, 189); */
        }
    </style>
@endpush
<br>
    <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>

<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Notification</h4>
            </div>
            <div class="modal-body">
                Hello, thanks to visit my website !
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

