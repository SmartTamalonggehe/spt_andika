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
                 <input type="hidden" name="name" value="Pegawai" id="name">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="pegawai-id" class="form-label">Pegawai</label>
                                 <select class="select2_basic selectReset" name="pegawai_id" id="pegawai-id"
                                     style="width: 100%;" required>
                                 </select>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="email" class="form-label">Email</label>
                                 <input type="Email" class="form-control inputReset" name="email" id="email"
                                     placeholder="email" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="password" class="form-label">Password</label>
                                 <input type="password" class="form-control inputReset" name="password" id="password"
                                     placeholder="Password" required>
                                 <div class="toogle-password">
                                     <i class="ri-eye-off-line"></i>
                                 </div>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                 <input type="password" class="form-control inputReset" name="password_confirmation"
                                     id="password_confirmation" placeholder="Konfirmasi Password" required>
                                 <div class="toogle-password">
                                     <i class="ri-eye-off-line"></i>
                                 </div>
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
