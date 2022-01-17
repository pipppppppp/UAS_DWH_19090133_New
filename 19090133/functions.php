<?php
error_reporting(~E_NOTICE);
session_start();

include'koneksi.php';
include'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include'includes/general.php';
    
$mod = $_GET['m'];
$act = $_GET['act'];   

$JK = array(
    'Laki-laki' => 'Laki-laki', 
    'Perempuan' => 'Perempuan',
);

function get_jk_option($selected = ''){
    global $JK;    
    foreach($JK as $key => $val){
        if($key==$selected)
            $a.="<option value='$key' selected>$val</option>";
        else
            $a.="<option value='$key'>$val</option>";
    }
    return $a;
}

function get_diagnosa_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT id_cust, nama FROM dim_cust ORDER BY id_cust");
    foreach($rows as $row){
        if($row->id_cust==$selected)
            $a.="<option value='$row->id_cust' selected>[$row->id_cust] $row->nama</option>";
        else
            $a.="<option value='$row->id_cust'>[$row->id_cust] $row->nama</option>";
    }
    return $a;
}

function get_gejala_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala ORDER BY kode_gejala");
    foreach($rows as $row){
        if($row->kode_gejala==$selected)
            $a.="<option value='$row->kode_gejala' selected>[$row->kode_gejala] $row->nama_gejala</option>";
        else
            $a.="<option value='$row->kode_gejala'>[$row->kode_gejala] $row->nama_gejala</option>";
    }
    return $a;
}