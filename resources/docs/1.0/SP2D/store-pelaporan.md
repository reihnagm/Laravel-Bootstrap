## Proses Penyimpanan Store Pelaporan

Pada saat klik tombol “Simpan” Data akan melalui proses penyimpanan pada masing masing table, yang mana pada proses pertama data akan dulu tersimpan pada Model **MSPTPDSP2D** atau jika di table sebenarnya adalah **TBL_M_SPTPD_SP2D**, lalu proses kedua pada Model **DBayarSPTPDSP2D** atau jika di table sebenarnya adalah **TBL_D_BAYAR_SPTPD_SP2D**, berlanjut pada Model **PdkgSPTPDSP2D** atau jika di table sebenarnya adalah **TBL_D_PDKG_SPTPD_SP2D**, dan terahkir disimpan pada Model **InfoSPTPDSP2D** atau jika di table sebenarnya adalah **TBL_INFO_SPTPD_SP2D**.

## Kolom yang diperlukan pada saat insert ke model MSPTPDSP2D

> * id (di dapat dari sequence **SEQ_M_SPTPD_SP2D**)
> * npwpd
> * jenispajak
> * idklasifikasi
> * sanksiadministrasi
> * pajaksudahbayar
> * pajaklebihbayar
> * pajakkurangbayar
> * nopd
> * masapajak
> * tahunpajak
> * jumlahcetak
> * dpp
> * tarifpajak

## Kolom yang diperlukan pada saat insert ke model DBayarSPTPDSP2D

> * idsptpd (di dapat dari id pada model **MSPTPDSP2D** kolom id)
> * idfasilitas
> * fasilitaslain
> * jumlah

## Kolom yang diperlukan pada saat insert ke model PdkgSPTPDSP2D

> * idsptpd (di dapat dari id pada model **MSPTPDSP2D** kolom id)
> * idpendukung
> * islampiran
> * pdkglain
> * filelampiran
> * filetype

## Kolom yang diperlukan pada saat insert ke model InfoSPTPDSP2D

> * idsptpd (di dapat dari id pada model **MSPTPDSP2D** kolom id)
> * kodeinfo
> * nilai
