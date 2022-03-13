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
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="NIP" class="form-label">NIP</label>
                                 <input type="text" class="form-control inputReset" name="NIP" id="NIP"
                                     placeholder="NIP" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="nama" class="form-label">Nama</label>
                                 <input type="text" class="form-control inputReset" name="nama" id="nama"
                                     placeholder="Nama" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="bidang" class="form-label">Bidang</label>
                                 <input type="text" class="form-control inputReset" name="bidang" id="bidang"
                                     placeholder="Bidang" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="bagian" class="form-label">Bagian</label>
                                 <input type="text" class="form-control inputReset" name="bagian" id="bagian"
                                     placeholder="Bagian" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-9">
                             <div class="mb-3">
                                 <label for="pangkat" class="form-label">Pangkat</label>
                                 <input type="text" class="form-control inputReset" name="pangkat" id="pangkat"
                                     placeholder="Pangkat" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-3">
                             <div class="mb-3">
                                 <label for="golongan" class="form-label">Golongan</label>
                                 <input type="text" class="form-control inputReset" name="golongan" id="golongan"
                                     placeholder="Golongan" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="jabatan" class="form-label">Jabatan</label>
                                 <input type="text" class="form-control inputReset" name="jabatan" id="jabatan"
                                     placeholder="Jabatan" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="instansi" class="form-label">Instansi</label>
                                 <input type="text" class="form-control inputReset" name="instansi" id="instansi"
                                     placeholder="Instansi" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="tingkat" class="form-label">Tingkat</label>
                                 <input type="text" class="form-control inputReset" name="tingkat" id="tingkat"
                                     placeholder="Tingkat" required>
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
