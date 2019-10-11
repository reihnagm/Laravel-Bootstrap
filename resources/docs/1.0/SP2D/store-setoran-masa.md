## Proses Penyimpanan Store Setoran Masa

Data akan melalui proses penyimpanan pada masing masing table, yang mana pada proses pertama data akan dulu tersimpan pada Model **MSSPD** atau jika di table sebenarnya adalah **TBL_M_SSPD**, lalu proses kedua pada Model **DSSPD** atau jika di table sebenarnya adalah **TBL_D_SSPD**, berlanjut pada Model **MBayarPajak** atau jika di table sebenarnya adalah **TBL_M_BAYAR_PAJAK**, dan terahkir disimpan pada Model **DBayarPajak** atau jika di table sebenarnya adalah **TBL_D_BAYAR_PAJAK**.

## Kolom yang diperlukan pada saat insert ke model MSSPD

> * sspdid (di dapat dari **SEQ_SSPD**)
> * pajakuserid (di dapat dari model **MSSPD** kolom sspdid)
> * masapajak
> * tahunpajak
> * ipaddress
> * noobjekpajak

## Kolom yang diperlukan pada saat insert ke model DSSPD

> * id (di dapat dari **SEQ_SSPD_DETAIL**)
> * sspdid (di dapat dari model **MSSPD** kolom id)
> * jenissetoranid (di dapat dari model **RefJenisSetoran** kolom jenissetoranid)
> * norekening
> * jumlah

##  Kolom yang diperlukan pada saat insert ke model MbayarPajak

> * kodebayar
> * kode
> * tglpermohonan
> * userid
> * carabayarid
> * status
> * sspd_input

## Kolom yang diperlukan pada saat insert ke model DBayarPajak

> * bayarpajakdetilid (di dapat dari sequence **SEQ_M_BAYAR_PAJAK**)
> * bayarpajakid (di dapat dari model **MBayarPajak** kolom bayarpajakid)
> * pajakuserid (di dapat dari model **MSSPD** kolom sspdid)
> * nilai
> * thnpajak
> * masapajak
> * tanggal
> * pokok
> * bunga
> * denda
> * sanksi
> * npwpd
> * no_skpd
> * kd_rekening
> * kd_bunga
> * kd_denda
> * kd_sanksi
> * nama_objek
> * alamat_objek
