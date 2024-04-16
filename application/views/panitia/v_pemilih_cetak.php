<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cetak Tiket Pemilihan</title>
    <style type="text/css">
        .judul {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16pt;
            font-weight: bold;
        }

        .kode {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20pt;
            font-weight: bold;
        }

        .cetak {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12pt;
        }
    </style>
</head>

<body>
    <?php foreach ($pemilih as $row) { ?>
        <table width="100%" border="1" bordercolor="#778899" cellspacing="0" cellpadding="0">
            <tr bgcolor="#3CB371">
                <td height="40" colspan="3" align="center" valign="middle" class="judul">KARTU PEMILIHAN E-VOTING</td>
            </tr>
            <tr>
                <td width="15%" height="104" align="center" valign="middle" class="kode"><?= $row->KODE ?></td>
                <td width="10%" align="center" valign="middle"><img src="<?= base_url() ?>/file/foto/<?= $row->FOTO ?>" height="60" width="50" /></td>
                <td width="85%" align="left" valign="middle">
                    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
                        <tr>
                            <td width="23%"><span class="cetak">NBM</span></td>
                            <td width="7%" align="center" valign="middle"><span class="cetak">:</span></td>
                            <td width="70%"><span class="cetak"><b><?= $row->NBM ?></b></span></td>
                        </tr>
                        <tr>
                            <td><span class="cetak">Nama Lengkap </span></td>
                            <td align="center" valign="middle"><span class="cetak">:</span></td>
                            <td><span class="cetak"><b><?= $row->NM_PEMILIH ?></b></span></td>
                        </tr>
                        <tr>
                            <td><span class="cetak">Kode E-Voting</span></td>
                            <td align="center" valign="middle"><span class="cetak">:</span></td>
                            <td><span class="cetak"><b><?= $row->KODE ?></b></span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center" valign="middle">&nbsp;</td>
            </tr>
        </table><br>
    <?php } ?>
</body>

</html>