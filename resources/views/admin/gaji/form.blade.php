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
                                 <label for="pegawai_id" class="form-label">Pegawai</label>
                                 <select class="select2_basic selectReset" name="pegawai_id" id="pegawai_id"
                                     style="width: 100%;" required>
                                     <option value="" selected disabled>--Pilih Pegawai--</option>
                                     @foreach ($pegawai as $item)
                                         <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->NIP }}
                                         </option>
                                     @endforeach
                                 </select>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-9">
                             <div class="mb-3">
                                 <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                 <input id="gaji_pokok" type="text" name="gaji_pokok"
                                     class="form-control currency inputReset" required autocomplete="off">
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-3">
                             <div class="mb-3">
                                 <label for="pembulatan" class="form-label">Pembulatan</label>
                                 <input id="pembulatan" type="text" name="pembulatan"
                                     class="form-control currency inputReset" required autocomplete="off">
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="tgl_gaji" class="form-label">Tgl. Gaji</label>
                                 <div class="input-group" id="cont_tgl_gaji">
                                     <input type="text" name="tgl_gaji" id="tgl_gaji" class="form-control"
                                         placeholder="dd M yyyy" data-date-format="dd M yyyy"
                                         data-date-container='#cont_tgl_gaji' data-provide="datepicker"
                                         data-date-autoclose="true" autocomplete="off" required>
                                     <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
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
