 <div class="modal fade bs-example-modal-lg tampilModal" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul_form"></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="formGambar" class="needs-validation" novalidate>
                 @csrf
                 <input type="hidden" name="id" class="inputReset" id="id">
                 <input type="hidden" name="surat_id" id="surat_id" value="{{ $id }}">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="path_file">
                                     @hasrole('pegawai')
                                         Bukti Perjalanan
                                     @endhasrole
                                     @hasrole('kepegawaian')
                                         Kwitansi Tiket
                                     @endhasrole
                                 </label>
                                 <input type="file" accept="image/*" id="foto" name="path_file">
                                 <div class="row">
                                     <div class="col-6">
                                         <div class="image-preview"></div>
                                     </div>
                                     <div class="col-4 ml-4" id="container_foto_lama">
                                         <div class="foto_lama"></div>
                                     </div>
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
