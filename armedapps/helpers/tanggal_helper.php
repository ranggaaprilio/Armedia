<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function tgl_indo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 6, 4);
    $bulan = substr($date, 0, 2);
    $tgl   = substr($date, 3, 2);

    $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
    return ($result);
}

function tgl_dashboard($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 6, 4);
    $bulan = substr($date, 0, 2);
    $tgl   = substr($date, 3, 2);

    $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
    return ($result);
}

function format($date)
{
    $tahun = substr($date, 6, 4);
    $bulan = substr($date, 0, 2);
    $tgl   = substr($date, 3, 2);
    $result =$tahun. '-'. $bulan. '-'. $tgl;
    return ($result);
}
