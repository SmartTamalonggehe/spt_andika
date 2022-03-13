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
                         <input type="hidden" name="gaji_id" id="gaji_id" value="{{ $gaji->id }}">

                         <div class="col-12 col-md-8">
                             <div class="mb-3">
                                 <label for="nm_potongan" class="form-label">Nama Potongan</label>
                                 <input type="text" class="form-control inputReset" name="nm_potongan" id="nm_potongan"
                                     required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-4">
                             <div class="mb-3">
                                 <label for="jml_potongan" class="form-label">Jumlah Potongan</label>
                                 <input id="jml_potongan" name="jml_potongan" type="text"
                                     class="form-control currency inputReset" required autocomplete="off">
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
