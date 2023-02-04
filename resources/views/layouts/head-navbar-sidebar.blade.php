@include('layouts.head')
<body id="page-top">
<div id="wrapper">
@include('layouts.sidebar', [
    'links_sidebar' => $links_sidebar
])
<div class="d-flex flex-column" id="content-wrapper">
<div id="content">
@include('layouts.navbar')
