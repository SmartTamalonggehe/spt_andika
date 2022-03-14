 <div class="modal fade bs-example-modal-lg tampilModal" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul_form"></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="formKu" class="needs-validation" novalidate>
                 @csrf
                 <input type="hidden" name="id" class="inputReset" id="id">
                 <div class="modal-body">
                     <div class="row">
                         {{-- gaji id --}}
                         <input type="hidden" name="kwitansi_id" id="kwitansi_id" value="{{ $id }}">

                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="uraian" class="form-label">Uraian</label>
                                 <input type="text" class="form-control inputReset" name="uraian" id="uraian" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-lg-3">
                             <div class="mb-3">
                                 <label for="lama" class="form-label">Lama</label>
                                 <input type="number" class="form-control inputReset" name="lama" id="lama" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-lg-9">
                             <div class="mb-3">
                                 <label for="jumlah" class="form-label">Jumlah</label>
                                 <input id="jumlah" name="jumlah" type="text" class="form-control currency inputReset"
                                     required autocomplete="off">
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                         <button type="submit" class="btn btn-primary" id="tombolForm"></button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
