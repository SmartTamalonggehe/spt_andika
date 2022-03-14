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
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="surat_id" class="form-label">No SPT</label>
                                 <select class="select2_basic selectReset" name="surat_id" id="surat_id"
                                     style="width: 100%;" required>
                                     <option value="" selected disabled>--Pilih SPT--</option>
                                     @foreach ($surat as $item)
                                         <option value="{{ $item->id }}">{{ $item->no_surat }}
                                         </option>
                                     @endforeach
                                 </select>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-lg-3">
                             <div class="mb-3">
                                 <label for="tgl_kwitansi" class="form-label">Tgl. Kwitansi</label>
                                 <div class="input-group" id="cont_tgl_kwitansi">
                                     <input type="text" name="tgl_kwitansi" id="tgl_kwitansi" class="form-control"
                                         placeholder="dd M yyyy" data-date-format="dd M yyyy"
                                         data-date-container='#cont_tgl_kwitansi' data-provide="datepicker"
                                         data-date-autoclose="true" autocomplete="off" required>
                                     <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 </div>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-lg-5">
                             <div class="mb-3">
                                 <label for="kode_rek" class="form-label">Kode Rek.</label>
                                 <input type="text" class="form-control inputReset" name="kode_rek" id="kode_rek"
                                     required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-lg-4">
                             <div class="mb-3">
                                 <label for="jumlah_ditetapkan" class="form-label">Jumlah yang
                                     ditetapkan</label>
                                 <input id="jumlah_ditetapkan" type="text" name="jumlah_ditetapkan"
                                     class="form-control currency inputReset" required autocomplete="off">
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>

                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="terima" class="form-label">Terima Dari</label>
                                 <input type="text" class="form-control inputReset" name="terima" id="terima" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-lg-7">
                             <div class="mb-3">
                                 <label for="jumlah_terima" class="form-label">Jumlah yang diterima</label>
                                 <input id="jumlah_terima" type="text" name="jumlah_terima"
                                     class="form-control currency inputReset" required autocomplete="off">
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-lg-5">
                             <div class="mb-3">
                                 <label for="tgl_terima" class="form-label">Tgl. Terima</label>
                                 <div class="input-group" id="cont_tgl_terima">
                                     <input type="text" name="tgl_terima" id="tgl_terima" class="form-control"
                                         placeholder="dd M yyyy" data-date-format="dd M yyyy"
                                         data-date-container='#cont_tgl_terima' data-provide="datepicker"
                                         data-date-autoclose="true" autocomplete="off" required>
                                     <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 </div>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>


                         <div class="col-12 col-lg-6">
                             <div class="mb-3">
                                 <label for="pergi" class="form-label">Tiket Pergi</label>
                                 <input id="pergi" type="text" name="pergi" class="form-control currency inputReset"
                                     required autocomplete="off">
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-lg-6">
                             <div class="mb-3">
                                 <label for="pulang" class="form-label">Tiket Pulang</label>
                                 <input id="pulang" type="text" name="pulang" class="form-control currency inputReset"
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
