
<div class="modal fade" id="tambah-pemasukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemasukan Kas Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action={{url('/kas-pemasukan/add')}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Uraian</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="uraian">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Pemasukan</label> 
                <input type="number" min ="1" class="form-control" placeholder="" name="kas" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="" name="tanggal" >

                {{-- max="2022-12-31" min="2022-12-31" --}}
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
</div>
</div>
</div>
