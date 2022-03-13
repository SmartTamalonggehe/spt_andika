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
                 <input type="hidden" name="surat_id" id="surat_id" value="{{ $id }}">
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
