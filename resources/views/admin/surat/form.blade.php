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
                 <input type="hidden" name="jenis_surat" id="jenis_surat" value="{{ $jenis }}">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="no_surat" class="form-label">No. {{ $jenis }}</label>
                                 <input id="no_surat" name="no_surat" class="form-control inputReset" type="text"
                                     required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="tgl_surat" class="form-label">Tgl. Surat</label>
                                 <div class="input-group" id="cont_tgl_surat">
                                     <input type="text" name="tgl_surat" id="tgl_surat" class="form-control"
                                         placeholder="dd M yyyy" data-date-format="dd M yyyy"
                                         data-date-container='#cont_tgl_surat' data-provide="datepicker"
                                         data-date-autoclose="true" autocomplete="off" required>
                                     <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 </div>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
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
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="dasar" class="form-label">Dasar</label>
                                 <input id="dasar" name="dasar" class="form-control inputReset" type="text" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>

                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="dari" class="form-label">Dari</label>
                                 <input id="dari" name="dari" class="form-control inputReset" type="text" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="tujuan" class="form-label">Tujuan</label>
                                 <input id="tujuan" name="tujuan" class="form-control inputReset" type="text" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="maksud" class="form-label">Maksud</label>
                                 <input id="maksud" name="maksud" class="form-control inputReset" type="text" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="alat_angkut" class="form-label">Alat angkut</label>
                                 <input id="alat_angkut" name="alat_angkut" class="form-control inputReset" type="text"
                                     required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="lama" class="form-label">Lama (Hari)</label>
                                 <input id="lama" name="lama" class="form-control inputReset" type="number" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="tgl_berangkat" class="form-label">Tgl. Berangkat</label>
                                 <input id="tgl_berangkat" name="tgl_berangkat" class="form-control inputReset"
                                     type="text" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="mb-3">
                                 <label for="tgl_kembali" class="form-label">Tgl. Kembali</label>
                                 <input id="tgl_kembali" name="tgl_kembali" class="form-control inputReset" type="text"
                                     required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="beban_anggaran" class="form-label">Beban anggaran</label>
                                 <input id="beban_anggaran" name="beban_anggaran" class="form-control inputReset"
                                     type="text" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="mata_anggaran" class="form-label">Mata anggaran</label>
                                 <input id="mata_anggaran" name="mata_anggaran" class="form-control inputReset"
                                     type="text" required>
                                 <div class="invalid-feedback">
                                     Data Tidak Boleh Kosong
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="keterangan" class="form-label">Keterangan</label>
                                 <input id="keterangan" name="keterangan" class="form-control inputReset" value="-">
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
