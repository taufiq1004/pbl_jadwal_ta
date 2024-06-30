@extends('layouts.backend.template')
@section('content')

<div class="box-body">
    <div class="table-responsive">
        <form action="" method="post" name="signupForm" class="cmxform" id="signupForm" autocomplete="off">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Materi Penilaian</th>
                        <th>Bobot(%)</th>
                        <th>Skor</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td colspan="4">PRESENTASI</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Sikap dan Penampilan</td>
                        <td style="text-align:right;">
                            <input type="text" id="bobot_1" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                        </td>
                        <td>
                            <div class="form">
                                <input id="1" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                <input id="hiddenInput" class="form-control" type="hidden" value="14" name="id_penilian[]">
                            </div>
                        </td>
                        <td>
                            <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_1" type="text" class="total" name="total[]" size="3" readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Komunikasi dan Sistematika</td>
                        <td style="text-align:right;">
                            <input type="text" id="bobot_2" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                        </td>
                        <td>
                            <div class="form">
                                <input id="2" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                <input id="hiddenInput" class="form-control" type="hidden" value="15" name="id_penilian[]">
                            </div>
                        </td>
                        <td>
                            <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_2" type="text" class="total" name="total[]" size="3" readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Penguasaan Materi</td>
                        <td style="text-align:right;">
                            <input type="text" id="bobot_3" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                        </td>
                        <td>
                            <div class="form">
                                <input id="3" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                <input id="hiddenInput" class="form-control" type="hidden" value="16" name="id_penilian[]">
                            </div>
                        </td>
                        <td>
                            <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_3" type="text" class="total" name="total[]" size="3" readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td colspan="4">MAKALAH</td>
                    </tr>
                    <tr>
                            <td></td>
                            <td>Identifikasi Masalah, tujuan dan kontribusi penelitian</td>
                            <td style="text-align:right;">
                                <input type="text" id="bobot_4" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                            </td>
                            <td>
                                <div class="form">
                                    <input id="4" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                    <input id="hiddenInput" class="form-control" type="hidden" value="18" name="id_penilian[]">
                                </div>
                            </td>
                            <td>
                                <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_4" type="text" class="total" name="total[]" size="3" readonly="readonly">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Relevansi teori/ referensi pustaka dan konsep dengan masalah penelitian</td>
                            <td style="text-align:right;">
                                <input type="text" id="bobot_5" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                            </td>
                            <td>
                                <div class="form">
                                    <input id="5" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                    <input id="hiddenInput" class="form-control" type="hidden" value="19" name="id_penilian[]">
                                    <td>
                                        <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_5" type="text" class="total" name="total[]" size="3" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Metoda/Algoritma yang digunakan</td>
                                    <td style="text-align:right;">
                                        <input type="text" id="bobot_6" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                                    </td>
                                    <td>
                                        <div class="form">
                                            <input id="6" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                            <input id="hiddenInput" class="form-control" type="hidden" value="20" name="id_penilian[]">
                                        </div>
                                    </td>
                                    <td>
                                        <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_6" type="text" class="total" name="total[]" size="3" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Hasil dan Pembahasan</td>
                                    <td style="text-align:right;">
                                        <input type="text" id="bobot_7" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                                    </td>
                                    <td>
                                        <div class="form">
                                            <input id="7" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                            <input id="hiddenInput" class="form-control" type="hidden" value="21" name="id_penilian[]">
                                        </div>
                                    </td>
                                    <td>
                                        <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_7" type="text" class="total" name="total[]" size="3" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kesimpulan dan Saran</td>
                                    <td style="text-align:right;">
                                        <input type="text" id="bobot_8" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                                    </td>
                                    <td>
                                        <div class="form">
                                            <input id="8" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                            <input id="hiddenInput" class="form-control" type="hidden" value="22" name="id_penilian[]">
                                        </div>
                                    </td>
                                    <td>
                                        <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_8" type="text" class="total" name="total[]" size="3" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Penggunaan Bahasa dan Tata tulis</td>
                                    <td style="text-align:right;">
                                        <input type="text" id="bobot_9" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                                    </td>
                                    <td>
                                        <div class="form">
                                            <input id="9" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                            <input id="hiddenInput" class="form-control" type="hidden" value="23" name="id_penilian[]">
                                        </div>
                                    </td>
                                    <td>
                                        <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_9" type="text" class="total" name="total[]" size="3" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td colspan="4">PRODUK</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kesesuaian fungsionalitas sistem</td>
                                    <td style="text-align:right;">
                                        <input type="text" id="bobot_10" name="bobot[]" size="2" maxlength="2" onblur="calculateTotal()">
                                    </td>
                                    <td>
                                        <div class="form">
                                            <input id="10" class="required" size="5" text-align="center" onblur="nilaiMutu(this.value,this.id)" type="text" name="nilai[]">
                                            <input id="hiddenInput" class="form-control" type="hidden" value="17" name="id_penilian[]">
                                        </div>
                                    </td>
                                    <td>
                                        <input style="text-align:center; background-color:#D0F5A9; font-weight:bold;" id="nm_10" type="text" class="total" name="total[]" size="3" readonly="readonly">
                                    </td>
                                </tr>
                                <tr valign="center">
                                    <td colspan="4" align="right"><b>Total</b></td>
                                    <td>
                                        <input type="text" style="text-align:center; background-color:#D0F5A9; font-weight:bold;" value="0" size="3" id="nilai_sidang" name="PendaftaranSidangPKL[nilai_sidang]" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">Revisi</td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div class="form">
                                            <textarea class="form-control" rows="5" name="revisi" id="revisi">Silahkan Lihat Di Laporan...</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input readonly="readonly" type="hidden" value="669" name="id_tgsAkhir" id="id_tgsAkhir">
                        <input type="submit" value="Simpan" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
            
            <script type="text/javascript">
                function nilaiMutu(val, id) {
                    if (val == "" || val == null) {
                        document.getElementById(id).value = '';
                        return;
                    }
                    document.getElementById('nm_' + id).value = (document.getElementById('bobot_' + id).value * val) / 100;
                    countgrandtotal();
                }
            
            
            
                function countgrandtotal() {
            
                    var sum = 0;
                    $('.total').each(function() {
                        sum += Number($(this).val());
                    });
            
                    $('#nilai_sidang').val(sum);
            
                }
            
                $(document).ready(function() {
                    // validate the comment form when it is submitted
                    $("#signupForm").validate({
                        rules: {
                            "nilai[]": "required",
                            "revisi": "required",
                        },
                        messages: {
            
                        }
                    });
                });
                </script>
</div>

@endsection                