
@include('layouts.head-navbar-sidebar', [
    'links_sidebar' => $links_sidebar
])
<style>
    .col-hijau{
        background: green;
        color: #FFFFFF;
    }
    .col-merah{
        background: red;
        color: #FFFFFF;
    }
    .ct-series-a .ct-bar,
    .ct-series-a .ct-horizontal-bars {
        stroke: blue;
    }
    .ct-series-b .ct-bar,
    .ct-series-b .ct-horizontal-bars {
        stroke: red;
    }
    .ct-chart .ct-label{
        font-size: 12px;
    }
</style>
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Form {{$title_page}}</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
             <div class="ct-chart ct-perfect-fourth"></div>
            </div>
        </div>
    </div>
</div>
<script>
<?php
//label
$resultlabel = array();
foreach ($DaftarBE as $key => $data) {
    $resultlabel[] = "'".trim($data["nama_barang"], " \t\n\r\0\x0B")."'";
}
$resultlbl = implode(",", $resultlabel);
//BE
$resultbe = array();
foreach ($DaftarBE as $key => $data) {
    $resultbe[] = trim($data["BE"], " \t\n\r\0\x0B");
}
$resultBE = implode(",", $resultbe);
//parameter
$resultparam = array();
foreach ($DaftarBE as $key => $data) {
    $resultparam[] = trim($data["parameter"], " \t\n\r\0\x0B");
}
$resultprm = implode(",", $resultparam);
?>
console.log(<?= $resultlbl; ?>)
new Chartist.Bar('.ct-chart', {
    labels: [<?= $resultlbl; ?>],
    series: [
        [<?= $resultBE; ?>],
        [<?= $resultprm; ?>]
    ]
}, {
    seriesBarDistance: 5,
    reverseData: false,
    horizontalBars: true,
    stackBars: true,
    axisY: {
        offset: 200,
    }
})
</script>
@include('layouts.footer')
