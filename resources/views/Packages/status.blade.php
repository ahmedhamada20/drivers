<!-- Modal -->
<div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cansel Orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('updatedStatusOrders')}}" method="post">
                    @csrf

                    <input type="hidden" value="{{$value->id}}" name="id">

                    <div class="row">
                        <div class="col">
                            <label>Status Orders</label>
                            <select class="form-control" name="status" required>
                                <option value="" disabled selected>-- Choose --</option>
                                <option value="cancel">cancel</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>Notes Cansel Orders</label>
                            <textarea class="form-control" name="cancel_reason" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
