<?php
class Paging
{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas)
{
if(empty($_GET[page])){
$posisi=0;
$_GET[page]=1;
}
else{
$posisi = ($_GET[page]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas)
{
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 ... Next, Prev, First, Last
function navHalaman($halaman_aktif, $jmlhalaman)
{
$link_halaman = "<div class=paging>";
$hal = $_GET['halaman'];

// Link First dan Previous
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<span class=prevnext><a href='".$_SERVER[PHP_SELF]."?halaman=".$hal."&page=".$previous."'>
&laquo; Prev</a></span> ";
}
else
{
$link_halaman .= "<span class=disabled>&laquo; Prev</span> ";
}

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++)
{
if ($i == $halaman_aktif)
{
$link_halaman .= " <span class=current>$i</span> ";
}
else
{
$link_halaman .= " <a href='".$_SERVER[PHP_SELF]."?halaman=".$hal."&page=".$i."'>$i</a> ";
}
$link_halaman .= " ";
}

// Link Next dan Last
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= "<span class=prevnext><a href='".$_SERVER[PHP_SELF]."?halaman=".$hal."&page=".$next."'>Next &raquo;</a>	 </span>";
}

else {
$link_halaman .= "<span class=disabled>Next &raquo;</span>"; 
}
$link_halaman .= "</div>";
return $link_halaman;
}
}
?>