<?php
includeView('base/header');
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?= $data['title'] ?></title>

<!-- Custom fonts for this template-->
<link href="/public/css/admin/all.min.css" rel="stylesheet" type="text/css">
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

<!-- Custom styles for this template-->
<link href="/public/css/admin/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <?php includeView('admin/sidebar');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php includeView('admin/topbar'); ?>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">