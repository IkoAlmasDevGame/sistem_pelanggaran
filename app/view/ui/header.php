<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            session_start();
            require_once("../../config/auth.php");
            require_once("../../config/config.php");
            require_once("../../route/route.php");
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <!--  -->
        <link href="../../../dist/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../../../dist/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../../dist/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="../../../dist/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="../../../dist/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../../../dist/vendor/simple-datatables/style.css" rel="stylesheet">
        <link href="../../../dist/css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
        <style type="text/css">
        *,
        .modal-title,
        .card-title {
            box-sizing: border-box;
            font-size: 14px;
            font-family: 'Times New Roman', monospace;
            font-weight: lighter;
            font-style: normal;
        }

        .panel-heading {
            font-size: 21px;
            font-family: sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .card-width {
            width: 360px;
        }

        .card-height {
            height: 220px;
        }

        @media (max-height: 500px) {
            .card-height {
                max-height: 500px;
            }
        }

        @media (max-width: 720px) {
            .card-width {
                max-width: 720px;
            }
        }

        .fa-refresh {
            animation: rotating 2s linear infinite;
        }

        @keyframes rotating {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
        </style>
        <title>Sistem Pelanggaran Siswa/i</title>
    </head>

    <body>